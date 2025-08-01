@extends('layout.app')

@section('title', 'أهم الفعاليات - سواح')

@section('content')
    <div class="flex-1 p-6 md:p-10 lg:p-16">
        <!-- قسم رأس الصفحة -->
        <div class="mb-8 text-center md:text-right">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">أهم الفعاليات</h1>
            <p class="text-gray-600 text-lg">دليلك الشامل لأهم الفعاليات حول العالم</p>
        </div>

        <!-- شبكة الفعاليات -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">

            <!-- بطاقة الفعالية - 1 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="flex flex-col md:flex-row-reverse">
                    <div class="md:w-1/2 p-6 flex items-center justify-center">
                        <img src="https://placehold.co/200x200/fafafa/e5e7eb?text=صورة+فعالية" alt="صورة الفعالية" class="rounded-xl shadow-md">
                    </div>
                    <div class="md:w-1/2 p-6 text-right">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">اسم الفعالية</h2>
                        <p class="text-gray-600 text-sm mb-4">ضع هنا نص يصف الفعالية بشكل مبسط جداً. ضع هنا نص يصف الفعالية بشكل مبسط جداً.</p>
                        <div class="flex flex-col space-y-2">
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-pink-100 text-pink-600 p-4 text-center font-semibold rounded-b-2xl transition-colors duration-300 hover:bg-pink-200">
                    <a href="#">عرض التفاصيل</a>
                </div>
            </div>

            <!-- بطاقة الفعالية - 2 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="flex flex-col md:flex-row-reverse">
                    <div class="md:w-1/2 p-6 flex items-center justify-center">
                        <img src="https://placehold.co/200x200/fafafa/e5e7eb?text=صورة+فعالية" alt="صورة الفعالية" class="rounded-xl shadow-md">
                    </div>
                    <div class="md:w-1/2 p-6 text-right">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">اسم الفعالية</h2>
                        <p class="text-gray-600 text-sm mb-4">ضع هنا نص يصف الفعالية بشكل مبسط جداً. ضع هنا نص يصف الفعالية بشكل مبسط جداً.</p>
                        <div class="flex flex-col space-y-2">
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-pink-100 text-pink-600 p-4 text-center font-semibold rounded-b-2xl transition-colors duration-300 hover:bg-pink-200">
                    <a href="#">عرض التفاصيل</a>
                </div>
            </div>

            <!-- بطاقة الفعالية - 3 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="flex flex-col md:flex-row-reverse">
                    <div class="md:w-1/2 p-6 flex items-center justify-center">
                        <img src="https://placehold.co/200x200/fafafa/e5e7eb?text=صورة+فعالية" alt="صورة الفعالية" class="rounded-xl shadow-md">
                    </div>
                    <div class="md:w-1/2 p-6 text-right">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">اسم الفعالية</h2>
                        <p class="text-gray-600 text-sm mb-4">ضع هنا نص يصف الفعالية بشكل مبسط جداً. ضع هنا نص يصف الفعالية بشكل مبسط جداً.</p>
                        <div class="flex flex-col space-y-2">
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-pink-100 text-pink-600 p-4 text-center font-semibold rounded-b-2xl transition-colors duration-300 hover:bg-pink-200">
                    <a href="#">عرض التفاصيل</a>
                </div>
            </div>

            <!-- بطاقة الفعالية - 4 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="flex flex-col md:flex-row-reverse">
                    <div class="md:w-1/2 p-6 flex items-center justify-center">
                        <img src="https://placehold.co/200x200/fafafa/e5e7eb?text=صورة+فعالية" alt="صورة الفعالية" class="rounded-xl shadow-md">
                    </div>
                    <div class="md:w-1/2 p-6 text-right">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">اسم الفعالية</h2>
                        <p class="text-gray-600 text-sm mb-4">ضع هنا نص يصف الفعالية بشكل مبسط جداً. ضع هنا نص يصف الفعالية بشكل مبسط جداً.</p>
                        <div class="flex flex-col space-y-2">
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-pink-100 text-pink-600 p-4 text-center font-semibold rounded-b-2xl transition-colors duration-300 hover:bg-pink-200">
                    <a href="#">عرض التفاصيل</a>
                </div>
            </div>

            <!-- بطاقة الفعالية - 5 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="flex flex-col md:flex-row-reverse">
                    <div class="md:w-1/2 p-6 flex items-center justify-center">
                        <img src="https://placehold.co/200x200/fafafa/e5e7eb?text=صورة+فعالية" alt="صورة الفعالية" class="rounded-xl shadow-md">
                    </div>
                    <div class="md:w-1/2 p-6 text-right">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">اسم الفعالية</h2>
                        <p class="text-gray-600 text-sm mb-4">ضع هنا نص يصف الفعالية بشكل مبسط جداً. ضع هنا نص يصف الفعالية بشكل مبسط جداً.</p>
                        <div class="flex flex-col space-y-2">
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-pink-100 text-pink-600 p-4 text-center font-semibold rounded-b-2xl transition-colors duration-300 hover:bg-pink-200">
                    <a href="#">عرض التفاصيل</a>
                </div>
            </div>

            <!-- بطاقة الفعالية - 6 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="flex flex-col md:flex-row-reverse">
                    <div class="md:w-1/2 p-6 flex items-center justify-center">
                        <img src="https://placehold.co/200x200/fafafa/e5e7eb?text=صورة+فعالية" alt="صورة الفعالية" class="rounded-xl shadow-md">
                    </div>
                    <div class="md:w-1/2 p-6 text-right">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">اسم الفعالية</h2>
                        <p class="text-gray-600 text-sm mb-4">ضع هنا نص يصف الفعالية بشكل مبسط جداً. ضع هنا نص يصف الفعالية بشكل مبسط جداً.</p>
                        <div class="flex flex-col space-y-2">
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500 ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>معلومات</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-pink-100 text-pink-600 p-4 text-center font-semibold rounded-b-2xl transition-colors duration-300 hover:bg-pink-200">
                    <a href="#">عرض التفاصيل</a>
                </div>
            </div>
            
            <!-- يمكنك إضافة المزيد من البطاقات هنا -->

        </div>
    </div>
@endsection