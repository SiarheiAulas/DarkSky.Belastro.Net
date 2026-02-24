<x-app-layout>
    <x-slot name="header">
    </x-slot>
    
    <style>
        html, body {
            overflow-y: hidden !important;
            height: 100% !important;
        }
        
        .custom-logo {
            height: 224px !important;
            width: auto !important;
        }
        
        .custom-margin-top {
            margin-top: 40px !important;
        }
        
        .custom-margin-bottom {
            margin-bottom: 20px !important;
        }
        
        .custom-button {
            display: inline-flex !important;
            align-items: center !important;
            padding: 16px 32px !important;
            background-color: #d1d5db !important;
            color: #000 !important;
            font-size: 1.125rem !important;
            font-weight: 600 !important;
            border-radius: 9999px !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
            transition: all 0.2s !important;
            border: 1px solid #9ca3af !important;
            min-width: 220px !important;
            justify-content: center !important;
            white-space: nowrap !important;
            text-decoration: none !important;
        }
        
        .custom-button:hover {
            background-color: #9ca3af !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1) !important;
        }
        
        .no-scroll-container {
            max-height: 100vh !important;
            overflow: hidden !important;
        }
    </style>
    
    <div class="min-h-screen bg-gray-100 flex flex-col no-scroll-container" style="overflow: hidden !important;">
        <div class="flex-grow flex flex-col items-center justify-center p-4" style="overflow: hidden !important;">
            <!-- Логотип -->
            <div class="custom-margin-top custom-margin-bottom">
                <img src="{{ asset('img/belastro_source.png') }}" alt="Логотип" class="custom-logo">
            </div>        
            <div class="custom-margin-bottom text-center">
                <p class="text-xl text-gray-600 mb-2">
                    Привет, {{ Auth::user()->name ?? 'Админ' }}!  
                </p>
                <p class="text-xl text-gray-600">
                    Вы успешно вошли на сайт. Доступны функции администрирования.
                </p>
            </div>        
            <div>
                <a href="{{ url('/') }}" class="custom-button">
                    <svg style="width: 24px; height: 24px; margin-right: 12px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    На главную
                </a>
            </div>
        </div>
    </div>
</x-app-layout>