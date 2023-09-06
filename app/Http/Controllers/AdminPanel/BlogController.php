<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateBlogRequest;
use App\Http\Requests\AdminPanel\UpdateBlogRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Blog;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;
use Flash;

class BlogController extends AppBaseController
{
    /** @var BlogRepository $blogRepository*/
    private $blogRepository;

    public function __construct(BlogRepository $blogRepo)
    {
        $this->blogRepository = $blogRepo;

        $this->middleware('permission:View Blog|Add Blog|Edit Blog|Delete Blog', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Blog', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Blog', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Blog', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $blogs = $this->blogRepository->all();

        return view('AdminPanel.blogs.index',get_defined_vars());
    }


    public function create()
    {
        return view('AdminPanel.blogs.create');
    }


    public function store(CreateBlogRequest $request)
    {
        $input = $request->all();

        $blog = $this->blogRepository->create($input);


        return redirect(route('blogs.index'))->with('success',__('lang.created'));
    }


    // public function show($id)
    // {
    //     $blog = $this->blogRepository->find($id);

    //     if (empty($blog)) {
    //         Flash::error('Blog not found');

    //         return redirect(route('blogs.index'));
    //     }

    //     return view('blogs.show')->with('blog', $blog);
    // }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('AdminPanel.blogs.edit',get_defined_vars());
    }


    public function update($id, UpdateBlogRequest $request)
    {
        $blog = Blog::findOrFail($id);


        $blog = $this->blogRepository->update($request->all(), $id);


        return redirect(route('blogs.index'))->with('success',__('lang.updated'));
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $this->blogRepository->delete($id);
        return redirect(route('blogs.index'))->with('error',__('lang.deleted'));
    }
}
