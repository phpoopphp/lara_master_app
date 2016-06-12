<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\UserStoreRequest;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminUsersController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::with('photo')->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input=$request->all();
        $input['photo_id']= $this->fileUpload($request);
        $user=User::create($input);
        return redirect(route('admin.users.index'));

    }

    private function fileUpload(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
