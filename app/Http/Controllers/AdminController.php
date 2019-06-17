<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Slide;
use App\Theloai;
use App\Loaitin;
use App\Tintuc;
use App\Lienhe;
use App\Solieu;

class AdminController extends Controller
{
    public function index()
    {
       $user = User::all()->count();
       $theloai = Theloai::all()->count();
       $loaitin = Loaitin::all()->count();
       $tintuc = Tintuc::all()->count();
       $tin_dang_doi = Tintuc::where('trangthai',0)->count();
       $lienhe = Lienhe::all()->count();
       return view('admin.index',compact('user','theloai','loaitin','tintuc','tin_dang_doi','lienhe'));
    }
    public function lienhe()
    {
        $lienhes = Lienhe::all();
        return view('admin.lienhe.lienhe',compact('lienhes'));
    }
   
}
  