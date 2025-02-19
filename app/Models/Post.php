<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Post",
 *     type="object",
 *     title="Post",
 *     description="Post model",
 *     required={"title", "brand", "due_date", "platform", "status", "assigned_to"},
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
 *         format="date-time",
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
class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'brand',
        'desc',
        'image',
        'due_date',
        'platform',
        'payment',
        'status',
        'assigned_to',
    ];
}
