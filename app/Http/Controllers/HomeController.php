<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Slide;
use App\Theloai;
use App\Loaitin;
use App\Tintuc;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        $menus = Theloai::all();
        $tintucs = Tintuc::all();
        $tinnoibat = Tintuc::where('noibat',1)->where('trangthai',1)->get();
        $hots = Tintuc::where('tinnong',1)->where('trangthai',1)->take(6)->orderBy('created_at', 'desc')->get();
        $newposts = Tintuc::where('trangthai',1)->orderBy('created_at', 'desc')->take(6)->get();
        return view('index',compact('menus','slides','tinnoibat','hots','newposts','tintucs'));
    }
    
    public function search(Request $request){ //search ở header
        $request->validate([
            'keyword' => 'required'
        ],[
            'keyword.required' => 'Vui lòng nhập tiêu đề tin cần tìm'
        ]);
        $slides = Slide::all();
        $menus = Theloai::all();
        $keyword = $request->keyword;
        $searchs = Tintuc::where('tieude','like', '%'.$keyword.'%')->where('trangthai',1)->get();
        $hots = Tintuc::where('tinnong',1)->take(5)->get();
        return view('index', compact('searchs','slides','menus'));
    }
    
   
    public function checkEmail(Request $request){ //kiểm tra email đã tồn tại chưa
        $email = User::where('email',$request->email)->first();
        if (isset($email)) {
            return 1;
        }
        else 
            return 0;
    }
    
    public function getSign_in(){ //lấy view đăng nhập
        return view('login');  
    }
    public function postSign_in(Request $request){ //đăng nhập
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ],
        [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.exists' => 'Email không tồn tại',
            'password.required' => 'Vui lòng nhập password',
            
        ]);
    if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password,'active'=> 1], $request->remember))
        {
            $user = Auth::user();
            if($user->level == 2)
            {
                return redirect()->route('admin.index');
            }
            else if($user->level == 1)
            {
                return redirect()->route('ctv.index');
            }
            else
                return redirect()->route('index');
        }
    else
        {
            return view('login');
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect('sign-in')
        ;
    }
    public function getForgotpassword(){
        return view('ALL.forgotpassword');
    }
    public function sendMail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        $response = $this->broker()->sendResetLink($request->only('email'));

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }
    /*public function sendMail(Request $request){
        $request->validate(
            [
                'email' => 'required|email|exists:users,email'
            ],
            [
                'email.required' => 'Vui lòng nhập email tài khoản của bạn',
                'email.email' => 'Vui lòng nhập đúng email',
                'email.exists' => 'Không tồn tại email này'
            ]);
        $u = User::where('email',$request->email)->first();
        if($u)
        {
            $user = User::where('email',$request->email)->first();
            if ($user) {
                Mail::send('users.emailforgotpass',['user' => $user], function ($message) use ($user) {
                    $message->from('anhath116@gmail.com', 'Quản trị viên');
                    $message->to($user->email);
                    $message->subject('Email nhận lại mật khẩu');      
                }); 
                return 1;
            }
            
        }
        else
            return 0;
    }*/
    public function getviewChangepassword(){
        return view('ALL.changepassword');
    }
    public function Changepassword(Request $request,$token,$id){
        // dd($token);
        $user = User::where('id',$id)->where('verifytoken',$token)->first();
        if($user)
        {
            $request->validate([
                'password' => 'required|min:6',
                'passwordAgain' => 'required|same:password'
            ],
            [
                'password.required' => 'Vui lòng nhập password',
                'password.min' => 'Password phải có ít nhất 6 kí tự',
                'passwordAgain.required' => 'Vui lòng nhập nhắc lại mật khẩu',
                'passwordAgain.same' => 'Mật khẩu và mật khẩu nhắc lại không trùng khớp'
            ]);
            $user->password =  bcrypt($request->password);
            $user->verifytoken = str_random(40);
            return 1;     
        }
        else
            return 0;
    }
    public function getviewChangeavatar(){
        return view('ALL.changeavatar');
    }
    public function Changeavatar(Request $request)
    {
        $user = Auth::user();
        $request->validate(
            [
               'avatar' => 'required|mimes:jpeg,bmp,png,jpg,gif' 
            ],
            [
                'avatar.required' => 'Vui tải file avatar của bạn lên',
                'avatar.mimes' => 'Vui lòng chọn đúng định dạng ảnh'
            ]);
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
        return redirect()->route('ctv.index');
    }
    public function viewChangepass_user()
    {
        return view('ALL.changepassword_user');
    }
    public function Changepass_user(Request $request)
    {
        $request->validate(
            [
                'oldpassword' => 'required',
                'password' => 'required|min:6',
                'passwordAgain' => 'required|same:password'
            ],
            [
                'oldpassword.required' => 'Vui lòng nhập mật khẩu cũ',
                'password.required' => 'Vui lòng nhập password mới',
                'password.min' => 'Password phải có ít nhất 6 kí tự',
                'passwordAgain.required' => 'Vui lòng nhập nhắc lại mật khẩu mới',
                'passwordAgain.same' => 'Mật khẩu mới và mật khẩu nhắc lại không trùng khớp'
            ]);
        if(bcrypt::check($request->oldpassword, Auth::user()->password))
            {
                // dd($request->password,$request->oldpassword);
                $request->validate([
                    'oldpassword' => 'required',
                    'password' => 'different:oldpassword'
                ],
                [
                    'password.different' => 'Mật khẩu mới không được giống mật khẩu cũ'
                ]);
                $user = Auth::user();
                $user->password = bcrypt($request->password);
                $user->save();
                return redirect()->route('get.logout');
            }
        else
        {
            $request->session()->flash('status', 'Mật khẩu cũ không chính xác');
            return view('ALL.changepassword_user');
        }
    }
}
