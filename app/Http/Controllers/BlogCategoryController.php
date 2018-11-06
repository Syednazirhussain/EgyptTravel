<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;
use App\Repositories\BlogCategoryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BlogCategoryController extends Controller
{
    /** @var  BlogCategoryRepository */
    private $blogCategoryRepository;

    public function __construct(BlogCategoryRepository $blogCategoryRepo)
    {
        $this->blogCategoryRepository = $blogCategoryRepo;
    }

    /**
     * Display a listing of the BlogCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->blogCategoryRepository->pushCriteria(new RequestCriteria($request));
        $blogCategories = $this->blogCategoryRepository->all();

        return view('blog_categories.index')->with('blogCategories', $blogCategories);
    }

    /**
     * Show the form for creating a new BlogCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('blog_categories.create');
    }

    /*
     * Store a newly created BlogCategory in storage.
     *
     * @param CreateBlogCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateBlogCategoryRequest $request)
    {
        $input = $request->all();

        $blogCategory = $this->blogCategoryRepository->create($input);

        $request->session()->flash('msg.success','Blog Category saved successfully.');

        return redirect(route('admin.blogCategories.index'));
    }

    /**
     * Display the specified BlogCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $blogCategory = $this->blogCategoryRepository->findWithoutFail($id);

        if (empty($blogCategory)) {
            Flash::error('Blog Category not found');

            return redirect(route('blogCategories.index'));
        }

        return view('blog_categories.show')->with('blogCategory', $blogCategory);
    }

    /**
     * Show the form for editing the specified BlogCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $blogCategory = $this->blogCategoryRepository->findWithoutFail($id);

        if (empty($blogCategory)) {
            Flash::error('Blog Category not found');

            return redirect(route('blogCategories.index'));
        }

        return view('blog_categories.edit')->with('blogCategory', $blogCategory);
    }

    /**
     * Update the specified BlogCategory in storage.
     *
     * @param  int              $id
     * @param UpdateBlogCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBlogCategoryRequest $request)
    {
        $blogCategory = $this->blogCategoryRepository->findWithoutFail($id);


        if (empty($blogCategory)) 
        {
            session()->flash('msg.error','Blog Category not found');
            return redirect(route('admin.blogCategories.index'));
        }

        $blogCategory = $this->blogCategoryRepository->update($request->all(), $id);


        $request->session()->flash('msg.success','Blog Category updated successfully.');
        return redirect(route('admin.blogCategories.index'));
    }

    /**
     * Remove the specified BlogCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $blogCategory = $this->blogCategoryRepository->findWithoutFail($id);

        if (empty($blogCategory)) 
        {
            session()->flash('msg.error','Blog Category not found');
            return redirect(route('admin.blogCategories.index'));
        }

        $this->blogCategoryRepository->delete($id);

        session()->flash('msg.success','Blog Category deleted successfully.');
        return redirect(route('admin.blogCategories.index'));
    }
}
