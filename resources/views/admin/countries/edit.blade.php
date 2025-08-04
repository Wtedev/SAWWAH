@extends('layout.app')

@section('title','تعديل دولة')

@section('content')
<h1 class="text-2xl font-bold mb-4">
    {{'➕ تعديل دولة' }}
</h1>

<form method="POST" action="{{route('admin.countries.update',$country->slug)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block mb-1 font-semibold">اسم الدولة </label>
        <input type="text" name="name" value="{{$country->name}}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">الوصف</label>
        <textarea name="description" class="w-full border rounded px-3 py-2">{{$country->description}}</textarea>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">العملة</label>
        <input type="text" name="currency" value="{{$country->currency}}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">الميزانية اليومية</label>
        <input type="text" name="daily_budget" value="{{$country->daily_budget}}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">درجة الحرارة</label>
        <input type="text" name="temp" value="{{$country->weather_info->temp}}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">الطقس</label>
        <input type="text" name="condition" value="{{$country->weather_info->condition}}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">صورة الدولة</label>
        <input type="file" name="image"  class="w-full border rounded px-3 py-2">
    </div>




    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
        تعديل
    </button>
</form>
@endsection
