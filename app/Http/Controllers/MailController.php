<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send(Request $request){
    //Logic will go here   
    $file = $request->input('link');
    $email = $request->input('email');  

    $result = exec('python C:\xampp\htdocs\temp\temp\script.py ' .$file);
    // Проверка на валидный url
    if (!filter_var($result, FILTER_VALIDATE_URL)) {
        echo "<h4>Unsupported url. Please try again!</h4>";
        return view('welcome');
    }
    // Проверка на валидный email
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h4>Invalid email address. Please try again!</h4>";
        return view('welcome');
    }

    $data = array('email' => $email, 'file' => $result);  
    Mail::send('email.welcome', $data, function($message) use ($email)
    {
        $message->to($email)
        ->subject('Link for a video download');
    });

    return view('success');
    
    }
}
