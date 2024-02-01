<p>Use this new password to login to your account: </p>
<p>Password: {{$mailData["new_password"]}}</p>
<p>Remember to update your password from your profile once you are in.</p>
<p>
    <center>
        <small>
            Copyright &copy; Leno Files 
            @if(date("Y") <= 2023)
                2023
            @else
                2023 - @php date("Y") @endphp
            @endif
        </small>
    </center>
</p>