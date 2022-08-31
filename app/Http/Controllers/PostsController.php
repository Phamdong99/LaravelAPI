<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Transformer\PostsTransformer;
use Illuminate\Http\Request;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class PostsController extends Controller
{
    protected $postTransform;

    public function __construct(PostsTransformer $postTransform)
    {
        $this->postTransform = $postTransform;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPost($id = null)
    {
        if($id == null){
            $posts = Post::paginate(5);

            return fractal()->collection($posts)
                ->transformWith(new PostsTransformer)
                ->parseIncludes('user') //Lấy ra bảng user
                ->paginateWith(new IlluminatePaginatorAdapter($posts))//paginateWith để phân trang
                ->toArray();
        }else
        {
            $posts = Post::where('id',$id)->first();

            return $posts;
        }
    }

    public function create(Request $request)
    {
        try {
            $post = Post::create([
                'user_id'=>$request->input('user_id'),
                'votes'=>$request->input('votes'),
                'view_count'=>$request->input('view_count'),
                'content'=>$request->input('content')
            ]);
            return $post;
        }catch (\Exception $err){
            return $err->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $post = Post::find($id);
            if($post){
                $post->user_id = $request->input('user_id');
                $post->votes = $request->input('votes');
                $post->view_count = $request->input('view_count');
                $post->content = $request->input('content');
                $post->save();
                return $post;
            }else{
                return false;
            }

        }catch (\Exception $err){
            return $err->getMessage();
        }
    }
    public function delete($id)
    {
        try {
            $post = Post::find($id);
            if($post) {
                $post->delete();
                return "Xóa thành công";
            }else{
                return "Không tồn tại sản phẩm cần xóa!";
            }
        }catch (\Exception $err){
            return $err->getMessage();
        }
    }
}
