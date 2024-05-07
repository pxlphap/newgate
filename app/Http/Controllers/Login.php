<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class blogController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
            session(['logged_in' => true]);
        }else{
            return Redirect::to('admin')->send();
        }
    }
    //
    public function add_user(){
        $this->AuthLogin();
        return view('admin.add_user');
    }
    public function all_user(){
        $this->AuthLogin();
    	$all_user = DB::table('tbl_admin')->get();
        $managersuser = view('admin.all_user')->with('all_user',$all_user);
        return view('admin_layout')->with('admin.all_slide',$managersuser);
    }
    public function save_user(Request $request){
    	$this->AuthLogin();
    	$data = array();
    	$data['name'] = $request->blog_name;
    	$data['description'] = $request->blog_desc;
    	$data['new'] = $request->blog_status;
        $data['promotion_price'] = $request->blog_link;
        $data['video_product'] = $request->blog_video;
        $data['id_type'] = $request->blog_cate;
        //get anh
        $data['image'] = $request->blog_image;
        $data['staff'] = $request->blog_staff;
    	DB::table('blogs')->insert($data);
    	Session::put('message','Thêm game thành công');
    	return Redirect::to('all-blog');
    }
    public function unactive_user($user_id){
        $this->AuthLogin();
    	DB::table('blogs')->where('id',$user_id)->update(['new'=>1]);
    	Session::put('message','games không nằm trong new');
    	return Redirect::to('all-blog');
    }
    public function active_user($user_id){
        $this->AuthLogin();
    	DB::table('blogs')->where('id',$user_id)->update(['new'=>0]);
    	Session::put('message',' kích hoạt new games thành công');
    	return Redirect::to('all-blog');
    }
    public function edit_user($user_id){
        $this->AuthLogin();
        $cate_blog = DB::table('type_blogs')->orderby('id1')->get();
    	$edit_blog = DB::table('blogs')->where('id',$user_id)->get();
    	$manager_blog = view('admin.edit_blog')->with('edit_blog',$edit_blog)->with('cate_blog',$cate_blog);
    	return view('admin_layout')->with('admin.edit_blog',$manager_blog);
    }
    public function update_user(Request $request, $user_id){
        $this->AuthLogin();
    	$data = array();
    	$data['name'] = $request->blog_name;
        $data['id_type'] = $request->blog_cate;
        $data['description'] = $request->blog_desc;
        $data['promotion_price'] = $request->blog_link;
        $data['video_product'] = $request->blog_video;
        $data['image'] = $request->blog_image;
        $data['new'] = $request->blog_status;
    	DB::table('blogs')->where('id',$blog_id)->update($data);
    	Session::put('message',' cập nhật User thành công');
    	return Redirect::to('all-blog');
    }
        public function delete_user($user_id){
            $this->AuthLogin();
    	DB::table('blogs')->where('id',$blog_id)->delete();
    	Session::put('message',' Xóa thể loại bài viết thành công');
    	return Redirect::to('all-blog');
    }
}