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
        function createZip($files, $zip_file) {
        // PHP-MySQL Course - http://coursesweb.net/php-mysql/
        // create an object of the ZipArchive class
        $zip = new ZipArchive;
    
        // if the $zip_file can be created, traverse the array $files and add each file in archive
        if($zip->open($zip_file, ZipArchive::CREATE) === TRUE) {

            //Delete the existing files in the archive
            if($zip->count() > 0) {
                $num = $zip->count();
                for($i = 0; $i < $num; $i++) {
                    $zip->deleteIndex($i);
                }
            }

            $zip->addFile($files);

            $zip->close();
            return true;
        }
        else return false;
        }

        
        $result = exec('python C:\xampp\htdocs\temp\temp\script.py ' .$this->file);

        /* Example */

        // Array with the path-name of the files to be added in ZIP archive
        $files = $result;

        // the path-name of your final zip file on your server
        $zip_file = 'final.zip';

        // calls the createZip() to create the ZIP archive, returns message of success or failure
        if(createZip($files, $zip_file)) echo 'The '. $zip_file. ' successfully created';
        else echo 'Unable to create the '. $zip_file. ' file';

        $data = array('email' => $this->email, 'file' => $zip_file);
        Mail::send('email.welcome', $data, function($message) use ($data)
        {
            $message->to($data['email'])
            ->subject('Link for a video download'); 
        });

    }

}
