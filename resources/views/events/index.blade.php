@extends('layout.app')

@section('title', 'الفعاليات - سواح')

@section('content')
<style>
    .event-card {
        transition: all 0.3s ease;
        cursor: pointer;
        background: white;
        border-radius: 0.75rem;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
    }
</style>

<div class="text-center mb-8">
  <h1 class="text-3xl font-bold">فعاليات السعودية القادمة</h1>
  <p class="text-gray-500 mt-2">اختاري المدينة لعرض فعالياتها فقط</p>
</div>

<div class="max-w-md mx-auto mb-6">
  <select id="citySelect" onchange="filterEvents()" class="w-full border-gray-300 rounded-lg p-3">
    <option value="all">جميع المدن</option>
    @foreach($upcomingEvents->pluck('city')->unique() as $city)
      <option value="{{ $city }}">{{ $city }}</option>
    @endforeach
  </select>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4" id="eventsGrid">
  @foreach($upcomingEvents as $event)
    <div class="event-card relative" data-city="{{ $event->city }}">
      <div class="relative h-48">
        <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->name }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
      </div>
      <div class="p-5 relative">
        <h3 class="text-xl font-bold text-pink-600 mb-3">{{ $event->name }}</h3>
        <div class="space-y-2 mb-8">
          <div class="flex items-center text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span>{{ $event->start_date->format('j F') }} - {{ $event->end_date ? $event->end_date->format('j F') : '' }}</span>
          </div>
          <div class="flex items-center text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>{{ $event->city }} - {{ $event->location }}</span>
          </div>
          @if($event->cost)
          <div class="flex items-center text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span>{{ $event->cost }}</span>
          </div>
          @endif
          <p class="text-gray-600 line-clamp-2">{{ $event->description }}</p>
        </div>
        <div class="absolute left-5 bottom-5">
          <div class="flex items-center text-pink-600">
            <span class="text-sm ml-1">عرض التفاصيل</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </div>
        </div>
      </div>
    </div>
  @endforeach


</div>
<script>
    document.querySelectorAll('.event-card').forEach(card => {
        card.addEventListener('click', () => {
            alert("📢 قريباً سيتم عرض تفاصيل الفعالية 🎉");
        });
    });
    function filterEvents() {
        const selectedCity = document.getElementById("citySelect").value;
        const allCards = document.querySelectorAll(".event-card");

        allCards.forEach(card => {
            const cardCity = card.getAttribute("data-city");
            if (selectedCity === "all" || selectedCity === cardCity) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    }
</script>

@endsection