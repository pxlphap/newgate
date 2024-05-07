<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Blog;

class CheckBlogType
{
    public function handle(Request $request, Closure $next)
    {
        $blogId = $request->route('id');
        $blog = Blog::find($blogId);

        if (!$blog) {
            return redirect()->route('trang-chu')->with(['flag' => 'danger', 'message' => 'Bài viết không tồn tại']);
        }

        switch ($blog->blog_types) {
            case 1:
                if (auth()->check() && auth()->user()->is_vip) {
                    return $next($request);
                } else {
                    return redirect()->route('request_vip')->with(['flag' => 'danger', 'message' => 'Bạn cần quyền VIP để xem bài viết này']);
                }
                break;
            case 2:
                if (auth()->check()) {
                    return $next($request);
                } else {
                    return redirect()->route('login')->with(['flag' => 'danger', 'message' => 'Bạn cần đăng nhập để xem bài viết này']);
                }
                break;
            case 3: 
                return $next($request);
                break;
            default:
                break;
        }
    }
}