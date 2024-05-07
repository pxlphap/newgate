<?php

namespace App\Http\Controllers;
use App\Slide;
use App\blog;
use App\blogType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\Contacts;
use App\Comment;
use Hash;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PageController extends Controller
{
    //
    public function getIndex(){
    	$new_blog = blog::where('new',1)->paginate(1);
        $new_bloglist = blog::where('new',0)->paginate(10);
        $new_left = blog::where('new',3)->paginate(2);
    	$feed_blog = blog::where('new',4)->paginate(2);
        $esports_blog = blog::where('id_type',4)->paginate(4);
        $video_product = blog::where('new',5)->paginate(2);
    	return view('page.trangchu',compact('new_blog','feed_blog','new_left','esports_blog','video_product','new_bloglist'));
    }
    public function getLoaiSp($type){
    	$sp_theoloai = blog::where('id_type',$type)->get();
    	$sp_khac = blog::where('id_type','<>',$type)->paginate(3);
    	$loai = blogType::all();
    	$loai_sp = blogType::where('id1',$type)->first();
        $tentheloai = blogType::where('id1',$type)->get();
    	return view('page.loai_baiviet',compact('sp_theoloai','sp_khac','loai','loai_sp','tentheloai'));
    }
    public function getChitiet(Request $req, $id){
        $baiviet = blog::where('id', $req->id)->first();
        
        if ($baiviet->blog_types == 1) { 
            if (!Auth::check() || !Auth::user()->vipid) {
                Session::flash('error', 'Bạn cần là VIP để xem bài viết này.');
                if (!Auth::check()) {
                    return redirect()->route('login');
                } else {
                    return redirect()->back();
                }
            }
        } elseif ($baiviet->blog_types == 2) { 
            if (!Auth::check()) {
                Session::flash('error', 'Bạn cần đăng nhập để xem bài viết này.');
                return redirect()->route('login');
            }
        }
        
        $comments = Comment::where('id_product', $id)
                   ->where('is_spam', '!=', 1)
                   ->get();
        
        $sp_tuongtu = blog::where('id_type', '<>', $baiviet->id_type)->paginate(2);
        
        return view('page.chitiet_baiviet', compact('baiviet', 'sp_tuongtu', 'comments'));
    }
    
    
    
    public function getLienHe(){
        $commentslh = Contacts::all();
        return view('page.lienhe',compact('commentslh'));
    }
    public function postLienHe(Request $req){
        $Com = new Contacts;
        $Com->name = $req->namecommentlh;
        $Com->content = $req->contentcommentlh;
        $Com->save();
        return back();
    }
     public function getGioiThieu(){
    	return view('page.gioithieu');
    }
        public function getAddtoCart(Request $req,$id){
        $blog = blog::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($blog, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
        public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
        public function getLogin(){
        return view('page.dangnhap');
    }
        public function getSignin(){
        return view('page.dangki');
    }
        public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentialsAdmin = array('email'=>$req->email,'password'=>$req->password,'phone' => 1);
        $credentials = array('email'=>$req->email,'password'=>$req->password);
            if(Auth::attempt($credentialsAdmin)){

            return redirect()->route('indexadmin');
            }
            elseif (Auth::attempt($credentials)) {
                return redirect()->route('page.trangchu');
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }        
    }
    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
    public function getSearch(Request $req){
        $blog = blog::where('name','like','%'.$req->key.'%')
                                ->orWhere('staff',$req->key)
                                ->get();
        return view('page.search',compact('blog'));
    }
    public function postComment($id, Request $req){
        $Comment = new Comment;
        $Comment->com_email = $req->emailcomment;
        $Comment->com_name = $req->namecomment;
        $Comment->com_content = $req->contentcomment;
        $Comment->id_product = $id;
    
        $spamWords = DB::table('spam')->pluck('spam_text')->toArray();
        
        foreach ($spamWords as $word) {
            if (strpos($req->contentcomment, $word) !== false) {
                $Comment->is_spam = 1; 
                break;
            }
        }
        
        $Comment->save();
        return back();
    }
    
}