@extends('layout.app')

@section('title', 'إدارة الدول')

@section('content')
    <div class="p-6 md:p-10 lg:p-16 bg-gray-100 min-h-screen">
        <!-- قسم رأس الصفحة مع زر الإضافة -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 text-center md:text-right">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4 md:mb-0">إدارة الدول</h1>
            <a href="#" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-6 rounded-full shadow-lg transition-colors duration-300 transform hover:scale-105">
                + إضافة دولة جديدة
            </a>
        </div>

        <!-- جدول عرض الدول -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-pink-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-right text-sm font-semibold text-pink-600 uppercase tracking-wider">
                                الاسم
                            </th>
                            <th scope="col" class="px-6 py-4 text-right text-sm font-semibold text-pink-600 uppercase tracking-wider">
                                الرمز
                            </th>
                            <th scope="col" class="px-6 py-4 text-right text-sm font-semibold text-pink-600 uppercase tracking-wider">
                                العمليات
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- صف البيانات 1 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                المملكة العربية السعودية
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                KSA
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                <a href="#" class="text-pink-600 hover:text-pink-800 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L15.379 9.793 17.071 8.05a1 1 0 000-1.414l-2.828-2.828a1 1 0 00-1.414 0l-1.72 1.72zM4 11l-2.828 2.828L7.172 18H11v-3.828l-3.828-3.828H4z"/>
                                    </svg>
                                </a>
                                <a href="#" class="text-red-600 hover:text-red-800 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <!-- صف البيانات 2 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                الإمارات العربية المتحدة
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                UAE
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                <a href="#" class="text-pink-600 hover:text-pink-800 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L15.379 9.793 17.071 8.05a1 1 0 000-1.414l-2.828-2.828a1 1 0 00-1.414 0l-1.72 1.72zM4 11l-2.828 2.828L7.172 18H11v-3.828l-3.828-3.828H4z"/>
                                    </svg>
                                </a>
                                <a href="#" class="text-red-600 hover:text-red-800 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <!-- صف البيانات 3 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                مصر
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                EGY
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                <a href="#" class="text-pink-600 hover:text-pink-800 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block ml-2 rtl:mr-2 rtl:ml-0" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L15.379 9.793 17.071 8.05a1 1 0 000-1.414l-2.828-2.828a1 1 0 00-1.414 0l-1.72 1.72zM4 11l-2.828 2.828L7.172 18H11v-3.828l-3.828-3.828H4z"/>
                                    </svg>
                                </a>
                                <a href="#" class="text-red-600 hover:text-red-800 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection