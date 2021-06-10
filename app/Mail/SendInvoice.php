<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use PDF;
use App\Item;
use App\Organization;

class SendInvoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $invoice_id=0;
    public $organ_id=0;
    public function __construct($invoice_id, $organ_id)
    {
        // dd($organ_id);
        $this->invoice_id = $invoice_id;
        

        $this->organ_id = $organ_id;
        

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $invoice_id=$this->invoice_id;
      
        $organ_get= \App\Organization::where('id',$this->organ_id)->first();
        $additem= \App\Item::where('invoice_id',$invoice_id)->orderBy('id', 'desc')->get();
        $pdf = PDF::loadView('pdftwo',compact('invoice_id','organ_get','additem')); //load view page
        return $this->view('emails.send_invoice')
                ->attachData($pdf->stream(), $organ_get->orgName.' invoice.pdf', [
                    'mime' => 'application/pdf',
                ]);

    }
}
