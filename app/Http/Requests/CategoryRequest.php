<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // aturan validasi terhadap form category
        return [
            'name'        => ['required', 'string', 'max:255'],
            'icon'        => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'budget'      => ['nullable', 'numeric'],
            'type'        => ['required', 'string', 'max:255'],
        ];
    }

    // melempatan exception jika validasi gagal, dengan detail kesalahan
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            "status"  => "bad request",
            "code"    => 400,
            "message" => "Input data is not valid",
            "errors"  => $validator->getMessageBag()
        ], 400));
    }
}
