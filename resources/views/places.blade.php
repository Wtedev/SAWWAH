@extends('layout.app')

@section('title', 'الوجهات السياحية الأكثر زيارة')

@section('content')

{{-- قسم بطل --}}
<section class="bg-[url('/images/bg-hero.jpg')] bg-cover bg-center text-white py-32 text-center mb-16 shadow-xl">
    <h1 class="text-5xl font-bold mb-4 drop-shadow-lg">🌍 الوجهات السياحية الأكثر زيارة</h1>
    <p class="text-xl drop-shadow-md">اكتشف أجمل الأماكن داخل السعودية وخارجها مع سواح</p>
</section>

{{-- قسم داخل السعودية --}}
<section class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-pink-600 mb-6 text-center">داخل السعودية </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-16">
        @foreach([
            ['img' => 'riyadh.jpg', 'name' => 'الرياض', 'desc' => 'العاصمة المليئة بالتاريخ، ناطحات السحاب والمراكز الترفيهية'],
            ['img' => 'jeddah.jpg', 'name' => 'جدة', 'desc' => 'عروس البحر الأحمر، أسواق شعبية وكورنيش مذهل'],
            ['img' => 'alula.jpg', 'name' => 'العلا', 'desc' => 'موقع أثري مذهل يجمع بين الطبيعة والتاريخ'],
            ['img' => 'abha.jpg', 'name' => 'أبها', 'desc' => 'الوجهة الصيفية ذات الطبيعة الساحرة والضبابية'],
            ['img' => 'taif.jpg', 'name' => 'الطائف', 'desc' => 'مدينة الورد والجبال المعتدلة'],
            ['img' => 'madinah.jpg', 'name' => 'المدينة', 'desc' => 'وجهة روحية وسياحية مليئة بالتاريخ والسكينة']
        ] as $place)
            <div class="group relative overflow-hidden rounded-xl shadow-xl hover:scale-105 transition duration-300 bg-white">
                <img src="/images/{{ $place['img'] }}" alt="{{ $place['name'] }}" class="w-full h-60 object-cover group-hover:brightness-75 transition duration-300">
                <div class="absolute bottom-0 w-full p-4 bg-black/60 text-white opacity-0 group-hover:opacity-100 transition duration-300">
                    <h3 class="text-xl font-bold">{{ $place['name'] }}</h3>
                    <p class="text-sm mt-1">{{ $place['desc'] }}</p>
                    <div class="text-yellow-400 mt-2">★★★★☆</div>
                    <a href="/suggest" class="text-pink-300 font-semibold underline block mt-2">عرض الفعاليات</a>
                </div>
            </div>
        @endforeach
    </div>

    {{-- قسم خارج السعودية --}}
    <h2 class="text-3xl font-bold text-pink-600 mb-6 text-center">خارج السعودية </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach([
            ['img' => 'dubai.jpg', 'name' => 'دبي', 'desc' => 'برج خليفة، التسوق العالمي، الشواطئ الفاخرة'],
            ['img' => 'doha.jpg', 'name' => 'الدوحة', 'desc' => 'التراث القطري والمرافق الحديثة'],
            ['img' => 'kuwait.jpg', 'name' => 'الكويت', 'desc' => 'مراكز التسوق، الأبراج، والمطبخ الخليجي'],
            ['img' => 'manama.jpg', 'name' => 'المنامة', 'desc' => 'الأسواق التقليدية وجمال الخليج'],
            ['img' => 'istanbul.jpg', 'name' => 'إسطنبول', 'desc' => 'جسر بين آسيا وأوروبا، المساجد والأسواق'],
            ['img' => 'paris.jpg', 'name' => 'باريس', 'desc' => 'عاصمة الأناقة والفن والمقاهي الفرنسية']
        ] as $place)
            <div class="group relative overflow-hidden rounded-xl shadow-xl hover:scale-105 transition duration-300 bg-white">
                <img src="/images/{{ $place['img'] }}" alt="{{ $place['name'] }}" class="w-full h-60 object-cover group-hover:brightness-75 transition duration-300">
                <div class="absolute bottom-0 w-full p-4 bg-black/60 text-white opacity-0 group-hover:opacity-100 transition duration-300">
                    <h3 class="text-xl font-bold">{{ $place['name'] }}</h3>
                    <p class="text-sm mt-1">{{ $place['desc'] }}</p>
                    <div class="text-yellow-400 mt-2">★★★★★</div>
                    <a href="/suggest" class="text-pink-300 font-semibold underline block mt-2">عرض الفعاليات</a>
                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection
