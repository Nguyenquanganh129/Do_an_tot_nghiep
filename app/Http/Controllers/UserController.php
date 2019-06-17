<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::where('level','<>',2)->get();
        return view('admin.user.user',compact('users'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'avatar' => 'required|mimes:jpeg,bmp,png,jpg,gif|dimensions:min_width=500,max_min_width=550,min_height=680,max_height=700',
            'password' => 'required|min:6',
            'passwordAgain' => 'required|same:password'
        ],
        [
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Tên không vượt quá 50 kí tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng là email',
            'email.unique' => 'Email đã tồn tại',
            'avatar.required' => 'Vui tải file avatar của bạn lên',
            'avatar.mimes' => 'Vui lòng chọn đúng định dạng ảnh',
            'avatar.dimensions' => 'Vui Lòng Chọn Ảnh có width=(500-550), height=(680-700)',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Password phải có ít nhất 6 kí tự',
            'passwordAgain.required' => 'Vui lòng nhập nhắc lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu và mật khẩu nhắc lại không trùng khớp'
        ]);
        ///
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
         if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $photo_tail = $file->getClientOriginalExtension();
            $ext = $file->getClientOriginalName();
            $linkimg = uniqid(). '.' .$ext;
            while(file_exists("uploadUser/".$linkimg)){
                $linkimg = uniqid(). '.' .$ext;
            }
            $file->move("uploadUser",$linkimg);
            $user->avatar = $linkimg;
        }

       
        $user->password = bcrypt($request->password);
        $user->level = 1;
        $user->active = 1;
        $user->verifytoken = str_random(40);
        $user->save();
        
        
        return redirect()->route('user.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
