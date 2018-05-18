<?php

namespace App\Http\Controllers;
use App\Jobs\JobMail;
use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\Mail;
use Redis;

class MailController extends Controller
{
    public function send(Request $request){
    //Logic will go here   
    $file = $request->input('link');
    $email = $request->input('email');  

    // Проверка на валидный url
    if (!filter_var($file, FILTER_VALIDATE_URL)) {
        echo "<h4>Unsupported url. Please try again!</h4>";
        return view('welcome');
    }
    // Проверка на валидный email
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h4>Invalid email address. Please try again!</h4>";
        return view('welcome');
    }
    
    
    Log::info("Request Cycle with Queues Begins");

    //asynchronous sending
    $queue = $this->dispatch(new JobMail($email, $file)); 
    
    //synchronous sending
    
    /* $result = exec('python C:\xampp\htdocs\temp\temp\script.py ' .$file);
    $data = array('email' => $email, 'file' => $result);  
    Mail::send('email.welcome', $data, function($message) use ($email)
    {
        $message->to($email)
        ->subject('Link for a video download');
    }); */
    
    Log::info("Request Cycle with Queues Ends");
    
    return view('success');
    }
}
