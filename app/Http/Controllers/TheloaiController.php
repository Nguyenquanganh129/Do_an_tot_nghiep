<?php

namespace App\Http\Controllers;

use App\Theloai;
use Illuminate\Http\Request;

class TheloaiController extends Controller
{
    public function index()
    {
       $theloais = Theloai::all();
       return view('admin.theloai.theloai', compact('theloais')); 
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
   
    public function store(Request $request)
    {
        $request->validate(
        [
            'tentheloai' => 'required|unique:theloais',
        ],
        [
            'tentheloai.required' => 'Chưa Nhập Tên Thể Loại',
            'tentheloai.unique' => 'Tên Thể Loại Đã Tồn Tại'
        ]);
        $tlkhongdau = $this->changeTitle($request->tentheloai);
        $theloai = Theloai::create([
            'tentheloai' => $request->tentheloai,
            'tlkhongdau' => $tlkhongdau
        ]);
        return redirect()->route('theloai.index')->with('thongbao', 'bạn đã thêm thành công thể loại');
    }
    public function getUpdate($id){
        $theloai = Theloai::find($id);
        return view('admin.theloai.update',compact('theloai'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
        [
            'tentheloai' => 'required'
        ],
        [
            'tentheloai.required' => 'Vui lòng nhập tên thể loại'
        ]);
        $theloai = Theloai::findOrFail($id);
        $theloai->tentheloai = $request->tentheloai;
        $theloai->tlkhongdau = $this->changeTitle($request->tentheloai);
        $theloai->save();
        return redirect()->route('theloai.index')->with('thongbao', 'Bạn đã sửa thành công thể loại');
    }
    public function destroy($id)
    {
        $theloai = Theloai::findOrFail($id);
        $theloai->delete();
        return redirect()->route('theloai.index')->with('thongbao', 'Bạn đã xóa thành công thể loại');
    }
}
