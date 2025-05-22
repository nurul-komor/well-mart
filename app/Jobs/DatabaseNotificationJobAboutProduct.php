<?php

namespace App\Jobs;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Notifications\DatabaseNotificationAboutProduct;

class DatabaseNotificationJobAboutProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $admins = Admin::all();
        $url = 'admin.products.index';
        $message = "Someone Trying to add new product";
        foreach ($admins as $admin) {
            $admin->notify(new DatabaseNotificationAboutProduct($url, $message));
        }

    }
}