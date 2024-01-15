<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscriptionRequest extends FormRequest
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
            'note_bac' => 'required|numeric',
            'annee_bac' => 'required|integer|min:1900|max:' . date('Y'),
            'intitule_diplome' => 'required|string|max:255',
            'note_diplome' => 'required|numeric',
            'annee_diplome' => 'required|integer|min:1900|max:' . date('Y'),
        ];
    }
}
