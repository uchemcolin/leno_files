<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileControllerForApi extends Controller
{
    // to get a particular file's details with the file's id
    public function view_file($id) {

        $file = File::find($id);

        $user_id = auth()->id(); //if there is a logged in user

        if($file["user_id"] == $user_id) {
            $message = "is_user_file";
        } else {
            $message = "is_not_user_file";
        }

        $response = [
            //"user" => $user,
            "file" => $file,
            "message" => $message
        ];

        return response(
            $response,
            201 // 201 status code meaning everything went smooth and there was no error
        );
    }

    public function manage_files(Request $request) {

        if(isset($request->search)) {
            
            // search for a file if a search is made
            $search = $request->search;
            $files = File::where('user_id', auth()->id())
                            ->where('name', 'like', '%'.$search.'%')
                            ->orWhere('type', 'LIKE', "%".$search."%")
                            ->orWhere('size', 'LIKE', "%".$search."%")
                            ->orderBy('id', 'DESC')->get();
        } else {

            // return all files if no search is made
            $user_id = auth()->id();
            $files = File::where("user_id", $user_id)
                            ->orderBy('id', 'DESC')->get();

            $search = "";
        }

        $response = [
            //"user" => $user,
            "message" => [
                "type" => "success"
            ],
            "files" => $files,
            "search" => $search
        ];

        return response(
            $response,
            201 // 201 status code meaning everything went smooth and there was no error
        );
    }

    //Store/create a new file in the file system and db
    public function store(Request $request) {

        $user_id = auth()->id();
        //$request->validate()

        $request->validate([
            'file' => 'required|max:2048',
        ]);

        if($request->hasFile("file")) {

            //Laravel uses Symfony UploadedFile component that will be returned by Input::file() method.
            //It hasn't got any method to retrive file name, so you can use php native function pathinfo():
            $fileNameWithoutExtension = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);

            $fileExtension = $request->file('file')->getClientOriginalExtension();

            
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

            $response = [
                //"user" => [],
                "message" => [
                    "type" => "error",
                    "text" => "There was an error in uploading the file. Please try again"
                ]
            ];

            return response(
                $response,
                404 // 404 status code because there was an error
            );

        } else {

            $response = [
                //"user" => $user,
                "message" => [
                    "type" => "success",
                    "text" => "File uploaded successfully!"
                ]
            ];

            return response(
                $response,
                201 // 201 status code meaning everything went smooth and there was no error
            );
        }
    }

    // Delete File
    public function destroy($file_id) {
        $file = File::find($file_id);
        
        // Make sure logged in user is owner
        if($file->user_id != auth()->id()) {

            $response = [
                //"user" => [],
                "message" => [
                    "type" => "error",
                    "text" => "Unauthirized Action"
                ]
            ];

            return response(
                $response,
                404 // 404 status code because there was an error
            );
        }

        if(Storage::exists("public/files/".$file->name)){

            Storage::delete("public/files/".$file->name); // delete the file from our servers
            /*
                Delete Multiple files this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
            */

            if($file->delete()) {

                $response = [
                    //"user" => $user,
                    "message" => [
                        "type" => "success",
                        "text" => "File uploaded successfully!"
                    ]
                ];
    
                return response(
                    $response,
                    201 // 201 status code meaning everything went smooth and there was no error
                );

            } else {

                $response = [
                    //"user" => [],
                    "message" => [
                        "type" => "error",
                        "text" => "Error deleting file. Please try again."
                    ]
                ];
    
                return response(
                    $response,
                    404 // 404 status code because there was an error
                );
            }

        } else {

            $response = [
                //"user" => [],
                "message" => [
                    "type" => "error",
                    "text" => "File does not exist."
                ]
            ];

            return response(
                $response,
                404 // 404 status code because there was an error
            );
        }
    }
}
