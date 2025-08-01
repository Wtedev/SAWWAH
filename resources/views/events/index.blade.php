@extends('layout.app')

@section('title', 'فعاليات 2025 حسب المدينة')

@section('content')
<style>
    .event-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .event-card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="text-center mb-8">
  <h1 class="text-3xl font-bold">فعاليات السعودية القادمة</h1>
  <p class="text-gray-500 mt-2">اختاري المدينة لعرض فعالياتها فقط</p>
</div>

<div class="max-w-md mx-auto mb-6">
  <select id="citySelect" onchange="filterEvents()" class="w-full border-gray-300 rounded-lg p-3">
    <option value="all">جميع المدن</option>
    <option value="jeddah">جدة</option>
    <option value="riyadh">الرياض</option>
    <option value="abha">أبها</option>
    <option value="alula">العُلا</option>
    <option value="khobar">الخبر</option>
  </select>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4" id="eventsGrid">
  <!-- جدة -->
  <div class="event-card" data-city="jeddah">
    <img src="{{ asset('images/fiba.jpg') }}" alt="FIBA Asia Cup" class="h-48 w-full object-cover rounded-t-xl">
    <div class="bg-white p-4 rounded-b-xl shadow">
      <h3 class="text-xl font-bold text-pink-600">FIBA Asia Cup 2025</h3>
      <p class="text-gray-600">5–17 أغسطس | جدة - بطولة آسيا لكرة السلة</p>
    </div>
  </div>
  <div class="event-card" data-city="jeddah">
    <img src="{{ asset('images/snooker.jpg') }}" alt="Snooker Masters" class="h-48 w-full object-cover rounded-t-xl">
    <div class="bg-white p-4 rounded-b-xl shadow">
      <h3 class="text-xl font-bold text-pink-600">Snooker Masters 2025</h3>
      <p class="text-gray-600">8–16 أغسطس | جدة - بطولة السنوكر الدولية</p>
    </div>
  </div>

  <!-- الرياض -->
  <div class="event-card" data-city="riyadh">
    <img src="{{ asset('images/esports.jpg') }}" alt="Esports World Cup" class="h-48 w-full object-cover rounded-t-xl">
    <div class="bg-white p‑4 rounded-b-xl shadow">
      <h3 class="text-xl font-bold text-pink-600">Esports World Cup 2025</h3>
      <p class="text-gray-600">7 يوليو – 24 أغسطس | الرياض - أهم حدث الرياضات الإلكترونية</p>
    </div>
  </div>
  <div class="event-card" data-city="riyadh">
    <img src="{{ asset('images/pubg.jpg') }}" alt="PUBG Mobile WC" class="h‑48 w‑full object-cover rounded‑t‑xl">
    <div class="bg-white p-4 rounded-b-xl shadow">
      <h3 class="text-xl font-bold text-pink-600">PUBG Mobile World Cup</h3>
      <p class="text-gray-600">25 يوليو – 3 أغسطس | الرياض - بطولة PUBG الإلكترونية‎</p>
    </div>
  </div>
  <div class="event-card" data-city="riyadh">
    <img src="{{ asset('images/comedy.jpg') }}" alt="Comedy Festival" class="h‑48 w‑full object-cover rounded‑t‑xl">
    <div class="bg-white p-4 rounded-b-xl shadow">
      <h3 class="text-xl font-bold text-pink-600">مهرجان الرياض للكوميديا</h3>
      <p class="text-gray-600">26 سبتمبر – 9 أكتوبر | الرياض - فعاليات كوميدية عالمية</p>
    </div>
  </div>

  <!-- أبها -->
  <div class="event-card" data-city="abha">
    <img src="{{ asset('images/soudah.jpg') }}" alt="Soudah Season" class="h‑48 w‑full object-cover rounded‑t‑xl">
    <div class="bg-white p-4 rounded-b-xl shadow">
      <h3 class="text-xl font-bold text-pink-600">موسم السودة 2025</h3>
      <p class="text-gray-600">فعاليات جبلية في أبها | 15 يوليو – 30 أغسطس</p>
    </div>
  </div>

  <!-- العُلا -->
 <!-- العُلا -->
<div class="event-card" data-city="alula">
    <img src="{{ asset('images/lahib-race.jpg') }}" alt="سباق لهيب العُلا" class="h-48 w-full object-cover rounded-t-xl">
    <div class="bg-white p-4 rounded-b-xl shadow">
      <h3 class="text-xl font-bold text-pink-600">سباق لهيب العُلا 2025</h3>
      <p class="text-gray-600">سباق صحراوي للدراجات النارية والسيارات | العُلا - أكتوبر 2025</p>
    </div>
</div>



 <!-- الخبر (إثراء) -->
<div class="event-card" data-city="khobar">
  <img src="{{ asset('images/ithra.jpg') }}" alt="فعاليات إثراء" class="h-48 w-full object-cover rounded-t-xl">
  <div class="bg-white p-4 rounded-b-xl shadow">
    <h3 class="text-xl font-bold text-pink-600">إثراء - الموسم الثقافي 2025</h3>
    <p class="text-gray-600">عروض تفاعلية، معارض فنية، ورش عمل ثقافية | مركز إثراء، الظهران</p>
  </div>
</div>


</div>
<script>
    document.querySelectorAll('.event-card').forEach(card => {
        card.addEventListener('click', () => {
            alert("📢 قريباً سيتم عرض تفاصيل الفعالية 🎉");
        });
    });
</script>

@endsection