<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BlogController extends Controller
{
    private BlogService $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * * @return AnonymousResourceCollection
 */
    public function index(Request $request): AnonymousResourceCollection
    {
        return $this->blogService->listBlog($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return BlogResource
     */
    public function store(StoreBlogRequest $request)
    {
        return $this->blogService->saveBlog($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogRequest $request, Blog $blog): BlogResource
    {
        return $this->blogService->updateBlog($request, $blog);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        return $this->blogService->destroyBlog($blog);
    }
}
