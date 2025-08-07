@extends('layout.app')

@section('title', 'قائمة الوجهات السياحية - سواح')

@section('content')
<div class="p-6 md:p-10 lg:p-16">
    <!-- قسم رأس الصفحة -->
    <div class="mb-8 text-center md:text-right">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">قائمة الوجهات السياحية</h1>
        <p class="text-gray-600 text-lg">اكتشف وجهتك السياحية المثالية معنا </p>
    </div>

    <!-- شبكة الوجهات -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($countries as $countrie)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 flex flex-col h-full">
            <div class="flex flex-col md:flex-row-reverse flex-1">
                <div class="md:w-1/2 p-6 flex items-center justify-center">
                    <img src="{{asset('uploads/'.$countrie->image)}}" alt="صورة {{$countrie->name}}" class="rounded-xl shadow-md object-cover h-48 w-full">
                </div>
                <div class="md:w-1/2 p-6 text-right">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">{{$countrie->name}}</h2>
                    <p class="text-gray-600 text-sm mb-4">{{$countrie->description}}</p>
                    <div class="flex flex-col space-y-2">
                        @if($countrie->currency)
                        <div class="flex items-center text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-3 rtl:mr-3 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1.93.82 1.62 2.02 1.62 1.19 0 1.78-.65 1.78-1.38 0-.72-.59-1.19-2-1.59-2.09-.56-3.81-1.39-3.81-3.67 0-1.72 1.39-2.96 3.34-3.32V4.46h2.67v1.88c1.84.32 2.89 1.73 2.93 3.26h-1.97c-.05-.75-.64-1.56-1.87-1.56-1.1 0-1.8.58-1.8 1.31 0 .67.67 1.13 2.04 1.54 2.14.6 3.81 1.47 3.81 3.71-.01 2-1.45 3.13-3.16 3.49z"/>
                            </svg>
                            <span class="mr-1">{{$countrie->currency}}</span>
                        </div>
                        @endif

                        @if(isset($countrie->weather_info) && isset($countrie->weather_info->temp))
                        <div class="flex items-center text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-3 rtl:mr-3 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M15 13V5c0-1.66-1.34-3-3-3S9 3.34 9 5v8c-1.21.91-2 2.37-2 4 0 2.76 2.24 5 5 5s5-2.24 5-5c0-1.63-.79-3.09-2-4zm-4-8c0-.55.45-1 1-1s1 .45 1 1h-2z"/>
                            </svg>
                            <span class="mr-1">{{$countrie->weather_info->temp}}° C</span>
                        </div>
                        @endif

                        @if(isset($countrie->weather_info) && isset($countrie->weather_info->condition))
                        <div class="flex items-center text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-3 rtl:mr-3 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96z"/>
                            </svg>
                            <span class="mr-1">{{$countrie->weather_info->condition}}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-pink-100 text-pink-600 p-4 text-center font-semibold rounded-b-2xl transition-colors duration-300 hover:bg-pink-200 shadow-sm mt-auto">
                <a href="{{route('countries.show',$countrie->slug)}}" class="flex items-center justify-center">
                    <span>عرض التفاصيل</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
