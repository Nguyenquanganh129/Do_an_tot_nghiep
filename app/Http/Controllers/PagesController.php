<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\Slide;
use App\Loaitin;
use App\Tintuc;
use App\Lienhe;
use App\Solieu;
class PagesController extends Controller
{
	
    function index(){
    	$menus = Theloai::all();
    	$slides = Slide::all();
        $tintucs = Tintuc::all();
        $solieus = Solieu::where('id',1)->get();
        $chuyenhocviens = Tintuc::where('noibat',1)->where('trangthai',1)->where('loaitin_id',4)->orderBy('created_at', 'desc')->take(5)->get();
        $vieclams = Tintuc::where('noibat',1)->where('trangthai',1)->where('loaitin_id',15)->take(4)->orderBy('created_at', 'desc')->get();
        $sukiens =  Tintuc::where('noibat',1)->where('trangthai',1)->where('loaitin_id',16)->take(2)->orderBy('created_at', 'desc')->get();
        $chiases = Tintuc::Where('loaitin_id',17)->get();
        return view('user.index',compact('menus','slides','tintucs','solieus','chuyenhocviens', 'vieclams','sukiens','chiases'));
    	
    }
    public function getLienhe(){
        $menus = Theloai::all();
        return view('user.lienhe', compact('menus'));
    }
    public function postLienhe(Request $request){
        $this->validate($request,[
            'fullname'=>'required|max:50|min:5',
            'email' => 'required|email|unique:lienhes',
            'phone'=>'required|unique:lienhes',
            'comment'=>'required'
        ],[
            'fullname.required' => 'Vui lòng nhập tên',
            'fullname.min' => 'Tên tối thiểu phải 5 kí tự',
            'fullname.max' => 'Tên không vượt quá 50 kí tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng là email',
            'email.unique' => 'Email đã tồn tại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.required'=>'Số điện thoại là bắt buộc',
            'comment.required'=>'comment không được bỏ trống'
        ]);
        $lienhes = new Lienhe();
        $lienhes->fullname = $request->fullname;
        $lienhes->email = $request->email;
        $lienhes->phone = $request->phone;
        $lienhes->comment = $request->comment;
        $lienhes->save();
        return redirect()->route('get.page.lienhe')->with('thongbao','Cảm ơn bạn đã gửi thông tin');
    }
    
    public function getSolieu(){
        $solieus = Solieu::all();
        return view('admin.lienhe.solieu',compact('solieus'));
    }
    public function getupdateSolieu($id){
        $solieus = Solieu::findOrFail($id);
        return view('admin.lienhe.updatesolieu',compact('solieus'));
    }
    public function updateSolieu(Request $request, $id)
    {
        $request->validate(
        [
          'duan' => 'required',  
          'hocvien' => 'required',  
          'giaovien' => 'required', 
          'kinhdoanh' => 'required'  
        ],
        [
            'duan.required' => 'Bạn vui lòng nhập tên loại tin',
            'hocvien.required' => 'Bạn vui lòng nhập tên loại tin',
            'giaovien.required' => 'Bạn vui lòng nhập tên loại tin',
            'kinhdoanh.required' => 'Bạn vui lòng nhập tên loại tin'
        ]);
        $solieu = Solieu::find($id);
        $solieu->duan = $request->duan;
        $solieu->hocvien = $request->hocvien;
        $solieu->giaovien = $request->giaovien;
        $solieu->kinhdoanh = $request->kinhdoanh;
        $solieu->save();
        return redirect()->route('get.page.solieu')->with('thongbao', 'Bạn đã sửa loại tin thành công');
    }
}