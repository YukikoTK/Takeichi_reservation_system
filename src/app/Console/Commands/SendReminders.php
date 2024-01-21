<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;
use App\Models\Book;
use Carbon\Carbon;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails to all users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
        public function handle()
    {
        $today = Carbon::today();
        
        $books = Book::whereDate('date', $today)->with('user', 'shop')->get();

        foreach ($books as $book) {
            $user = $book->user;
            $shop = $book->shop;
            $bookDetail = $book;

            // リマインドメールを送信
            Mail::to($user->email)->send(new ReminderEmail($user, $shop, $bookDetail));
        }

        return 0;
    }

}
