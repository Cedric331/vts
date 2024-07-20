<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaPlanRequest extends FormRequest
{

    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

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
            'name' => 'required|string|max:255',
            'objective' => 'required|string',
            'periodicity' => 'required|in:Récurrent,Ponctuel',
            'periodicity_one' => 'nullable|integer',
            'budget' => 'required|integer',
            'start_date_wish' => 'required|date',
            'start_date' => 'required|date',
            'start_date_flexibility' => 'required|string',
            'end_date' => 'nullable|date',
            'end_date_flexibility' => 'nullable|string',
            'campaign_id' => 'required|exists:campaigns,id',
            'announcer_id' => 'required|exists:announcers,id',
            'created_by' => 'required|exists:users,id',
            'updated_by' => 'nullable|exists:users,id',
        ];
    }
}
