<?php

namespace App\Jobs;

use App\Models\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Process;

class CreatedNewArticle implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly User $user){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        throw new Exception('error');
        Mail::to($this->user)->send(new \App\Mail\CreatedNewArticle($this->user));
    }

    public function failed(\Throwable $throwable)
    {
        echo "error!!!";
    }
}
