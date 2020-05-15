<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['download']]);
    }

    public function list()
    {
        $images = Image::orderBy('id','desc')->paginate(20);
        return view('home.index', compact('images'));
    }

    public function store(Request $request, Image $image)
    {
        $iamge_path = $image->store($request->image);

        Image::create([
            'absolute_path' => public_path() . $iamge_path,
            'relative_path' => $iamge_path,
            'title' => $request->title,
            'tag' => $request->tag,
            'created_time' => time(),
            'updated_time' => time()
        ]);

        return redirect()->route('home');
    }

    public function download(Image $image)
    {
        $path = $image->absolute_path;
        return \response()->download($path);
    }
}
