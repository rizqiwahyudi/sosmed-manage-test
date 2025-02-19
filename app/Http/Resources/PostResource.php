<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
        /**
         * @OA\Schema(
         *     schema="PostResource",
         *     type="object",
         *     title="Post Resource",
         *     description="Post resource for API responses",
         *     @OA\Property(
    *         property="title",
    *         type="string",
    *         description="Title of the post"
    *     ),
    *     @OA\Property(
    *         property="brand",
    *         type="string",
    *         description="Brand associated with the post"
    *     ),
    *     @OA\Property(
    *         property="desc",
    *         type="string",
    *         description="Description of the post"
    *     ),
    *     @OA\Property(
    *         property="image",
    *         type="string",
    *         description="Image URL of the post"
    *     ),
    *     @OA\Property(
    *         property="due_date",
    *         type="string",
    *         format="date",
    *         description="Due date of the post"
    *     ),
    *     @OA\Property(
    *         property="platform",
    *         type="string",
    *         description="Platform where the post will be published"
    *     ),
    *     @OA\Property(
    *         property="payment",
    *         type="number",
    *         format="float",
    *         description="Payment for the post"
    *     ),
    *     @OA\Property(
    *         property="status",
    *         type="string",
    *         enum={"todo", "in_progress", "approved", "published"},
    *         description="Status of the post"
    *     ),
    *     @OA\Property(
    *         property="assigned_to",
    *         type="string",
    *         description="User Name to whom the post is assigned"
    *     )
         * )
        */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
