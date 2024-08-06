<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    protected $post;

    /**
     * Constructor for the class.
     *
     * @param Post $post The Post instance.
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Retrieves all posts and renders the 'posts.index' view with the posts data.
     *
     * @return \Illuminate\Contracts\View\View The rendered 'posts.index' view.
     */
    public function index()
    {
        $posts = $this->post->all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Displays the view for creating a new post.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    
    /**
     * Displays the view for creating a new post.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request The request object containing the validated data.
     * @return \Illuminate\Http\RedirectResponse Redirects to the posts index page with a success message.
     */
    public function store(PostRequest $request)
    {
        // لا حاجة للتحقق هنا لأن PostRequest يتولى عملية التحقق
        $validatedData = $request->validated();

        $this->post->create($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Retrieves a post by its ID and displays it in the 'posts.show' view.
     *
     * @param int $id The ID of the post to retrieve.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the post with the given ID is not found.
     * @return \Illuminate\Contracts\View\View The rendered 'posts.show' view.
     */
    public function show($id)
{
    $post = $this->post->findOrFail($id);
    return view('posts.show', compact('post'));
}


    /**
     * Retrieves a post by its ID and displays it in the 'posts.edit' view.
     *
     * @param int $id The ID of the post to retrieve.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the post with the given ID is not found.
     * @return \Illuminate\Contracts\View\View The rendered 'posts.edit' view.
     */
    public function edit($id)
    {
        $post = $this->post->findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Updates a post with the given ID using the validated request data.
     *
     * @param UpdatePostRequest $request The request object containing the validated data.
     * @param int $id The ID of the post to update.
     * @return \Illuminate\Http\RedirectResponse Redirects to the posts index page with a success message.
     */
    public function update(UpdatePostRequest $request, $id)
    {
    
        $validatedData = $request->validated();

        $post = $this->post->findOrFail($id);
        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Deletes a post with the given ID.
     *
     * @param int $id The ID of the post to delete.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the post with the given ID is not found.
     * @return \Illuminate\Http\RedirectResponse Redirects to the posts index page with a success message.
     */
    public function destroy($id)
    {
        $post = $this->post->findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
