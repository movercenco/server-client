<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Storage;

class UploadController extends Controller
{
    public function upload()
    {
        $uuid = Uuid::uuid4()->toString();

        $file = request()->file('file');

        $extension = $file->extension();

        $filename = "$uuid.$extension";

        $file->storeAs('public/uploads/', $filename, 's3');

        $url = Storage::disk('s3')->url("public/uploads/$filename");

        return response($url);
    }

    public function uploadImage()
    {
        $uuid = Uuid::uuid4()->toString();

        $file = request()->file('file');

        $extension = $file->extension();

        $filename = "$uuid.$extension";

        $file->storeAs('public/uploads/', $filename, 'local');

        \ImageOptimizer::optimize(storage_path("app/public/uploads/$filename"));

        $file = Storage::get("public/uploads/$filename");

        Storage::disk('s3')->put("uploads/$filename", $file);

        $url = Storage::disk('s3')->url("uploads/$filename");

        return response($url);
    }
}
