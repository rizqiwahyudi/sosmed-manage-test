<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

/**
 * @OA\Info(
 *     title="Post Management API",
 *     version="1.0.0",
 *     description="A simple API to manage social media posting",
 *     @OA\Contact(
 *        email="rizqiwahyudi57@gmail.com"
 *    )
 * )
 */
class PostController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/posts",
     *     summary="Get list of posts",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/PostResource"))
     *     )
     *  )
     */
    public function index()
    {
        return new PostResource(Post::all());
    }

    /**
     * @OA\Post(
     *     path="/api/posts",
     *     summary="Create a new post",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StorePostRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Post created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/PostResource")
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Failed to create post",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function store(StorePostRequest $request)
    {
        try {
            $post = Post::create($request->validated());
            return response()->json([
                'data' => new PostResource($post),
                'message' => 'Post created successfully'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to create post',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/posts/{id}",
     *     summary="Get a specific post",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Post retrieved successfully",
     *         @OA\JsonContent(ref="#/components/schemas/PostResource")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $post = Post::find($id);

        if ($post){
            $post = new PostResource($post);
            return response()->json([
                'data' => $post,
                'message' => 'Post retrieved successfully'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Post not found',
            ], 404);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/posts/{id}",
     *     summary="Update a specific post",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdatePostRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Post updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/PostResource")
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Failed to update post",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            $post->update($request->validated());
            return response()->json([
                'data' => new PostResource($post),
                'message' => 'Post updated successfully'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to update post',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/posts/{id}",
     *     summary="Delete a specific post",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Post deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *         )
     *      ),
     *     @OA\Response(
     *         response=500,
     *         description="Failed to delete post",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return response()->json([
                'message' => 'Post deleted successfully'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to delete post',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
