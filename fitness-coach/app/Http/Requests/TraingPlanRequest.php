<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TraingPlanRequest extends FormRequest
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
            'time_per_week' => 'required|int',
            'level' => 'required|string',
            'goal' => 'required|string',
            'started_at' => 'date',
            'finished_at' => 'date',
        ];
    }
}
