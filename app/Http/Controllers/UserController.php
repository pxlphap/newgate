<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class UserController extends Controller
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
    public function add_user(){
        $this->AuthLogin();
        return view('admin.add_user');
    }
    public function all_user(){
        $this->AuthLogin();
        $all_user = DB::table('tbl_admin')->get();
        $manageruser = view('admin.all_user')->with('all_user',$all_user);
        return view('admin_layout')->with('admin.all_user',$manageruser);
    }
    public function search_nhan_vien(Request $request) {
		$searchContent = $request->input('search_content');
		$searchResult = DB::table('tbl_admin')
		->where('id', 'like', '%' . $searchContent . '%')
		->orWhere('admin_email', 'like', '%' . $searchContent . '%')
		->orWhere('admin_name', 'like', '%' . $searchContent . '%')
		->orWhere('admin_phone', 'like', '%' . $searchContent . '%')
		->get();
        $managerblog = view('admin.all_user')->with('all_user',$searchResult);
		return view('admin_layout')->with('admin.all_user',$managerblog);
	}
    public function all_customer(){
        $this->AuthLogin();
        $all_customer = DB::table('users')->get();
        $manageruser = view('admin.all_customer')->with('all_customer',$all_customer);
        return view('admin_layout')->with('admin.all_customer',$manageruser);
    }

    public function search_thanh_vien(Request $request) {
		$searchContent = $request->input('search_content');
		$searchResult = DB::table('users')
		->where('full_name', 'like', '%' . $searchContent . '%')
		->orWhere('email', 'like', '%' . $searchContent . '%')
		->orWhere('address', 'like', '%' . $searchContent . '%')
		->orWhere('phone', 'like', '%' . $searchContent . '%')
		->get();
        $managerblog = view('admin.all_customer')->with('all_customer',$searchResult);
		return view('admin_layout')->with('admin.all_customer',$managerblog);
	}
    public function save_user(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['admin_name'] = $request->user_name;
        $data['admin_email'] = $request->user_email;
        $data['admin_password'] = $request->user_password;
        $data['admin_phone'] = $request->user_phone;
        $data['nickName'] = $request->user_nickname;
        //get anh
        $data['images'] = $request->user_image;
        DB::table('tbl_admin')->insert($data);
        Session::put('message','Update thành công');
        return Redirect::to('all-user');
    }
    
    public function add_vip($ngaytao, $ngayhet){
        $this->AuthLogin();
        
        $data = array();
        $data['ngaytao'] = $ngaytao;
        $data['ngayhet'] = $ngayhet;
    
        DB::table('vip')->insert($data);
    
        $newVipId = DB::getPdo()->lastInsertId();
    
        return $newVipId;
    }
    
    public function update_vip($vipid, $ngaytao, $ngayhet){
        $this->AuthLogin();
        
        $data = array();
        $data['ngaytao'] = $ngaytao;
        $data['ngayhet'] = $ngayhet;
    
        DB::table('vip')->where('vipid',$vipid)->update($data);
    
        return 1;
    }
    
    public function update_vip_id($user_id, $ngaytao, $ngayhet){
        $this->AuthLogin();
        $user = DB::table('users')->where('id', $user_id)->first();
        if($user){
            if($user->vipid == null){
                $vipid = $this->add_vip($ngaytao, $ngayhet);
                $data = array();
                $data['vipid'] = $vipid;
                DB::table('users')->where('id', $user_id)->update($data);
            }
            else{
                $this->update_vip($user->vipid, $ngaytao, $ngayhet);
            }
            return 1;
        }
        else{
            return 0;
        }
    }
    
    public function edit_user($user_id){
        $this->AuthLogin();
        $edit_user = DB::table('tbl_admin')->where('id',$user_id)->get();
        $manager_user = view('admin.edit_user')->with('edit_user',$edit_user);
        return view('admin_layout')->with('admin.edit_user',$manager_user);
    }

    public function edit_customer($user_id){
        $this->AuthLogin();
        $edit_customer = DB::table('users')->where('id',$user_id)->get();
        $manager_customer = view('admin.edit_customer')->with('edit_customer',$edit_customer);
        return view('admin_layout')->with('admin.edit_customer',$manager_customer);
    }
    
    
    public function update_user(Request $request, $user_id){
        $this->AuthLogin();
        $data = array();
        $data['admin_name'] = $request->user_name;
        $data['admin_email'] = $request->user_email;
        $data['admin_password'] = $request->user_password;
        $data['admin_phone'] = $request->user_phone;
        $data['nickName'] = $request->user_nickname;
        
        //get anh
        $data['images'] = $request->user_image;
        DB::table('tbl_admin')->where('id',$user_id)->update($data);
        Session::put('message','User ID : '.$user_id);
        return Redirect::to('all-user');
    }
    public function update_customer(Request $request, $user_id){
        $this->AuthLogin();
        $data = array();
        $data['full_name'] = $request->full_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        if($request->user_vip == 1){
            $ngaytao = now();
            $ngayhet = now()->addDays(7);
            $this->update_vip_id($user_id, $ngaytao, $ngayhet);
        }
        if($request->user_vip == 2){
            $ngaytao = now();
            $ngayhet = now()->addDays(30);
            $this->update_vip_id($user_id, $ngaytao, $ngayhet);
        }
        if($request->user_vip == 3){
            $ngaytao = now();
            $ngayhet = now()->addDays(90);
            $this->update_vip_id($user_id, $ngaytao, $ngayhet);
        }
        if($request->user_vip == 4){
            $ngaytao = now();
            $ngayhet = now()->addDays(180);
            $this->update_vip_id($user_id, $ngaytao, $ngayhet);
        }
        if($request->user_vip == 5){
            $ngaytao = now();
            $ngayhet = now()->addDays(365);
            $this->update_vip_id($user_id, $ngaytao, $ngayhet);
        }
        if($request->user_vip == 6){
            $ngaytao = now();
            $ngayhet = now()->addDays(99999);
            $this->update_vip_id($user_id, $ngaytao, $ngayhet);
        }
        
        DB::table('users')->where('id',$user_id)->update($data);
        Session::put('message','User ID : '.$user_id);
        return Redirect::to('all-customer');
    }
    
    public function delete_user($user_id){
        $this->AuthLogin();
        DB::table('tbl_admin')->where('id',$user_id)->delete();
        Session::put('message',' Xóa thể loại bài viết thành công');
        return Redirect::to('all-user');
    }
}