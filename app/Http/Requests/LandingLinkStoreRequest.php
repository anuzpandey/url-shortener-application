<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class LandingLinkStoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return TRUE;
    }


    public function rules(): array
    {
        return [
            'url' => 'required|url|max:255',
            'title' => 'required|max:255',
            'expired_at' => 'nullable|date|after:today',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'title' => Str::extractDomainName($this->input('url')),
        ]);
    }
}
