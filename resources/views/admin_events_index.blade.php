@extends('layout.app')

@section('title', 'إدارة الفعاليات')

@section('content')

    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-gray-800">إدارة الفعاليات</h1>
        <p class="text-gray-500 mt-2">هنا يمكنك استعراض وتعديل أو حذف الفعاليات السياحية المضافة.</p>
    </div>

    {{-- زر إضافة فعالية --}}
    <div class="text-right mb-6 max-w-6xl mx-auto">
        <a href="{{ route('admin.events.create') }}" class="bg-pink-500 hover:bg-pink-600 text-white px-5 py-2 rounded-full font-bold">
            + إضافة فعالية جديدة
        </a>
    </div>

    {{-- جدول الفعاليات --}}
    <div class="overflow-x-auto max-w-6xl mx-auto">
        <table class="w-full text-sm text-right text-gray-600 bg-white shadow rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700 text-sm">
                <tr>
                    <th class="px-4 py-3">اسم الفعالية</th>
                    <th class="px-4 py-3">التاريخ</th>
                    <th class="px-4 py-3">الموقع</th>
                    <th class="px-4 py-3">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    <tr class="border-t">
                        <td class="px-4 py-3 font-bold">{{ $event->name }}</td>
                        <td class="px-4 py-3">{{ $event->date }}</td>
                        <td class="px-4 py-3">{{ $event->location }}</td>
                        <td class="px-4 py-3 space-x-2 space-x-reverse">
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="text-blue-600 hover:underline">تعديل</a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('هل أنت متأكد من حذف الفعالية؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">لا توجد فعاليات حالياً</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
