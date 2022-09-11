<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:250',
            'dateStart' => 'required|date',
            'dateFinish' => 'nullable|date',
            'note' => 'nullable|string',
            'isPrivate' => 'integer|nullable',
        ];
    }
}
