<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        // Retrieve all posts
        $posts = $this->postRepository->getAll();

        // Return the posts view with the retrieved posts
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // Return the create post view
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            // Add any other validation rules for your post fields
        ]);

        // Create a new post using the repository
        $post = $this->postRepository->create($validatedData);

        // Redirect to the post details page or wherever appropriate
        return redirect()->route('posts.show', $post->id);
    }

    public function show($id)
    {
        // Find the post by ID
        $post = $this->postRepository->find($id);

        // Return the post details view with the retrieved post
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        // Find the post by ID
        $post = $this->postRepository->find($id);

        // Return the edit post view with the retrieved post
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            // Add any other validation rules for your post fields
        ]);

        // Update the post using the repository
        $post = $this->postRepository->update($id, $validatedData);

        // Redirect to the post details page or wherever appropriate
        return redirect()->route('posts.show', $post->id);
    }

    public function destroy($id)
    {
        // Delete the post using the repository
        $this->postRepository->delete($id);

        // Redirect to the post index page or wherever appropriate
        return redirect()->route('posts.index');
    }
}
