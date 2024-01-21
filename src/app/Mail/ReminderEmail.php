<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Shop;
use App\Models\Book;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $shop;
    public $bookDetail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Shop $shop, Book $bookDetail)
    {
        $this->user = $user;
        $this->shop = $shop;
        $this->bookDetail = $bookDetail;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reminder')
            ->subject('予約日当日です')
            ->with([
            'user' => $this->user,
            'shop' => $this->shop,
            'bookDetail' => $this->bookDetail,
        ]);
    }
}
