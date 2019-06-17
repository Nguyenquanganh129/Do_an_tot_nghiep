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
class PagesTintucController extends Controller
{
    public function index($id)
    {
    $menus = Theloai::all();
    $loaitins = Loaitin::where('id',$id)->get();
    $tintucs = Tintuc::where('loaitin_id',$id)->where('trangthai',1)->paginate(5);
     return view('user.pagetintuc',compact('tintucs','menus','loaitins'));
    }
}
 