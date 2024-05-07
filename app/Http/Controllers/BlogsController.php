<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class BlogsController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            // Nếu đã đăng nhập, kiểm tra xem đường dẫn chuyển hướng có chính xác không
            return redirect()->route('admin.dashboard');
        }else{
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('admin.login');
        }
    }
    
    //
    public function add_blog(){
        $this->AuthLogin();
        $cate_blog = DB::table('type_blogs')->orderby('id1')->get();

        return view('admin.add_blog')->with('cate_blog',$cate_blog);
    }
    public function all_blog(){
        $this->AuthLogin();
    	$all_blog = DB::table('blogs')->join('type_blogs','type_blogs.id1','=','blogs.id_type')->orderby('blogs.id')->get();

    	$managerblog = view('admin.all_blog')->with('all_blog',$all_blog);
    	return view('admin_layout')->with('admin.all_blog',$managerblog);
    }

    public function search_blogs(Request $request) {
		$searchContent = $request->input('search_content');
		$searchResult = DB::table('blogs')
		->where('id', 'like', '%' . $searchContent . '%')
		->orWhere('name', 'like', '%' . $searchContent . '%')
        ->join('type_blogs','type_blogs.id1','=','blogs.id_type')->orderby('blogs.id')
		->get();
        $managerblog = view('admin.all_blog')->with('all_blog',$searchResult);
		return view('admin_layout')->with('admin.all_blog',$managerblog);
	}
    public function save_blog(Request $request){
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
    public function unactive_blog($blog_id){
        $this->AuthLogin();
    	DB::table('blogs')->where('id',$blog_id)->update(['new'=>1]);
    	Session::put('message','games không nằm trong new');
    	return Redirect::to('all-blog');
    }
    public function active_blog($blog_id){
        $this->AuthLogin();
    	DB::table('blogs')->where('id',$blog_id)->update(['new'=>0]);
    	Session::put('message',' kích hoạt new games thành công');
    	return Redirect::to('all-blog');
    }
    public function edit_blog($blog_id){
        $this->AuthLogin();
        $cate_blog = DB::table('type_blogs')->orderby('id1')->get();
    	$edit_blog = DB::table('blogs')->where('id',$blog_id)->get();
    	$manager_blog = view('admin.edit_blog')->with('edit_blog',$edit_blog)->with('cate_blog',$cate_blog);
    	return view('admin_layout')->with('admin.edit_blog',$manager_blog);
    }
    public function update_blog(Request $request, $blog_id){
        $this->AuthLogin();
    	$data = array();
    	$data['name'] = $request->blog_name;
        $data['id_type'] = $request->blog_cate;
        $data['description'] = $request->blog_desc;
        $data['promotion_price'] = $request->blog_link;
        $data['video_product'] = $request->blog_video;
        $data['image'] = $request->blog_image;
        $data['new'] = $request->blog_status;
        $data['blog_types'] = $request->blog_types;
    	DB::table('blogs')->where('id',$blog_id)->update($data);
    	Session::put('message','Cập nhật bài viết thành công');
    	return Redirect::to('all-blog');
    }
        public function delete_blog($blog_id){
            $this->AuthLogin();
    	DB::table('blogs')->where('id',$blog_id)->delete();
    	Session::put('message',' Xóa thể loại bài viết thành công');
    	return Redirect::to('all-blog');
    }

    // Spam
    public function add_spam(){
        $this->AuthLogin();
        $spam = DB::table('spam')->get();
        return view('admin.add_spam')->with('spam',$spam);
    }
    public function all_spam(){
        $this->AuthLogin();
    	$all_spam = DB::table('spam')->get();
    	$managerspam = view('admin.all_spam')->with('all_spam',$all_spam);
    	return view('admin_layout')->with('admin.all_spam',$managerspam);
    }
    public function search_spam_text(Request $request) {
		$searchContent = $request->input('search_content');
		$searchResult = DB::table('spam')
		->where('spam_id', 'like', '%' . $searchContent . '%')
		->orWhere('spam_text', 'like', '%' . $searchContent . '%')
		->get();
        $managerblog = view('admin.all_spam')->with('all_spam',$searchResult);
		return view('admin_layout')->with('admin.all_spam',$managerblog);
	}
    public function all_spam_comment(){
        $this->AuthLogin();
    	$all_spam_comment = DB::table('comment')
                    ->where('is_spam', 1)
                    ->get();

    	$managerspam = view('admin.all_spam_comment')->with('all_spam_comment',$all_spam_comment);
    	return view('admin_layout')->with('admin.all_spam',$managerspam);
    }
    public function search_spam_comment(Request $request) {
        $searchContent = $request->input('search_content');
        $searchResult = DB::table('comment')
            ->where('is_spam', 1)
            ->where(function ($query) use ($searchContent) {
                $query->where('com_id', 'like', '%' . $searchContent . '%')
                      ->orWhere('com_email', 'like', '%' . $searchContent . '%')
                      ->orWhere('com_name', 'like', '%' . $searchContent . '%')
                      ->orWhere('com_content', 'like', '%' . $searchContent . '%');
            })
            ->get();
        
        $managerblog = view('admin.all_spam_comment')->with('all_spam_comment', $searchResult);
        return view('admin_layout')->with('admin.all_spam_comment', $managerblog);
    }
    
    
    public function save_spam(Request $request){
    	$this->AuthLogin();
    	$data = array();
    	$data['spam_text'] = $request->spam_text;
    	DB::table('spam')->insert($data);
    	Session::put('message','Thêm Spam Text thành công');
    	return Redirect::to('all-spam');
    }

    public function delete_spam($spam_id){
        $this->AuthLogin();
        DB::table('spam')->where('spam_id',$spam_id)->delete();
        Session::put('message',' Xóa text spam thành công');
        return Redirect::to('all-spam');
    }

    public function delete_spam_comment($spam_id){
        $this->AuthLogin();
        DB::table('comment')->where('spam_id',$spam_id)->delete();
        Session::put('message',' Xóa text spam thành công');
        return Redirect::to('all-spam');
    }
    public function update_spam(Request $request, $spam_id){
        $this->AuthLogin();
    
        $validatedData = $request->validate([
            'spam_text' => 'required|string',
        ]);
    
        try {
            $affectedRows = DB::table('spam')->where('spam_id', $spam_id)->update([
                'spam_text' => $validatedData['spam_text'],
            ]);
            
            if ($affectedRows > 0) {
                Session::put('message', 'Cập nhật text spam thành công');
            } else {
                Session::put('message', 'Không tìm thấy spam để cập nhật');
            }
        } catch (\Exception $e) {
            Session::put('message', 'Đã xảy ra lỗi khi cập nhật spam: ' . $e->getMessage());
        }
    
        return Redirect::to('all-spam');
    }
    
    
    public function edit_spam($spam_id){
        $this->AuthLogin();
    	$edit_spam = DB::table('spam')->where('spam_id',$spam_id)->get();
    	$manager_spam = view('admin.edit_spam')->with('edit_spam',$edit_spam);
    	return view('admin_layout')->with('admin.edit_spam',$manager_spam);
    }

    

}