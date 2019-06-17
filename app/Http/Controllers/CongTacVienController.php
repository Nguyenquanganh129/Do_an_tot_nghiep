<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tintuc;
use App\Loaitin;
class CongTacVienController extends Controller
{

    public function index()
    {
        $id = Auth::id();
        $tin_dang_doi = Tintuc::where('trangthai',0)->where('user_id',$id)->orderBy('created_at', 'desc')->paginate(5);
        $loaitin = Loaitin::all();
        return view('CTV.congtacvien',compact('tin_dang_doi','loaitin'));
    }

    public function changeTitle($str){
      if(!$str) return false;
       $unicode = array(
          'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
          'd'=>'đ',
          'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
          'i'=>'í|ì|ỉ|ĩ|ị',
          'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
          'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
          'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
       );
        foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
        return $str;
    }

    public function store(Request $request) //ctv đăng bài
    {
        ///
        $request->validate([
            'loaitin_id' => 'required',
            'tieude' => 'required',
            'tomtat' => 'required',
            'noidung' => 'required',
            'hinh' => 'required|mimes:jpeg,bmp,png,jpg,gif'
        ],
        [
            'loaitin_id.required' => 'Vui lòng chọn loại tin',
            'tieude.required' => 'Vui lòng nhập tiêu đề',
            'tomtat.required' => 'Vui lòng nhập tóm tắt tin',
            'noidung.required' => 'Vui lòng nhập nội dung tin',
            'hinh.required' => 'Vui lòng chọn file hình',
            'hinh.mimes' => 'File Bạn Chọn Không Được Phép',
            // 'hinh.dimensions' => 'Vui Lòng Chọn Ảnh 825*465'   
        ]);
        $tintuc = new Tintuc();
        $tintuc->loaitin_id = $request->loaitin_id;
        $tintuc->tieude = $request->tieude;
        $tintuc->tieudekhongdau = $this->changeTitle($request->tieude);
        $tintuc->tomtat = $request->tomtat;
        $tintuc->noidung = $request->noidung;
        if($request->hasFile('hinh')){
            $file = $request->file('hinh');
            $photo_tail = $file->getClientOriginalExtension();
            $ext = $file->getClientOriginalName();
            $linkimg = uniqid(). '.' .$ext;
            while(file_exists("uploadTintuc/".$linkimg)){
                $linkimg = uniqid(). '.' .$ext;
            }
            $file->move("uploadTintuc",$linkimg);
            $tintuc->hinh = $linkimg;
        }
        $tintuc->user_id = Auth::user()->id;
        $tintuc->soluotxem = 0;
        $tintuc->trangthai = 0;
        $tintuc->tinnong = 0;
        $tintuc->noibat = 0;
        $tintuc->save();
        return redirect()->route('ctv.index');
    }
    public function show($id)
    {
        $tintuc = Tintuc::findOrFail($id);
        if ($tintuc->user_id == Auth::id() && $tintuc->trangthai == 0) { // tránh user đổi id trên link để sửa những bài viết của cvt khác, hay bài viết đã đăng.
            return view('CTV.xemchitiet',compact('tintuc')); 
        }
        else
        return redirect()->route('ctv.index');
    }
    public function getupdate($id)
    {
        $tintuc = Tintuc::findOrFail($id);
        $loaitins = Loaitin::all();
        if ($tintuc->user_id == Auth::id() && $tintuc->trangthai == 0) { 
            return view('CTV.edit',compact('tintuc','loaitins')); 
        }
        else
        return redirect()->route('ctv.index');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'loaitin_id' => 'required',
            'tieude' => 'required',
            'tomtat' => 'required',
            'noidung' => 'required',
            'hinh' => 'required|mimes:jpeg,bmp,png,jpg,gif'
        ],
        [
            'loaitin_id.required' => 'Vui lòng chọn loại tin',
            'tieude.required' => 'Vui lòng nhập tiêu đề',
            'tomtat.required' => 'Vui lòng nhập tóm tắt tin',
            'noidung.required' => 'Vui lòng nhập nội dung tin',
            'hinh.required' => 'Vui lòng chọn file hình',
            'hinh.mimes' => 'File Bạn Chọn Không Được Phép',
            // 'hinh.dimensions' => 'Vui Lòng Chọn Ảnh 825*465'   
        ]);
        $tintuc = Tintuc::findOrFail($id);
        $tintuc->loaitin_id = $request->loaitin_id;
        $tintuc->tieude = $request->tieude;
        $tintuc->tieudekhongdau = $this->changeTitle($request->tieude);
        $tintuc->tomtat = $request->tomtat;
        $tintuc->noidung = $request->noidung;
        if($request->hasFile('hinh')){
            $file = $request->file('hinh');
            $photo_tail = $file->getClientOriginalExtension();
            $ext = $file->getClientOriginalName();
            $linkimg = uniqid(). '.' .$ext;
            while(file_exists("uploadTintuc/".$linkimg)){
                $linkimg = uniqid(). '.' .$ext;
            }
            $file->move("uploadTintuc",$linkimg);
            $tintuc->hinh = $linkimg;
        }
        $tintuc->user_id = Auth::user()->id;
        $tintuc->soluotxem = 0;
        $tintuc->trangthai = 0;
        $tintuc->tinnong = 0;
        $tintuc->noibat = 0;
        $tintuc->save();
        return redirect()->route('ctv.view',['id'=>$id]);
    }
    public function destroy($id)
    {
        $tintuc = Tintuc::findOrFail($id);
        $tintuc->delete();
        return redirect()->route('ctv.index');
    }
}
