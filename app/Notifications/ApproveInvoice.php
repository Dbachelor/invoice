<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Invoice;

class ApproveInvoice extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $invoice;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Approve Invoice Request')
                    ->line('You are to review and approve an Invoice, '.$this->invoice->invoiceName.' generated for  '.$this->invoice->organization->orgName)
                    // ->action('View Leave Request', url('/documents/reviews'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toDatabase($notifiable)
    {
        return new DatabaseMessage([
            'subject'=>$this->invoice->invoiceName.' -Invoice Approved',
            'message'=>'You are to review and approve an Invoice '.$this->invoice->invoiceName.' uploaded by '.$this->user->name,
            // 'action'=>route('documents.showreview', ['id'=>$this->invoice->id]),
            // 'type'=>'Review'
        ]);

    }
}
