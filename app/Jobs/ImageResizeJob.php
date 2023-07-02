<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\Facades\Image;

class ImageResizeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly string $imagePath)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
//        $image = Image::make(storage_path('app/public/' . $this->imagePath))
//            ->resize(800, 400,function($constraint){
//                $constraint->aspectRatio();
//                $constraint->upsize();
//            });
        $image = Image::make(storage_path('app/public/' . $this->imagePath))
            ->resize(75, 75,function($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        $image->save();
    }
}
