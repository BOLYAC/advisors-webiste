<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostTopicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo_file' => 'mimes:png,jpeg,jpg,gif|max:3000',
            'audio_file' => 'mimes:mpga,wav',
            'video_file' => 'mimes:mp4,ogv,webm'
        ];
    }
}
