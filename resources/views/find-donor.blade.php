<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>রক্তদাতা খুঁজুন — রক্তদান বাংলাদেশ</title>
    <meta name="description" content="রক্তের গ্রুপ ও অবস্থান নির্বাচন করে উপলব্ধ রক্তদাতা খুঁজুন।">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite & Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-[#1A0D0D] bg-[#FDFBFB]">
    <div class="min-h-screen bg-[#FDFBFB] flex flex-col">
        <x-header active="find-donor" />

        <!-- Main Content -->
        <main class="flex-1 pb-16 lg:pb-0">
            <div class="mx-auto max-w-7xl px-4 py-6">
                <!-- Page Title -->
                <div class="mb-6">
                    <h1 class="font-display text-2xl font-bold text-[#1A0D0D] mb-1">রক্তদাতা খুঁজুন</h1>
                    <p class="text-sm text-[#665252]">রক্তের গ্রুপ ও অবস্থান নির্বাচন করে উপলব্ধ রক্তদাতা খুঁজুন।</p>
                </div>

                <!-- Filter Box -->
                <div class="bg-white rounded-lg border border-[#EADEDE] p-4 md:p-5 mb-6">
                    <!-- Blood Group Selection -->
                    <div class="mb-4">
                        <label class="text-sm font-medium text-[#1A0D0D] mb-2 block">রক্তের গ্রুপ</label>
                        <div class="grid grid-cols-4 md:grid-cols-8 gap-2">
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-12 px-4 text-base bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">A+</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-12 px-4 text-base bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">A-</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-12 px-4 text-base bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">B+</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-12 px-4 text-base bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">B-</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-12 px-4 text-base bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">AB+</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-12 px-4 text-base bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">AB-</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-12 px-4 text-base bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">O+</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-12 px-4 text-base bg-white text-[#D32F2F] border-[#D32F2F]">O-</button>
                        </div>
                    </div>

                    <!-- Location Dropdowns -->
                    <div class="mb-4">
                        <label class="text-sm font-medium text-[#1A0D0D] mb-2 block">অবস্থান</label>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                            <select id="findDiv" class="flex w-full items-center justify-between rounded-md border border-[#EADEDE] px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-1 focus:ring-[#D32F2F] h-11 bg-white text-[#1A0D0D]">
                                <option value="">বিভাগ</option>
                                <option value="dhaka">ঢাকা</option>
                                <option value="chattogram">চট্টগ্রাম</option>
                                <option value="rajshahi">রাজশাহী</option>
                                <option value="khulna">খুলনা</option>
                                <option value="barishal">বরিশাল</option>
                                <option value="sylhet">সিলেট</option>
                                <option value="rangpur">রংপুর</option>
                                <option value="mymensingh">ময়মনসিংহ</option>
                            </select>
                            <select id="findDist" class="flex w-full items-center justify-between rounded-md border border-[#EADEDE] px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-1 focus:ring-[#D32F2F] h-11 bg-white text-[#1A0D0D]">
                                <option value="">জেলা</option>
                            </select>
                            <select id="findUpa" class="flex w-full items-center justify-between rounded-md border border-[#EADEDE] px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-1 focus:ring-[#D32F2F] h-11 bg-white text-[#1A0D0D]">
                                <option value="">উপজেলা / এলাকা</option>
                            </select>
                        </div>
                    </div>

                    <!-- Checkbox & Search Button -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pt-2 border-t border-[#EADEDE]">
                        <label class="flex items-center gap-2 text-sm text-[#1A0D0D] cursor-pointer">
                            <input type="checkbox" class="h-4 w-4 rounded border-[#D4B6B6] text-[#D32F2F] focus:ring-[#D32F2F]" checked>
                            শুধুমাত্র রক্তদানে প্রস্তুত দাতা দেখান
                        </label>
                        <div class="flex gap-2">
                            <button class="h-10 px-6 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-sm flex items-center gap-2 disabled:opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search h-4 w-4">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                                খুঁজুন
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Results Header -->
                <div class="flex items-center justify-between mb-4">
                    <p class="text-sm text-[#665252]">6 জন রক্তদাতা পাওয়া গেছে</p>
                </div>

                <!-- Donors Grid -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Donor 1 -->
                    <div class="rounded-lg bg-white border border-[#EADEDE] p-4 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-start gap-3 mb-3">
                            <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-11 w-11 text-base">O+</span>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5">
                                    <h3 class="font-display text-base font-semibold text-[#1A0D0D] truncate">তানভীর আহমেদ</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check h-4 w-4 text-[#16A34A] flex-shrink-0">
                                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                </div>
                                <p class="text-sm text-[#665252] flex items-center gap-1 truncate">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3.5 w-3.5 flex-shrink-0">
                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    ঢাকা, মিরপুর, পল্লবী
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 mb-3">
                            <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-semibold bg-[#16A34A] text-white">
                                <span class="h-1.5 w-1.5 rounded-full bg-white"></span>রক্তদানে প্রস্তুত
                            </span>
                            <span class="text-xs text-[#998585]">শেষ রক্তদান: 2026-06-15</span>
                        </div>
                        <div class="flex gap-2">
                            <a href="tel:01711223344" class="flex-1 h-10 rounded-md bg-[#16A34A] hover:bg-[#15803D] text-white font-semibold text-sm flex items-center justify-center gap-2 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                ফোন করুন
                            </a>
                        </div>
                    </div>

                    <!-- Donor 2 -->
                    <div class="rounded-lg bg-white border border-[#EADEDE] p-4 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-start gap-3 mb-3">
                            <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-11 w-11 text-base">B+</span>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5">
                                    <h3 class="font-display text-base font-semibold text-[#1A0D0D] truncate">সাবরিনা সুলতানা</h3>
                                </div>
                                <p class="text-sm text-[#665252] flex items-center gap-1 truncate">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3.5 w-3.5 flex-shrink-0">
                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    ঢাকা, ধানমন্ডি, রোড ৮
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 mb-3">
                            <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-semibold bg-[#16A34A] text-white">
                                <span class="h-1.5 w-1.5 rounded-full bg-white"></span>রক্তদানে প্রস্তুত
                            </span>
                            <span class="text-xs text-[#998585]">শেষ রক্তদান: 2026-07-20</span>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 h-10 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-sm flex items-center justify-center gap-2 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-square h-4 w-4">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                যোগাযোগের অনুরোধ
                            </button>
                        </div>
                    </div>

                    <!-- Donor 3 -->
                    <div class="rounded-lg bg-white border border-[#EADEDE] p-4 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-start gap-3 mb-3">
                            <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-11 w-11 text-base">O+</span>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5">
                                    <h3 class="font-display text-base font-semibold text-[#1A0D0D] truncate">মাহমুদুল হক</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check h-4 w-4 text-[#16A34A] flex-shrink-0">
                                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                </div>
                                <p class="text-sm text-[#665252] flex items-center gap-1 truncate">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3.5 w-3.5 flex-shrink-0">
                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    গাজীপুর, গাজীপুর সদর
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 mb-3">
                            <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-semibold bg-[#16A34A] text-white">
                                <span class="h-1.5 w-1.5 rounded-full bg-white"></span>রক্তদানে প্রস্তুত
                            </span>
                        </div>
                        <div class="flex gap-2">
                            <a href="tel:01633445566" class="flex-1 h-10 rounded-md bg-[#16A34A] hover:bg-[#15803D] text-white font-semibold text-sm flex items-center justify-center gap-2 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                ফোন করুন
                            </a>
                        </div>
                    </div>

                    <!-- Donor 4 -->
                    <div class="rounded-lg bg-white border border-[#EADEDE] p-4 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-start gap-3 mb-3">
                            <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-11 w-11 text-base">A+</span>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5">
                                    <h3 class="font-display text-base font-semibold text-[#1A0D0D] truncate">রাফসান জামান</h3>
                                </div>
                                <p class="text-sm text-[#665252] flex items-center gap-1 truncate">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3.5 w-3.5 flex-shrink-0">
                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    চট্টগ্রাম, পটিয়া
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 mb-3">
                            <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-semibold bg-[#DC2626] text-white">
                                <span class="h-1.5 w-1.5 rounded-full bg-white"></span>বর্তমানে অক্ষম
                            </span>
                            <span class="text-xs text-[#998585]">শেষ রক্তদান: 2026-09-01</span>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 h-10 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-sm flex items-center justify-center gap-2 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-square h-4 w-4">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                যোগাযোগের অনুরোধ
                            </button>
                        </div>
                    </div>

                    <!-- Donor 5 -->
                    <div class="rounded-lg bg-white border border-[#EADEDE] p-4 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-start gap-3 mb-3">
                            <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-11 w-11 text-base">AB-</span>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5">
                                    <h3 class="font-display text-base font-semibold text-[#1A0D0D] truncate">নুসরাত জাহান</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check h-4 w-4 text-[#16A34A] flex-shrink-0">
                                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                </div>
                                <p class="text-sm text-[#665252] flex items-center gap-1 truncate">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3.5 w-3.5 flex-shrink-0">
                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    চট্টগ্রাম, চকোরিয়া
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 mb-3">
                            <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-semibold bg-[#16A34A] text-white">
                                <span class="h-1.5 w-1.5 rounded-full bg-white"></span>রক্তদানে প্রস্তুত
                            </span>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 h-10 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-sm flex items-center justify-center gap-2 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-square h-4 w-4">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                যোগাযোগের অনুরোধ
                            </button>
                        </div>
                    </div>

                    <!-- Donor 6 -->
                    <div class="rounded-lg bg-white border border-[#EADEDE] p-4 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-start gap-3 mb-3">
                            <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-11 w-11 text-base">B-</span>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5">
                                    <h3 class="font-display text-base font-semibold text-[#1A0D0D] truncate">ইমরান খান</h3>
                                </div>
                                <p class="text-sm text-[#665252] flex items-center gap-1 truncate">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3.5 w-3.5 flex-shrink-0">
                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    নারায়ণগঞ্জ, সোনারগাঁও
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 mb-3">
                            <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-semibold bg-[#16A34A] text-white">
                                <span class="h-1.5 w-1.5 rounded-full bg-white"></span>রক্তদানে প্রস্তুত
                            </span>
                        </div>
                        <div class="flex gap-2">
                            <a href="tel:01577889900" class="flex-1 h-10 rounded-md bg-[#16A34A] hover:bg-[#15803D] text-white font-semibold text-sm flex items-center justify-center gap-2 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                ফোন করুন
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer / Mobile Bottom Nav Component -->
        <x-footer />
    </div>
    <x-verify-modal />
    <x-bd-cascading-js />
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            initCascadingDropdowns('findDiv', 'findDist', 'findUpa');
        });
    </script>
</body>
</html>
