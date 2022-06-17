<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\TemporaryFile;
use App\Models\TemporaryImage;
use Faker\Core\File;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    // public function store(Request $request)
    // {
    //     //
    //     if ($request->hasFile('avatar')) {
    //         $file   = $request->file('avatar');
    //         $filename = $file->getClientOriginalName();
    //         $folder = uniqid() . '-' . now()->timestamp();
    //         $file->storeAs('avatars/tmp' . $folder, $filename);

    //         return $folder;
    //     }

    //     return '';
    // }

    public function store(Request $request)
    {

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');

            $filename = time() . '-' . $image->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $image->move(public_path('storage/avatars/tmp/' . $folder), $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;

            // foreach ($images as $image) {
            //     $filename = time() . '-' . $image->getClientOriginalName();
            //     $folder = uniqid() . '-' . now()->timestamp;
            //     $image->move(public_path('storage/tmp/cms/' . $folder), $filename);

            //     TemporaryFile::create([
            //         'folder' => $folder,
            //         'filename' => $filename
            //     ]);

            //     return $folder;
            // }

            // return '';
        }
    }
}
