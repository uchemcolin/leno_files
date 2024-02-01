<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    // The website's home page
    public function index() {
        return view("files/index", [
            "title" => "Leno Files :: Home"
        ]);
    }

    // Was trying to test sending mail, will
    // finish it up later for the forgot email part
    public function test_send_email() {

        $user_email = "colinuchem@gmail.com";

        //$mailData = "test mail";
        $mailData["new_password"] = "test mail";
        Mail::to($user_email)->send(new ForgotPasswordEmail($mailData));
    }

    // To view a file
    public function view_file($id) {

        $file = File::find($id);

        return view("files/view_file", [
            "title" => "Leno Files :: View File",
            "file" => $file
        ]);
    }

    // To view all the user's files
    // also handle's the search file functionality
    public function manage_files(Request $request) {

        // if a user searched for a file
        if(isset($request->search)) {
            
            $search = $request->search;

            // used this because I want to use jQuery datatables for the pagination
            // in the front end since the files uploaded are not much now
            $files = File::where('user_id', auth()->id())
                            ->where('name', 'like', '%'.$search.'%')
                            ->orWhere('type', 'LIKE', "%".$search."%")
                            ->orWhere('size', 'LIKE', "%".$search."%")
                            ->orderBy('id', 'DESC')->get();

            /* // This would have been used if I was not going to use jQuery datatables
            $files = File::where('user_id', auth()->id())
                            ->where('name', 'like', '%'.$search.'%')
                            ->orWhere('type', 'LIKE', "%".$search."%")
                            ->orWhere('size', 'LIKE', "%".$search."%")
                            ->orWhere('size', 'LIKE', "%".$search."%")->paginate(10); */
        } else {

            // Just retrieve all the files if no search for a file was done
            $user_id = auth()->id();
            $files = File::where("user_id", $user_id)
                            ->orderBy('id', 'DESC')->get();

            $search = "";
        }

        return view("files/manage_files", [
            "title" => "Leno Files :: Manage your Files",
            "files" => $files,
            "search" => $search
        ]);
    }

    // The upload file form page
    public function create() {
        return view("files/upload_file_form", [
            "title" => "Leno Files :: Upload File"
        ]);
    }

    //Store/create a new file in the file system and db
    public function store(Request $request) {

        $user_id = auth()->id();
        //$request->validate()

        $request->validate([
            'file' => 'required|max:2048',
        ]);

        if($request->hasFile("file")) {
            //$fileName = $request->file('file')->getClientOriginalName()."_".date("d-m-y h:i:s");

            //$fileName = $request->file('file')->getClientOriginalName()."_".date("d-m-y h:i:s");
            //$fileNameWithoutExtension = $request->file('file')->getBasename();
            //$fileNameWithoutExtension = $request->file('file')->getFilename();

            //Laravel uses Symfony UploadedFile component that will be returned by Input::file() method.
            //It hasn't got any method to retrive file name, so you can use php native function pathinfo():
            $fileNameWithoutExtension = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);

            $fileExtension = $request->file('file')->getClientOriginalExtension();

            //$fileName = $fileNameWithoutExtension."_".date("d-m-y_h:i:s").".".$fileExtension;
            //$fileName = $fileNameWithoutExtension."_".date("d-m-y_h:i:s").".".$fileExtension;
            //$fileName = "user_".$user_id."_file"."_".date("d-m-y_h-i-s").".".$fileExtension;
            //$fileName = $fileNameWithoutExtension."_".date("d-m-y_h-i-s").".".$fileExtension;
            $fileName = "user_".auth()->id()."_".date("d-m-y_h-i-s").".".$fileExtension; //decided to use this because of files with names that have unallowed characters in their names which will prevent them from showing on the live site or on the mobile app. So using user_id_"_".date("d-m-y_h-i-s").".".$fileExtension; for now is the best

            //return var_dump($fileName);
            //return var_dump($request->file('file')->getClientOriginalName());

            $fileSize = $request->file('file')->getSize(); //get size of file in bytes

            $fileSizeInKilobytes = $fileSize/1024; //get size of file in kb

            $fileSizeInMegabytes = $fileSizeInKilobytes/1024; //get size of file in mb

            // round up to 5 decimal places
            $fileSizeInMegabytesRoundedToFiveDecimalPlaces = round($fileSizeInMegabytes, 5);

            // store size of file in mb in the db
            $fileDetails["size"] = $fileSizeInMegabytesRoundedToFiveDecimalPlaces;
            
            //$fileDetails["file"] = $request->file("file")->storeAs("files", $fileName, "public");
            $request->file("file")->storeAs("files", $fileName, "public");
            //$fileDetails["file"] = $request->file("file")->storeAs("files", $fileName);
        }

        $fileType = $request->file('file')->getClientMimeType();

        $fileDetails["name"] = $fileName;

        $fileDetails["type"] = $fileType;

        $fileDetails["user_id"] = auth()->id();

        //File::create($fileDetails);
        
        $createdFile = File::create($fileDetails);

        if(!$createdFile) {
            //If the file was not uploaded

            session()->flash("error", "There was an error in uploading the file. Please try again");

            return back();
        } else {

            $uploaded_file_id = $createdFile["id"];

            session()->flash("success", "File uploaded successfully!");

            return redirect("/files/view_file/$uploaded_file_id");
        }
    }

    // Delete File
    public function destroy($file_id) {
        $file = File::find($file_id);

        
        // Make sure logged in user is owner
        if($file->user_id != auth()->id()) {

            session()->flash("error", "Unauthirized Action");

            redirect("/files/manage_files");

            
        }

        if(Storage::exists("public/files/".$file->name)){

            Storage::delete("public/files/".$file->name); // delete the file from our servers
            /*
                Delete Multiple files this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
            */

            if($file->delete()) {

                session()->flash("success", "File deleted successfully");

                return redirect("/users/files");
            } else {

                session()->flash("error", "Error deleting file. Please try again");

                redirect("/users/files");
            }

        } else {

            session()->flash("error", "File does not exist");

            redirect("/users/files");
        }
    }
}
