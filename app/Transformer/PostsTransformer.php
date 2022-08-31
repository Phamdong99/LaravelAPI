<?php

namespace App\Transformer;

use App\Models\Post;
use League\Fractal\TransformerAbstract;

class PostsTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = ['user'];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Post $post)
    {
        //lấy ra các trường của post
        return [
            'id' => $post->id,
            'user_id' => $post->user_id,
            'votes'=> $post->votes,
            'view_count'=>$post->view_count,
            'content' => $post->content
        ];
    }
    public function includeUser(Post $post)
    {
        $user = $post->user;
        return $this->item($user, new UsersTransformer);
    }
}
