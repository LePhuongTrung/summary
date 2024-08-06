<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiRequest extends FormRequest
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

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors()->toArray();
        $formattedErrors = [];
        foreach ($errors as $field => $errorMessages) {
            $formattedErrors['message'][$field] = implode(' | ', $errorMessages);
        }
        $response = response()->json([
            'response_body' => $formattedErrors,
        ], 400);

        throw new HttpResponseException($response);
    }
}