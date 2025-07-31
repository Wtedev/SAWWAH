@extends('layouts.app')

@section('title', 'نموذج الاقتراح')

@section('content')
<div class="max-w-2xl mx-auto py-16 px-6">
    <h1 class="text-3xl font-bold text-blue-800 mb-6 text-center">🧠 اقترح فكرة جديدة</h1>

    @if(session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('suggest.store') }}" class="bg-white shadow-md rounded-lg p-6 space-y-6">
        @csrf

        <div>
            <label class="block text-gray-700 font-semibold mb-2">الاسم:</label>
            <input type="text" name="name" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">البريد الإلكتروني:</label>
            <input type="email" name="email" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">محتوى الاقتراح:</label>
            <textarea name="suggestion" rows="5" required
                      class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <div class="text-center">
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                ✉️ إرسال الاقتراح
            </button>
        </div>
    </form>
</div>
@endsection
