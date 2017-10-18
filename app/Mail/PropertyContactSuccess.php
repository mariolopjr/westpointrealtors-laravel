<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Property;

class PropertyContactSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $property;
    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request, Property $property)
    {
        $this->property = $property;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('westpointagents@gmail.com')
                    ->markdown('emails.property.success');
    }
}
