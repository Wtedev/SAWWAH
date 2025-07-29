@extends('layout')

@section('title', 'إضافة/تعديل فعالية')

@section('content')
<div class="max-w-xl mx-auto py-16 px-6">
    <h1 class="text-2xl font-bold text-blue-800 mb-6">➕ إضافة أو تعديل فعالية</h1>

    <form method="POST" action="#" class="bg-white shadow rounded p-6 space-y-4">
        @csrf

        <input type="text" name="title" placeholder="عنوان الفعالية"
               class="w-full px-4 py-2 border rounded" required>

        <input type="text" name="location" placeholder="الموقع"
               class="w-full px-4 py-2 border rounded" required>

        <textarea name="description" rows="4" placeholder="وصف الفعالية"
                  class="w-full px-4 py-2 border rounded"></textarea>

        <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            💾 حفظ
        </button>
    </form>
</div>
@endsection
