<?php

namespace App\Http\Requests;
use App\Enums\PostStatus;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * @OA\Schema(
 *     schema="StorePostRequest",
 *     type="object",
 *     title="Store Post Request",
 *     description="Validation request for storing a new post",
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
 *      ),
 *     @OA\Property(
 *         property="desc",
 *         type="string",
 *         description="Description of the post",
 *         nullable=true
 *     ),
 *     @OA\Property(
 *         property="image",
 *         type="string",
 *         description="Image URL of the post",
 *         nullable=true
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
 *         description="Payment amount for the post",
 *         nullable=true
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
 *         description="User assigned to the post"
 *     )
 * )
 */
class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string|required|unique:posts,title',
            'brand' => 'string|required',
            'desc' => 'string|nullable',
            'image' => 'string|nullable',
            'due_date' => 'date|required',
            'platform' => 'string|required',
            'payment' => 'numeric|nullable',
            'status' => [
                'required',
                Rule::enum(PostStatus::class)
            ],
            'assigned_to' => 'string|required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422)
        );
    }
}
