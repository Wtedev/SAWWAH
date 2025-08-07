<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class TripPlannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'destination' => 'required|exists:countries,id',
            'departure_date' => [
                'required',
                'date',
                'after_or_equal:today'
            ],
            'return_date' => [
                'required',
                'date',
                'after_or_equal:departure_date'
            ],
            'transport_budget' => 'nullable|numeric|min:0',
            'food_budget' => 'nullable|numeric|min:0',
            'entertainment_budget' => 'nullable|numeric|min:0'
        ];
    }

    public function messages(): array
    {
        return [
            'destination.required' => 'الرجاء اختيار وجهة السفر',
            'destination.exists' => 'الوجهة المختارة غير صالحة',
            'departure_date.required' => 'الرجاء تحديد تاريخ الذهاب',
            'departure_date.date' => 'تاريخ الذهاب يجب أن يكون تاريخاً صحيحاً',
            'departure_date.after_or_equal' => 'تاريخ الذهاب يجب أن يكون اليوم أو بعد اليوم',
            'return_date.required' => 'الرجاء تحديد تاريخ العودة',
            'return_date.date' => 'تاريخ العودة يجب أن يكون تاريخاً صحيحاً',
            'return_date.after_or_equal' => 'تاريخ العودة يجب أن يكون مساوياً أو بعد تاريخ الذهاب',
            'transport_budget.numeric' => 'ميزانية المواصلات يجب أن تكون رقماً',
            'transport_budget.min' => 'ميزانية المواصلات يجب أن تكون صفر أو أكبر',
            'food_budget.numeric' => 'ميزانية الطعام يجب أن تكون رقماً',
            'food_budget.min' => 'ميزانية الطعام يجب أن تكون صفر أو أكبر',
            'entertainment_budget.numeric' => 'ميزانية الترفيه يجب أن تكون رقماً',
            'entertainment_budget.min' => 'ميزانية الترفيه يجب أن تكون صفر أو أكبر'
        ];
    }
}
