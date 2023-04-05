<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class videoUploadRequest extends FormRequest
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
            'title' => 'required| max: 255',
            'video' => 'required| mimes:mp4',
            'description' => 'max: 1255',
            'category' => 'required',
        ];
    }

    public function messages()
    {
        return [
            '*.max' => 'Привышен лимит символов',
            'title.required' => 'Пожалуйста, заполните это поле',
            'video.required' => 'Мы не можем загрузить видео без видео',
            'video.mimes' => 'Некорректный формат, разрешён только "mp4"',

        ];
    }
}
