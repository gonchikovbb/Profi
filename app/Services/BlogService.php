<?php

namespace App\Services;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogService
{
    public function listBlog(Request $request)
    {
        $blogs = Blog::query()->paginate($request->get('per_page') ?? 10);

        return BlogResource::collection($blogs);
    }

    public function saveBlog(StoreBlogRequest $request): BlogResource
    {
        return new BlogResource(Blog::create($request->validated()));
    }

    public function updateBlog(StoreBlogRequest $request, Blog $blog): BlogResource
    {
        $blog->update($request->validated());

        return new BlogResource($blog);
    }

    public function destroyBlog(Blog $blog)
    {
        $blog->delete();

        return response()->json(['message' => 'Blog deleted'],200);
    }
}
