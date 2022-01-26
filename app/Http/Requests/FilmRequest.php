<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = auth()->id();
        return $user == 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:200'],
            'description' => ['required', 'string', 'min:3', 'max:500'],
            'rating' => ['required', 'integer', 'min:0', 'max:10'],
            'genre_id' => ['required', 'integer', 'exists:genres,id'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }
}
