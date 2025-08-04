@extends('layout.app')

@section('title', 'إدارة الفعاليات')

@section('content')
<h1 class="text-2xl font-bold mb-4">قائمة الدول</h1>
<div class="grid w-48">
    <a href="{{route('admin.countries.create')}}" class="block bg-pink-500 text-white text-center my-4 py-2 rounded-lg font-bold hover:bg-pink-600">اضافة</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    @forelse($countries as $countrie)
        <div class="event-card border p-4 rounded-lg shadow" data-city="{{$countrie->name}}">
            <h3 class="text-lg font-bold">{{$countrie->name}}</h3>
            <p class="text-gray-600">{{$countrie->description}}</p>
            <div class="flex flex-col gap-2 mt-8">
                <a href="{{route('admin.countries.edit',$countrie->slug)}}" class="block bg-pink-500 text-white text-center py-2 rounded-lg font-bold hover:bg-pink-600">تعديل</a>
                <form  action="{{route('admin.countries.destroy',$countrie->slug)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="w-full block bg-pink-800 text-white text-center py-2 rounded-lg font-bold hover:bg-pink-900" type="submit">حذف</button>
                </form>
            </div>

        </div>
    @empty
        <p class="text-center text-gray-500">لا توجد فعاليات حالياً.</p>
    @endforelse

</div>
@endsection
