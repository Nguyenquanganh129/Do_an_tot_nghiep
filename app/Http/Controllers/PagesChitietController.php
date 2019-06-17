<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Slide;
use App\Theloai;
use App\Loaitin;
use App\Tintuc;
use App\Comment;

class PagesChitietController extends Controller
{
    public function index($id)
    {   
    	$menus = Theloai::all();
   		$loaitins = Loaitin::where('id',$id)->get();
        return view('user.pagechitiet',compact('menus','loaitins'));
    }
    public function chitiet2($id)
    {   
    	$menus = Theloai::all();
   		$tintucs = Tintuc::find($id);
        $tinlienquans = Tintuc::where('loaitin_id',$tintucs->loaitin_id)->where('id','<>',$id)->where('noibat',0)->orderBy('created_at', 'desc')->take(2)->get();
        $tinnoibats = Tintuc::where('loaitin_id',$tintucs->loaitin_id)->where('noibat',1)->orderBy('created_at','desc')->take(2)->get();
        $value = session($tintucs->soluotxem++);
        $tintucs->save();
        return view('user.pagechitiet2',compact('menus','tintucs','tinlienquans','tinnoibats'));
    }
}
