<?php

namespace App\Http\Requests\MediaPlan;

use Illuminate\Foundation\Http\FormRequest;

class PatchMediaPlanRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'objective' => 'sometimes|required|integer',
            'periodicity' => 'sometimes|required|in:Récurrent,Ponctuel',
            'periodicity_one' => 'nullable|integer',
            'budget' => 'sometimes|required|integer',
            'start_date_wish' => 'sometimes|required|integer',
            'start_date' => 'sometimes|nullable|date',
            'start_date_flexibility' => 'sometimes|nullable|integer',
            'end_date_wish' => 'sometimes|required|integer',
            'end_date' => 'sometimes|nullable|date',
            'end_date_flexibility' => 'sometimes|nullable|integer',
            'campaign_id' => 'sometimes|required|exists:campaigns,id',
            'announcer_id' => 'sometimes|required|exists:announcers,id',
        ];
    }
}
