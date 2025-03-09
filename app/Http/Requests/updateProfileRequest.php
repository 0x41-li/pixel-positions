<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateProfileRequest extends FormRequest
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
            'name' => ['required', 'string',  'max:255'],
            'email' => ['prohibited'],
            'role' => ['string', 'in:job_seeker,employer'],
            'profile_picture' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048']
        ];
    }

    public function messages()
    {
        return [
            'profile_picture.image' => 'The profile picture must be an image.',
            'profile_picture.mimes' => 'Only PNG, JPG, and JPEG files are allowed.',
            'profile_picture.max' => 'The profile picture cannot be larger than 2MB.',
        ];
    }
}
