<?php

namespace App\Library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailable;

class SendMail extends Mailable
{
    use HasFactory;
    
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $conf = config('mail.from');
        try {
            return $this
            ->from($conf['address'],$conf['name'])
            ->markdown('mail.'.$this->data['template'])
            ->subject($this->data['subject'])
            ->with($this->data);
        } catch (\Throwable $th) {
            return false;
        }   
        
    }
}
