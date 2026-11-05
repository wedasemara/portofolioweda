<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $imageMaxKb = (int) config('cms.uploads.image_max_kb', 5120);

        return [
            'settings' => ['nullable', 'array'],
            'settings.*' => ['nullable', 'string', 'max:20000'],
            'hero_thumbnail_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:'.$imageMaxKb],
            'about_photo_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:'.$imageMaxKb],
        ];
    }
}
