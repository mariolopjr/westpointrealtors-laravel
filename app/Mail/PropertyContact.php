<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Property;

class PropertyContact extends Mailable
{
    use Queueable, SerializesModels;

    public $property;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('westpointagents@gmail.com')
                    ->markdown('emails.property.contact');
    }
}
