<?php

namespace App\Http\Controllers;

use App\Loaitin;
use App\Theloai;
use Illuminate\Http\Request;
use Validator;

class LoaitinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    /* */
    public function index()
    {
        $loaitins = Loaitin::all();
        $theloais = Theloai::all();
        return view('admin.loaitin.loaitin',compact('loaitins','theloais'));
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
            'tenloaitin' => 'required|unique:loaitins'
        ],
        [
            'tenloaitin.required' => 'Bạn vui lòng nhập tên loại tin',
            'tenloaitin.unique' => 'Tên Loại Tin Đã Tồn Tại'
        ]);
        $loaitin = Loaitin::create([
            'tenloaitin' => $request->tenloaitin,
            'ltkhongdau' => $this->changeTitle($request->tenloaitin),
            'theloai_id' => $request->theloai_id
        ]);
        return redirect()->route('loaitin.index')->with('thongbao','Bạn đã thêm loại tin thành công');
    }

    public function getUpdate($id){
        $loaitin = Loaitin::findOrFail($id);
        $theloais = Theloai::all();
        return view('admin.loaitin.update',compact('loaitin','theloais'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
        [
          'tenloaitin' => 'required'  
        ],
        [
            'tenloaitin.required' => 'Bạn vui lòng nhập tên loại tin'
        ]);
        $loaitin = Loaitin::findOrFail($id);
        $loaitin->tenloaitin = $request->tenloaitin;
        $loaitin->ltkhongdau = $this->changeTitle($request->tenloaitin);
        $loaitin->theloai_id = $request->theloai_id;
        $loaitin->save();
        return redirect()->route('loaitin.index')->with('thongbao', 'Bạn đã sửa loại tin thành công');
    }
    public function destroy($id)
    {
        $loaitin = Loaitin::findOrFail($id);
        $loaitin->delete();
        return redirect()->route('loaitin.index')->with('thongbao','Bạn đã xóa loại tin thành công');
    }
}
