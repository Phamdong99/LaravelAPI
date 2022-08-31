<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Transformer\PostsTransformer;

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
    public function getPost()
    {
//        $post = Post::with('user')->first();
//        return $this->postTransform->transform($post);
        $posts = Post::paginate(5);

        return fractal()->collection($posts)
            ->transformWith(new PostsTransformer)
            ->parseIncludes('user')
            ->toArray();
    }
}
