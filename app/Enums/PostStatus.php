<?php

namespace App\Enums;

/**
 * @OA\Schema(
 *   schema="PostStatus",
 *   type="string",
 *   description="Status of the post",
 *   enum={"todo", "in_progress", "approved", "published"}
 * )
 */
enum PostStatus: string
{
    case TODO = 'todo';
    case IN_PROGRESS = 'in_progress';
    case APPROVED = 'approved';
    case PUBLISHED = 'published';
}
