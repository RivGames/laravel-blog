<?php

use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;

require __DIR__.'/groups/main.php';

require __DIR__.'/groups/articles.php';

require __DIR__.'/groups/categories.php';

require __DIR__.'/groups/dashboard.php';

require __DIR__.'/groups/profile.php';

require __DIR__.'/auth.php';

Route::get('/image',function(){
   $img = Image::make('images/4Evi1tsT2KpJQV39bmjUefmsy4hWCyniFBOXVj4M.png')
       ->resize(400,222);
    $img->text('foo', 200, 120, function($font) {
        $font->size(48);
        $font->color('#000');
        $font->align('center');
        $font->valign('top');
        $font->angle(45);
    });
    $img->blur(100);
//    $img->crop(100, 100, 25, 25);
    $img->save();
   return $img->response('jpg');
});
