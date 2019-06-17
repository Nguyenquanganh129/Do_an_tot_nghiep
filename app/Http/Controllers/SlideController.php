<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;


class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slide.slide',compact('slides'));
    }

    public function getStore(){
        return redirect()->route('slide.index');
    }
    public function store(Request $request)
    { 
        $this->validate($request,
        [
            'ten' => 'required|unique:slides',
            'link' => 'required|mimes:jpeg,bmp,png,jpg,gif|dimensions:min_width=1169,max_min_width=1171,min_height=509,max_height=511'
        ],
        [
            'ten.required' => 'Vui Lòng Nhập Tên Cho Ảnh',
            'ten.unique' => 'Tên Này Đã Tồn Tại',
            'link.required' => 'Vui Lòng Chọn Ảnh',
            'link.mimes' => 'Vui lòng chọn đúng định dạng ảnh',
            'link.dimensions' => 'Vui Lòng Chọn Ảnh 1170*511'
        ]);  
        $slides = new Slide();
        $slides->ten = $request->ten;
        if($request->hasFile('link')){
            $file = $request->file('link');
            $photo_tail = $file->getClientOriginalExtension();
            $ext = $file->getClientOriginalName();
            $linkimg = uniqid(). '.' .$ext;
            while(file_exists("uploadSlide/".$linkimg)){
                $linkimg = uniqid(). '.' .$ext;
            }
            $file->move("uploadSlide",$linkimg);
            $slides->link = $linkimg;
        }
        $slides->save();
        return redirect()->route('slide.index')->with('thongbao', 'Bạn đã thêm thành công slide mới');
    }

    public function destroy( $id)
    {
        $slide = Slide::findOrFail($id);
        $slide->delete();
        return redirect()->route('slide.index')->with('thongbao','Bạn đã xóa thành công thê loại');
    }
}
