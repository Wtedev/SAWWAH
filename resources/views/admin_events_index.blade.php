@extends('layout')

@section('title', 'إدارة الفعاليات')

@section('content')
<div class="max-w-6xl mx-auto py-16 px-6">
    <h1 class="text-3xl font-bold text-blue-800 mb-6">📋 قائمة الفعاليات</h1>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-blue-100 text-blue-800">
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">العنوان</th>
                <th class="border px-4 py-2">الموقع</th>
                <th class="border px-4 py-2">التحكم</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 1; $i <= 3; $i++)
            <tr>
                <td class="border px-4 py-2">{{ $i }}</td>
                <td class="border px-4 py-2">فعالية {{ $i }}</td>
                <td class="border px-4 py-2">الرياض</td>
                <td class="border px-4 py-2">
                    <a href="#" class="text-blue-600 hover:underline">✏️ تعديل</a>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection
