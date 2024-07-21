<?php

namespace App\Http\Requests\MediaPlan;

use Illuminate\Foundation\Http\FormRequest;

class PostMediaPlanRequest extends FormRequest
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
            'objective' => 'required|integer',
            'periodicity' => 'required|in:Récurrent,Ponctuel',
            'periodicity_one' => 'nullable|integer',
            'budget' => 'required|integer',
            'start_date_wish' => 'required|integer',
            'start_date' => 'nullable|date',
            'start_date_flexibility' => 'nullable|integer',
            'end_date_wish' => 'required|integer',
            'end_date' => 'nullable|date',
            'end_date_flexibility' => 'nullable|integer',
            'campaign_id' => 'required|exists:campaigns,id',
            'announcer_id' => 'required|exists:announcers,id'
        ];
    }
}
