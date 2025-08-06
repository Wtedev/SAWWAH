<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function store(Request $request)
    {
        // استلام جميع المعايير من الفورم
        $travelDate = $request->input('travel_date');
        $budget = $request->input('budget');
        $attraction = $request->input('attraction');
        $travelWith = $request->input('travel_with');
        $languagePreference = $request->input('language_preference');

        // تحويل التاريخ إلى اسم الشهر بالعربية
        $months = [
            'January' => 'يناير',
            'February' => 'فبراير',
            'March' => 'مارس',
            'April' => 'أبريل',
            'May' => 'مايو',
            'June' => 'يونيو',
            'July' => 'يوليو',
            'August' => 'أغسطس',
            'September' => 'سبتمبر',
            'October' => 'أكتوبر',
            'November' => 'نوفمبر',
            'December' => 'ديسمبر'
        ];

        $travelMonth = $months[date('F', strtotime($travelDate))];

        // جلب جميع البلدان
        $countries = Country::all();

        // حساب درجة التطابق لكل دولة
        $rankedCountries = $countries->map(function ($country) use ($travelMonth, $budget, $attraction, $travelWith, $languagePreference) {
            $score = 0;

            // تطابق الشهر (أهم معيار)
            if ($country->best_month_to_travel === $travelMonth) {
                $score += 40;
            }

            // تطابق الميزانية
            if ($country->preferred_budget === $budget) {
                $score += 20;
            }

            // تطابق نوع الجذب السياحي
            if ($country->attraction === $attraction) {
                $score += 15;
            }

            // تطابق نمط السفر
            if ($country->travel_with === $travelWith) {
                $score += 15;
            }

            // تطابق اللغة المفضلة
            if ($country->language_preference === $languagePreference) {
                $score += 10;
            }

            return [
                'country' => $country,
                'score' => $score
            ];
        });

        // ترتيب البلدان حسب درجة التطابق
        $rankedCountries = $rankedCountries->sortByDesc('score');

        // اختيار أفضل 3 وجهات
        $suggestedCountries = $rankedCountries->take(3)->map(function ($item) {
            return $item['country'];
        });

        // عرض النتائج للمستخدم
        return view('suggest.result', compact('suggestedCountries'));
    }
}
