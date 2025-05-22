<?php

namespace App\Jobs;

use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Notifications\SendEmailVerificationToSeller;

class SendVerificationEmailToSeller implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $seller;
    /**
     * Create a new job instance.
     */
    public function __construct($seller)
    {
        $this->seller = $seller;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        info($this->seller->notify(new SendEmailVerificationToSeller($this->seller)));
        // info($this->seller);
    }
}