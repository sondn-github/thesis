<?php


namespace App\Services;


use App\Post;
use App\Services\Interfaces\PostServiceInterface;
use Illuminate\Support\Facades\Auth;

class PostService extends Service implements PostServiceInterface
{
    public function getPost() {
        return Post::with('user')
            ->orderBy(Post::COL_CREATED_AT, 'desc')
            ->limit(Post::MAX_NUMBER_POST)
            ->get();
    }

    public function getPostById($id) {
        return Post::findOrFail($id);
    }

    public function increaseView($id) {
        $post = Post::findOrFail($id);
        $post->view++;

        return $post->save();
    }

    public function store($request) {
        return Post::create([
            Post::COL_TITLE => $request->input(Post::COL_TITLE),
            Post::COL_CONTENT => $request->input(Post::COL_CONTENT),
            Post::COL_USER_ID => Auth::id(),
        ]);
    }

    public function update($request, $id) {
        return Post::findOrFail($id)
            ->update([
                Post::COL_TITLE => $request->input(Post::COL_TITLE),
                Post::COL_CONTENT => $request->input(Post::COL_CONTENT),
            ]);
    }

    public function destroy($id) {
        return Post::findOrFail($id)
            ->delete();
    }

    public function getPosts($perPage = 6) {
        return Post::with('user')
            ->paginate($perPage);
    }
}
