<?php

namespace App\Http\Requests;

class UpdatePostFormRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title'          => 'required',
            'slug'           => 'unique:posts,slug,' . $this->segment(2),
            'date_start'     => 'required',
            'date_end'       => 'required',
            'url_site'       => 'url',
            'excerpt'        => 'required|max:60',
            'content'        => 'required',
            'thumbnail_link' => 'image'
        ];
    }
}
