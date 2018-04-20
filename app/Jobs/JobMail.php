<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Support\Facades\Mail;
use ZipArchive;

class JobMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    protected $email;
    protected $file;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $file)
    {
        $this->email = $email;
        $this->file = $file;
    }
    
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $result = exec('python C:\xampp\htdocs\temp\temp\script.py ' .$this->file);  
 
        $path = asset('storage/' .$result);
        
        $data = array('email' => $this->email, 'file' => $path);
        Mail::send('email.welcome', $data, function($message) use ($data)
        {
            $message->to($data['email'])
            ->subject('Link for a video download'); 
        });

    }

}
