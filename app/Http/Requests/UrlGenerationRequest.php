<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlGenerationRequest extends FormRequest
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
            'origen_url' => ['required', 'url'],
            'hours' => ['required', 'integer', 'min:0'],
            'minutes' => ['required', 'integer', 'min:0', 'max:59'],
        ];
    }

    public function messages(): array
    {
        return [
            'origen_url.required' => __('validation_urls.origen_url_required'),
            'origen_url.url' => __('validation_urls.origen_url_invalid'),
            'hours.required' => __('validation_urls.hours_required'),
            'minutes.required' => __('validation_urls.minutes_required'),
        ];
    }
}
