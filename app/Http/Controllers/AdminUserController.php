<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;

use App\Http\Requests\EditUserRequest;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Photo;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=User::all();
        return view('admin.users.index',compact('users'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::lists('name','id')->all();
        // dd($roles);
        return view('admin.users.create',compact('roles'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        // dd($request->all());
        $input=$request->all();

        if($file=$request->file('user_photo'))
    {
         $name=time().$file->getClientOriginalName();
         $file->move('user_image',$name);

         $photo=Photo::create(['file'=>$name]);

         $input['photo_id']=$photo->id;
    }    
           
        $input['password']=bcrypt($request->password);
        $input['is_active']=$request->status;
        User::create($input);
       // User::create([

       //      'name'=>$request->name,
       //      'email'=>$request->email,
       //      'password'=> \Crypt::encrypt($request->password),
       //      'role_id'=>$request->role_id,
       //      'status'=>$request->status,
       //      'photo'=>$name

       //      ]);

        return redirect()->back();
        //
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
        
        $user=User::findOrFail($id);
        $roles=Role::lists('name','id');

        // return $user->photo->file;
        return view('admin.users.edit',compact('user','roles'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {

          $user=User::findOrFail($id);
          $input=$request->all();
          $input['password']=bcrypt($request->password);
          $user->update($input);

          return redirect('admin/user');
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
        $user=User::findOrFail($id);
         unlink(public_path()."/user_image/".$user->photo->file);

         $photo=$user->photo;
         $photo->delete();
          
       
        $user->delete();

        \Session::flash('delete_user','User is Successfully deleted');
        return redirect('admin/user');
        //
    }
}
