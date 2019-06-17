<?php

namespace App\Http\Controllers;

use App\Tintuc;
use App\Loaitin;
use Auth;
use Illuminate\Http\Request;

class TintucController extends Controller
{
    public function indexpublic() // các tin đã đăng 
    {
        $tintucs = Tintuc::where('trangthai',1)->get();
        $loaitins = Loaitin::all();
        return view('admin.tintuc.tintucpublic',compact('tintucs','loaitins'));
    }
    public function gethotnews(){
        $tintucs = Tintuc::where('trangthai',1)->where('tinnong',1)->get();
        return view('admin.tintuc.hotnews',compact('tintucs'));
    }
    public function gethighlightnews(){
        $tintucs = Tintuc::where('trangthai',1)->where('noibat',1)->get();
        return view('admin.tintuc.highlightnews',compact('tintucs'));
    }
    public function highlight($id){ //duyệt tin làm tin nổi bật
        $highlight = Tintuc::findOrFail($id);
        $highlight->noibat = 1;
        $highlight->save();
        return redirect()->route('tintuc.index.public');
    }
    public function unhighlight($id){ //hủy tin nổi bật
        $highlight = Tintuc::findOrFail($id);
        $highlight->noibat = 0;
        $highlight->save();
        return redirect()->route('tintuc.index.public');
    }
    public function hotnews($id){ //duyệt tin làm tin nóng
        $hotnews = Tintuc::findOrFail($id);
        $hotnews->tinnong = 1;
        $hotnews->save();
        return redirect()->route('tintuc.index.public');
    }
    public function unhotnews($id){ //hủy tin nóng
        $hotnews = Tintuc::findOrFail($id);
        $hotnews->tinnong = 0;
        $hotnews->save();
        return redirect()->route('tintuc.index.public');
    }
    public function viewtintuc($id){ //xem chi tiết tin
        $tintuc = Tintuc::findOrFail($id);
        return view('admin.tintuc.viewtintuc',compact('tintuc'));
    }

    public function indexprivate() // các tin đang đợi duyệt
    {
        $tintucs = Tintuc::where('trangthai',0)->get();
        return view('admin.tintuc.tintucprivate',compact('tintucs'));
    }

    public function accept($id) //duyệt tin tức của cộng tác viên gửi lên
    {
        $accept = Tintuc::findOrFail($id);
        $accept->trangthai = 1;
        $accept->save();
        return redirect()->route('tintuc.index.private');
    }
    
    function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
    $str=trim($str);
    if ($str=="") return "";
    $str =str_replace('"','',$str);
    $str =str_replace("'",'',$str);
    $str = stripUnicode($str);
    $str = mb_convert_case($str,$case,'utf-8');
    $str = preg_replace('/[\W|_]+/',$strSymbol,$str);
    return $str;
    }
    public function postnew()
    {
        $loaitins = Loaitin::all();
        return view('admin.tintuc.dangtin',compact('loaitins'));
    }
    public function storepublic(Request $request) // admin đăng tin
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
        $tintucs = new Tintuc();
        $tintucs->loaitin_id = $request->loaitin_id;
        $tintucs->tieude = $request->tieude;
        $tintucs->tieudekhongdau = changeTitle($request->tieude);
        $tintucs->tomtat = $request->tomtat;
        $tintucs->noidung = $request->noidung;
        $tintucs->tieude = $request->tieude;
        if($request->hasFile('hinh')){
            $file = $request->file('hinh');
            $photo_tail = $file->getClientOriginalExtension();
            $ext = $file->getClientOriginalName();
            $linkimg = uniqid(). '.' .$ext;
            while(file_exists("uploadTintuc/".$linkimg)){
                $linkimg = uniqid(). '.' .$ext;
            }
            $file->move("uploadTintuc",$linkimg);
            $tintucs->hinh = $linkimg;
        }
        $tintucs->noibat = 0;
        $tintucs->user_id = Auth::user()->id;
        $tintucs->soluotxem = 0;
        $tintucs->trangthai = 1;
        $tintucs->tinnong = 0;
        $tintucs->save();
        return redirect()->route('tintuc.index.public')->with('thongbao', 'Bạn đã thêm tin thành công');
    }
    public function getUpdate($id)
    {
        $tintuc = Tintuc::findOrFail($id);
        $loaitins = Loaitin::all();
        return view('admin.tintuc.update',compact('tintuc','loaitins'));
    }
    public function update(Request $request, $id) //chỉnh sửa tin tức
    {
        $request->validate([
            'loaitin_id' => 'required',
            'tieude' => 'required',
            'tomtat' => 'required',
            'noidung' => 'required',
            'hinh' => 'mimes:jpeg,bmp,png,jpg,gif'
        ],
        [
            'loaitin_id.required' => 'Vui lòng chọn loại tin',
            'tieude.required' => 'Vui lòng nhập tiêu đề',
            'tomtat.required' => 'Vui lòng nhập tóm tắt tin',
            'noidung.required' => 'Vui lòng nhập nội dung tin',
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
            $ext = \File::extension($request->hinh->getClientOriginalName());
            $linkimg = uniqid(). '.' .$ext;
            $tintuc->hinh = $request->hinh->storeAs('uploadTintuc',$linkimg);
        }
            $tintuc->user_id = Auth::user()->id;
            $tintuc->soluotxem = 0;
            $tintuc->trangthai = $request->trangthai;
            $tintuc->save();
            return redirect()->route('tintuc.index.public')->with('thongbao', 'Bạn đã sửa tin thành công');   
    }
    public function destroypublic($id)
    {
        $tintuc = Tintuc::findOrFail($id);
        $tintuc->delete();
        return redirect()->route('tintuc.index.public')->with('thongbao', 'Bạn đã xóa tin thành công');
    }
    public function destroyprivate($id)
    {
        $tintuc = Tintuc::findOrFail($id);
        $tintuc->delete();
        return redirect()->route('tintuc.index.private');
    }
}
