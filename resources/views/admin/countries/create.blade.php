@extends('layout.app')

@section('title','إضافة دولة')

@section('content')
<h1 class="text-2xl font-bold mb-4">
    {{'➕ إضافة دولة' }}
</h1>

<form method="POST" action="{{route('admin.countries.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="mb-4">
        <label class="block mb-1 font-semibold">اسم الدولة </label>
        <input type="text" name="name" value="{{old('name')}}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">الوصف</label>
        <textarea name="description" class="w-full border rounded px-3 py-2">{{old('description')}}</textarea>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">العملة</label>
        <input type="text" name="currency" value="{{old('currency')}}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">الميزانية اليومية</label>
        <input type="text" name="daily_budget" value="{{old('daily_budget')}}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">درجة الحرارة</label>
        <input type="text" name="temp" value="{{old('temp')}}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">الطقس</label>
        <input type="text" name="condition" value="{{old('condition')}}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">صورة الدولة</label>
        <input type="file" name="image" value="{{old('image')}}" class="w-full border rounded px-3 py-2">
    </div>




    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
       اضافة
    </button>
</form>
@endsection
