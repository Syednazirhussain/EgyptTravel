<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Repositories\BlogPostRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\BlogCategory;

class BlogPostController extends Controller
{
    /** @var  BlogPostRepository */
    private $blogPostRepository;

    public function __construct(BlogPostRepository $blogPostRepo)
    {
        $this->blogPostRepository = $blogPostRepo;
    }

    /**
     * Display a listing of the BlogPost.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->blogPostRepository->pushCriteria(new RequestCriteria($request));
        $blogPosts = $this->blogPostRepository->all();


        return view('blog_posts.index')->with('blogPosts', $blogPosts);
    }

    /**
     * Show the form for creating a new BlogPost.
     *
     * @return Response
     */
    public function create()
    {
        $blogCategory = BlogCategory::all();

        $data = [
            'blogCategorys'  => $blogCategory
        ];

        return view('blog_posts.create',$data);
    }

    /**
     * Store a newly created BlogPost in storage.
     *
     * @param CreateBlogPostRequest $request
     *
     * @return Response
     */
    public function store(CreateBlogPostRequest $request)
    {
        $input = $request->all();

        $blogPost = $this->blogPostRepository->create($input);

        Flash::success('Blog Post saved successfully.');

        return redirect(route('blogPosts.index'));
    }

    /**
     * Display the specified BlogPost.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $blogPost = $this->blogPostRepository->findWithoutFail($id);

        if (empty($blogPost)) {
            Flash::error('Blog Post not found');

            return redirect(route('blogPosts.index'));
        }

        return view('blog_posts.show')->with('blogPost', $blogPost);
    }

    /**
     * Show the form for editing the specified BlogPost.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $blogPost = $this->blogPostRepository->findWithoutFail($id);

        if (empty($blogPost)) {
            Flash::error('Blog Post not found');

            return redirect(route('blogPosts.index'));
        }

        return view('blog_posts.edit')->with('blogPost', $blogPost);
    }

    /**
     * Update the specified BlogPost in storage.
     *
     * @param  int              $id
     * @param UpdateBlogPostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBlogPostRequest $request)
    {
        $blogPost = $this->blogPostRepository->findWithoutFail($id);

        if (empty($blogPost)) {
            Flash::error('Blog Post not found');

            return redirect(route('blogPosts.index'));
        }

        $blogPost = $this->blogPostRepository->update($request->all(), $id);

        Flash::success('Blog Post updated successfully.');

        return redirect(route('blogPosts.index'));
    }

    /**
     * Remove the specified BlogPost from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $blogPost = $this->blogPostRepository->findWithoutFail($id);

        if (empty($blogPost)) {
            Flash::error('Blog Post not found');

            return redirect(route('blogPosts.index'));
        }

        $this->blogPostRepository->delete($id);

        Flash::success('Blog Post deleted successfully.');

        return redirect(route('blogPosts.index'));
    }
}
