<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Categoryblog extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    //
    public function add_category_blog(){
        $this->AuthLogin();
    	return view('admin.add_category_blog');
    }
    public function all_category_blog(){
        $this->AuthLogin();
    	$all_category_blog = DB::table('type_blogs')->get();
    	$manager_category_blog = view('admin.all_category_blog')->with('all_category_blog',$all_category_blog);
    	return view('admin_layout')->with('admin.all_category_blog',$manager_category_blog);
    }

    public function search_danh_muc(Request $request) {
		$searchContent = $request->input('search_content');
		$searchResult = DB::table('type_blogs')
		->where('name1', 'like', '%' . $searchContent . '%')
		->orWhere('description', 'like', '%' . $searchContent . '%')
		->get();

		return view('admin.all_category_blog', ['all_category_blog' => $searchResult]);
	}
    public function save_category_blog(Request $request){
    	$this->AuthLogin();
    	$data = array();
    	$data['name1'] = $request->category_blog_name;
    	$data['description'] = $request->category_blog_desc;
    	$data['status'] = $request->category_blog_status;

    	DB::table('type_blogs')->insert($data);
    	Session::put('message','Thêm thể loại game thành công');
    	return Redirect::to('add-category-blog');
    }
    public function unactive_category_blog($category_blog_id){
        $this->AuthLogin();
    	DB::table('type_blogs')->where('id1',$category_blog_id)->update(['status'=>1]);
    	Session::put('message','Không kích hoạt danh mục bài viết thành công');
    	return Redirect::to('all-category-blog');
    }
    public function active_category_blog($category_blog_id){
        $this->AuthLogin();
    	DB::table('type_blogs')->where('id1',$category_blog_id)->update(['status'=>0]);
    	Session::put('message',' kích hoạt thể loại bài viết thành công');
    	return Redirect::to('all-category-blog');
    }
    public function edit_category_blog($category_blog_id){
        $this->AuthLogin();
    	$edit_category_blog = DB::table('type_blogs')->where('id1',$category_blog_id)->get();
    	$manager_category_blog = view('admin.edit_category_blog')->with('edit_category_blog',$edit_category_blog);
    	return view('admin_layout')->with('admin.edit_category_blog',$manager_category_blog);
    }
    public function update_category_blog(Request $request, $category_blog_id){
        $this->AuthLogin();
    	$data = array();
    	$data['name1'] = $request->category_blog_name;
    	$data['description'] = $request->category_blog_desc;
    	DB::table('type_blogs')->where('id1',$category_blog_id)->update($data);
    	Session::put('message',' cập nhật thể loại bài viết thành công');
    	return Redirect::to('all-category-blog');
    }
        public function delete_category_blog($category_blog_id){
            $this->AuthLogin();
    	DB::table('type_blogs')->where('id1',$category_blog_id)->delete();
    	Session::put('message',' Xóa thể loại bài viết thành công');
    	return Redirect::to('all-category-blog');
    }
}