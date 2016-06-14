<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function fileUpload(Request $request)
    {
        if($request->hasFile('photo')){
            $file=$request->file('photo');
            $ext=$file->getClientOriginalExtension();
            $name=$file->getClientOriginalName();
            $file_name=date('d-m-Y-h-i-s').'_'.sha1($name).'.'.$ext;
            $upload=$file->move("images",$file_name);
            $photo=Photo::create(['file'=>"images/".$file_name]);
            return $photo->id;
        }
        return false;
    }
}
