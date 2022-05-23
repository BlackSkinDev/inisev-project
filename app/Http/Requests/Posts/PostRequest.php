<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

use Illuminate\Contracts\Validation\Validator;

class PostRequest extends FormRequest
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
            'title' => 'required|string|unique:posts',
            'description' => 'required|string',
        ];
    }

    // public function validated()
    // {
    //     return array_merge(parent::validated(), [
    //         'website' => $this->input('height'),
    //     ]);
    // }

    protected function failedValidation(Validator $validator) {

        // throw new HttpResponseException(response()->json([
        //     'status' => 'error',
        //     'message' =>null,
        //     'data'=>$validator->errors()->all()],Response::HTTP_BAD_REQUEST
        // ));
        throw new HttpResponseException(response([
            'status' => 'error',
            'message' =>null,
            'data'=>$validator->errors()
        ],Response::HTTP_BAD_REQUEST));
    }
}
