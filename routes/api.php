<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

/**
 * @OA\Get(
 *     path="/api/user",
 *     summary="Get authenticated user",
 *     tags={"User"},
 *     security={{"sanctum":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer"),
 *             @OA\Property(property="name", type="string"),
 *             @OA\Property(property="email", type="string")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthenticated"
 *     )
 * )
 */
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/**
 * @OA\Get(
 *     path="/api/posts",
 *     summary="Get list of posts",
 *     tags={"Posts"},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Post"))
 *     )
 * )
 * @OA\Post(
 *     path="/api/posts",
 *     summary="Create a new post",
 *     tags={"Posts"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Post")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Post created",
 *         @OA\JsonContent(ref="#/components/schemas/Post")
 *     )
 * )
 * @OA\Get(
 *     path="/api/posts/{id}",
 *     summary="Get a single post",
 *     tags={"Posts"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(ref="#/components/schemas/Post")
 *     )
 * )
 * @OA\Put(
 *     path="/api/posts/{id}",
 *     summary="Update a post",
 *     tags={"Posts"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Post")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Post updated",
 *         @OA\JsonContent(ref="#/components/schemas/Post")
 *     )
 * )
 * @OA\Delete(
 *     path="/api/posts/{id}",
 *     summary="Delete a post",
 *     tags={"Posts"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="Post deleted"
 *     )
 * )
 */
Route::apiResource('posts', PostController::class);
