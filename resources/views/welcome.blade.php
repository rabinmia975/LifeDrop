<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>রক্তদান বাংলাদেশ — জরুরি রক্তের প্রয়োজনে পাশে থাকুন</title>
    <meta name="description" content="বাংলাদেশে রক্তের জন্য বিনামূল্যে রক্তদাতা খুঁজুন এবং রক্তের প্রয়োজন হলে সরাসরি পোস্ট করুন।">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite & Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-[#1A0D0D] bg-[#FDFBFB]">
    <div class="min-h-screen bg-[#FDFBFB] flex flex-col">
        <x-header active="home" />

        <!-- Main Content -->
        <main class="flex-1 pb-16 lg:pb-0">
            <div>
                <!-- Hero Section -->
                <section class="bg-[#FDFBFB] border-b border-[#EADEDE] overflow-hidden">
                    <div class="mx-auto max-w-7xl px-4 py-10 md:py-16 grid md:grid-cols-2 gap-10 items-center">
                        <div class="text-center md:text-left">
                            <div class="inline-flex items-center gap-2 rounded-full bg-[#F4F0F0] border border-[#EADEDE] px-3 py-1 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet h-4 w-4 text-[#D32F2F]">
                                    <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                                </svg>
                                <span class="text-sm font-medium text-[#665252]">বাংলাদেশে রক্তদান নেটওয়ার্ক</span>
                            </div>
                            <h1 class="font-display text-3xl md:text-[40px] leading-tight font-bold text-[#1A0D0D] mb-4">জরুরি রক্তের প্রয়োজনে <span class="text-[#D32F2F]">পাশে থাকুন</span></h1>
                            <p class="text-base md:text-lg text-[#665252] max-w-2xl mx-auto md:mx-0 mb-8 leading-relaxed">আপনার এক ব্যাগ রক্ত একটি জীবন বাঁচাতে পারে। কাছাকাছি রক্তদাতা খুঁজুন অথবা রক্তের প্রয়োজন জানিয়ে পোস্ট করুন।</p>
                            <div class="flex flex-col sm:flex-row gap-3 justify-center md:justify-start">
                                <button class="h-12 px-8 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-base flex items-center justify-center gap-2 transition-colors shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search h-5 w-5">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.3-4.3"></path>
                                    </svg>
                                    রক্তদাতা খুঁজুন
                                </button>
                                <button class="h-12 px-8 rounded-md bg-white border-2 border-[#D32F2F] text-[#D32F2F] hover:bg-[#F4F0F0] font-semibold text-base flex items-center justify-center gap-2 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text h-5 w-5">
                                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                        <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                        <path d="M10 9H8"></path>
                                        <path d="M16 13H8"></path>
                                        <path d="M16 17H8"></path>
                                    </svg>
                                    রক্তের জন্য পোস্ট করুন
                                </button>
                            </div>
                        </div>
                        <div class="order-first md:order-last">
                            <span class="inline-block relative w-full h-56 sm:h-72 md:h-[22rem] rounded-xl border border-[#EADEDE] shadow-sm overflow-hidden bg-white">
                                <img src="/images/hero.jpg" alt="রক্তদান বাংলাদেশ — জরুরি রক্তের প্রয়োজনে পাশে থাকুন" class="w-full h-full object-cover">
                            </span>
                        </div>
                    </div>
                </section>

                <!-- Blood Group Filter -->
                <section class="bg-white border-b border-[#EADEDE]">
                    <div class="mx-auto max-w-7xl px-4 py-8">
                        <h2 class="font-display text-lg font-semibold text-[#1A0D0D] mb-4 text-center md:text-left">রক্তের গ্রুপ নির্বাচন করে দাতা খুঁজুন</h2>
                        <div class="grid grid-cols-4 md:grid-cols-8 gap-2 md:gap-3">
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-14 px-5 text-lg bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">A+</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-14 px-5 text-lg bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">A-</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-14 px-5 text-lg bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">B+</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-14 px-5 text-lg bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">B-</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-14 px-5 text-lg bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">AB+</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-14 px-5 text-lg bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">AB-</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-14 px-5 text-lg bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">O+</button>
                            <button type="button" class="rounded-full font-bold transition-all border-2 flex items-center justify-center h-14 px-5 text-lg bg-white text-[#1A0D0D] border-[#EADEDE] hover:border-[#D32F2F] hover:text-[#D32F2F]">O-</button>
                        </div>
                    </div>
                </section>

                <!-- Location Search -->
                <section class="bg-[#F4F0F0] border-b border-[#EADEDE]">
                    <div class="mx-auto max-w-7xl px-4 py-8">
                        <div class="bg-white rounded-lg border border-[#EADEDE] p-4 md:p-6 shadow-sm">
                            <h2 class="font-display text-lg font-semibold text-[#1A0D0D] mb-4">অবস্থান অনুযায়ী রক্তদাতা খুঁজুন</h2>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                                <select id="homeDiv" class="flex w-full items-center justify-between rounded-md border border-[#EADEDE] px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-1 focus:ring-[#D32F2F] h-11 bg-white text-[#1A0D0D]">
                                    <option value="">বিভাগ নির্বাচন করুন</option>
                                    <option value="dhaka">ঢাকা</option>
                                    <option value="chattogram">চট্টগ্রাম</option>
                                    <option value="rajshahi">রাজশাহী</option>
                                    <option value="khulna">খুলনা</option>
                                    <option value="barishal">বরিশাল</option>
                                    <option value="sylhet">সিলেট</option>
                                    <option value="rangpur">রংপুর</option>
                                    <option value="mymensingh">ময়মনসিংহ</option>
                                </select>
                                <select id="homeDist" class="flex w-full items-center justify-between rounded-md border border-[#EADEDE] px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-1 focus:ring-[#D32F2F] h-11 bg-white text-[#1A0D0D]">
                                    <option value="">জেলা নির্বাচন করুন</option>
                                </select>
                                <select id="homeUpa" class="flex w-full items-center justify-between rounded-md border border-[#EADEDE] px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-1 focus:ring-[#D32F2F] h-11 bg-white text-[#1A0D0D]">
                                    <option value="">উপজেলা / এলাকা নির্বাচন করুন</option>
                                </select>
                                <a href="/find-donor" class="h-11 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold flex items-center justify-center gap-2 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search h-4 w-4">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.3-4.3"></path>
                                    </svg>
                                    খুঁজুন
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Urgent Blood Requests -->
                <section class="bg-[#FDFBFB]">
                    <div class="mx-auto max-w-7xl px-4 py-8">
                        <div class="flex items-center justify-between mb-5">
                            <h2 class="font-display text-xl font-bold text-[#1A0D0D] flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet h-5 w-5 text-[#D32F2F]">
                                    <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                                </svg>
                                জরুরি রক্তের অনুরোধসমূহ
                                <span class="ml-1 rounded-full bg-[#D32F2F] text-white text-xs px-2 py-0.5">4</span>
                            </h2>
                            <a class="text-sm text-[#D32F2F] hover:underline font-medium hidden md:block" href="/find-donor">সব দেখুন →</a>
                        </div>
                        <div class="grid md:grid-cols-2 gap-4">
                            <!-- Request Card 1 -->
                            <div class="relative rounded-lg bg-white border p-4 hover:shadow-md transition-shadow border-[#DC2626] shadow-[0_0_0_2px_rgba(220,38,38,0.15)]">
                                <div class="flex items-start justify-between gap-3 mb-3">
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 mb-1.5">
                                            <span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-xs font-semibold bg-[#DC2626] text-white animate-pulse">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet h-3 w-3">
                                                    <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                                                </svg>
                                                জরুরি
                                            </span>
                                            <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-8 w-8 text-sm">O+</span>
                                        </div>
                                        <h3 class="font-display text-base font-semibold text-[#1A0D0D] truncate">আব্দুল করিম</h3>
                                        <p class="text-sm text-[#665252] truncate font-medium">ঢাকা মেডিকেল কলেজ হাসপাতাল</p>
                                    </div>
                                    <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-11 w-11 text-base">O+</span>
                                </div>
                                <div class="space-y-1.5 text-sm text-[#665252] mb-3">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet h-4 w-4 text-[#D32F2F] flex-shrink-0">
                                            <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                                        </svg>
                                        <span>2 ব্যাগ রক্ত প্রয়োজন</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4 text-[#998585] flex-shrink-0">
                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        <span class="truncate">ঢাকা, মিরপুর, বকশীবাজার</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4 text-[#998585] flex-shrink-0">
                                            <path d="M8 2v4"></path>
                                            <path d="M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        <span>তারিখ: 2026-09-26</span>
                                    </div>
                                </div>
                                <button class="w-full h-10 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-sm flex items-center justify-center gap-2 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                    যোগাযোগের বিবরণ
                                </button>
                            </div>

                            <!-- Request Card 2 -->
                            <div class="relative rounded-lg bg-white border p-4 shadow-sm hover:shadow-md transition-shadow border-[#EADEDE]">
                                <div class="flex items-start justify-between gap-3 mb-3">
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 mb-1.5">
                                            <span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-xs font-semibold bg-[#0284C7] text-white">সাধারণ</span>
                                            <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-8 w-8 text-sm">B+</span>
                                        </div>
                                        <h3 class="font-display text-base font-semibold text-[#1A0D0D] truncate">ফাতেমা বেগম</h3>
                                        <p class="text-sm text-[#665252] truncate font-medium">স্কয়ার হাসপাতাল</p>
                                    </div>
                                    <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-11 w-11 text-base">B+</span>
                                </div>
                                <div class="space-y-1.5 text-sm text-[#665252] mb-3">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet h-4 w-4 text-[#D32F2F] flex-shrink-0">
                                            <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                                        </svg>
                                        <span>3 ব্যাগ রক্ত প্রয়োজন</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4 text-[#998585] flex-shrink-0">
                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        <span class="truncate">ঢাকা, ধানমন্ডি, পান্থপথ</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4 text-[#998585] flex-shrink-0">
                                            <path d="M8 2v4"></path>
                                            <path d="M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        <span>তারিখ: 2026-09-28</span>
                                    </div>
                                </div>
                                <button class="w-full h-10 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-sm flex items-center justify-center gap-2 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                    যোগাযোগের বিবরণ
                                </button>
                            </div>

                            <!-- Request Card 3 -->
                            <div class="relative rounded-lg bg-white border p-4 hover:shadow-md transition-shadow border-[#DC2626] shadow-[0_0_0_2px_rgba(220,38,38,0.15)]">
                                <div class="flex items-start justify-between gap-3 mb-3">
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 mb-1.5">
                                            <span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-xs font-semibold bg-[#DC2626] text-white animate-pulse">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet h-3 w-3">
                                                    <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                                                </svg>
                                                জরুরি
                                            </span>
                                            <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-8 w-8 text-sm">AB-</span>
                                        </div>
                                        <h3 class="font-display text-base font-semibold text-[#1A0D0D] truncate">রোগীর পরিচিতি গোপন</h3>
                                        <p class="text-sm text-[#665252] truncate font-medium">আপোলো হাসপাতাল চট্টগ্রাম</p>
                                    </div>
                                    <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-11 w-11 text-base">AB-</span>
                                </div>
                                <div class="space-y-1.5 text-sm text-[#665252] mb-3">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet h-4 w-4 text-[#D32F2F] flex-shrink-0">
                                            <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                                        </svg>
                                        <span>1 ব্যাগ রক্ত প্রয়োজন</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4 text-[#998585] flex-shrink-0">
                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        <span class="truncate">চট্টগ্রাম, পটিয়া</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4 text-[#998585] flex-shrink-0">
                                            <path d="M8 2v4"></path>
                                            <path d="M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        <span>তারিখ: 2026-09-25</span>
                                    </div>
                                </div>
                                <button class="w-full h-10 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-sm flex items-center justify-center gap-2 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                    যোগাযোগের বিবরণ
                                </button>
                            </div>

                            <!-- Request Card 4 -->
                            <div class="relative rounded-lg bg-white border p-4 shadow-sm hover:shadow-md transition-shadow border-[#EADEDE]">
                                <div class="flex items-start justify-between gap-3 mb-3">
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 mb-1.5">
                                            <span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-xs font-semibold bg-[#665252] text-white">পূর্বনির্ধারিত</span>
                                            <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-8 w-8 text-sm">A+</span>
                                        </div>
                                        <h3 class="font-display text-base font-semibold text-[#1A0D0D] truncate">সালমা আক্তার</h3>
                                        <p class="text-sm text-[#665252] truncate font-medium">ইবনে সিনা হাসপাতাল</p>
                                    </div>
                                    <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-11 w-11 text-base">A+</span>
                                </div>
                                <div class="space-y-1.5 text-sm text-[#665252] mb-3">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet h-4 w-4 text-[#D32F2F] flex-shrink-0">
                                            <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                                        </svg>
                                        <span>2 ব্যাগ রক্ত প্রয়োজন</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4 text-[#998585] flex-shrink-0">
                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        <span class="truncate">ঢাকা, গুলশান</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-4 w-4 text-[#998585] flex-shrink-0">
                                            <path d="M8 2v4"></path>
                                            <path d="M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        <span>তারিখ: 2026-10-01</span>
                                    </div>
                                </div>
                                <button class="w-full h-10 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-sm flex items-center justify-center gap-2 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                    যোগাযোগের বিবরণ
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Top Donors -->
                <section class="bg-[#FDFBFB] border-b border-[#EADEDE]">
                    <div class="mx-auto max-w-7xl px-4 py-10">
                        <h2 class="font-display text-xl font-bold text-[#1A0D0D] text-center mb-2 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trophy h-5 w-5 text-[#D32F2F]">
                                <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path>
                                <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path>
                                <path d="M4 22h16"></path>
                                <path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"></path>
                                <path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"></path>
                                <path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"></path>
                            </svg>
                            সর্বোচ্চ রক্তদাতা
                        </h2>
                        <p class="text-center text-sm text-[#665252] mb-8 max-w-2xl mx-auto">যাঁরা বারবার রক্ত দিয়ে অসংখ্য জীবন বাঁচিয়েছেন — কে কতবার রক্ত দিয়েছেন দেখে নিন।</p>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Donor 1 -->
                            <div class="rounded-lg bg-white border border-[#EADEDE] p-4 flex items-center gap-3">
                                <span class="h-9 w-9 rounded-full flex items-center justify-center font-bold text-sm shrink-0 bg-[#D4AF37] text-white">১</span>
                                <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-8 w-8 text-sm">O+</span>
                                <div class="min-w-0 flex-1">
                                    <p class="font-semibold text-[#1A0D0D] truncate">তানভীর আহমেদ</p>
                                    <p class="text-xs text-[#665252] flex items-center gap-1 truncate">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3 w-3 shrink-0">
                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        মিরপুর, ঢাকা
                                    </p>
                                </div>
                                <div class="text-right shrink-0">
                                    <p class="font-display font-bold text-[#D32F2F] text-lg leading-none">১২</p>
                                    <p class="text-[11px] text-[#665252]">বার</p>
                                </div>
                            </div>
                            <!-- Donor 2 -->
                            <div class="rounded-lg bg-white border border-[#EADEDE] p-4 flex items-center gap-3">
                                <span class="h-9 w-9 rounded-full flex items-center justify-center font-bold text-sm shrink-0 bg-[#9E9E9E] text-white">২</span>
                                <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-8 w-8 text-sm">B-</span>
                                <div class="min-w-0 flex-1">
                                    <p class="font-semibold text-[#1A0D0D] truncate">ইমরান খান</p>
                                    <p class="text-xs text-[#665252] flex items-center gap-1 truncate">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3 w-3 shrink-0">
                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        সোনারগাঁও, নারায়ণগঞ্জ
                                    </p>
                                </div>
                                <div class="text-right shrink-0">
                                    <p class="font-display font-bold text-[#D32F2F] text-lg leading-none">১২</p>
                                    <p class="text-[11px] text-[#665252]">বার</p>
                                </div>
                            </div>
                            <!-- Donor 3 -->
                            <div class="rounded-lg bg-white border border-[#EADEDE] p-4 flex items-center gap-3">
                                <span class="h-9 w-9 rounded-full flex items-center justify-center font-bold text-sm shrink-0 bg-[#B87333] text-white">৩</span>
                                <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-8 w-8 text-sm">B+</span>
                                <div class="min-w-0 flex-1">
                                    <p class="font-semibold text-[#1A0D0D] truncate">সাবরিনা সুলতানা</p>
                                    <p class="text-xs text-[#665252] flex items-center gap-1 truncate">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3 w-3 shrink-0">
                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        ধানমন্ডি, ঢাকা
                                    </p>
                                </div>
                                <div class="text-right shrink-0">
                                    <p class="font-display font-bold text-[#D32F2F] text-lg leading-none">৯</p>
                                    <p class="text-[11px] text-[#665252]">বার</p>
                                </div>
                            </div>
                            <!-- Donor 4 -->
                            <div class="rounded-lg bg-white border border-[#EADEDE] p-4 flex items-center gap-3">
                                <span class="h-9 w-9 rounded-full flex items-center justify-center font-bold text-sm shrink-0 bg-[#F4F0F0] text-[#665252]">৪</span>
                                <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-8 w-8 text-sm">O+</span>
                                <div class="min-w-0 flex-1">
                                    <p class="font-semibold text-[#1A0D0D] truncate">মাহমুদুল হক</p>
                                    <p class="text-xs text-[#665252] flex items-center gap-1 truncate">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3 w-3 shrink-0">
                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        গাজীপুর সদর, গাজীপুর
                                    </p>
                                </div>
                                <div class="text-right shrink-0">
                                    <p class="font-display font-bold text-[#D32F2F] text-lg leading-none">৭</p>
                                    <p class="text-[11px] text-[#665252]">বার</p>
                                </div>
                            </div>
                            <!-- Donor 5 -->
                            <div class="rounded-lg bg-white border border-[#EADEDE] p-4 flex items-center gap-3">
                                <span class="h-9 w-9 rounded-full flex items-center justify-center font-bold text-sm shrink-0 bg-[#F4F0F0] text-[#665252]">৫</span>
                                <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-8 w-8 text-sm">A+</span>
                                <div class="min-w-0 flex-1">
                                    <p class="font-semibold text-[#1A0D0D] truncate">রাফসান জামান</p>
                                    <p class="text-xs text-[#665252] flex items-center gap-1 truncate">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3 w-3 shrink-0">
                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        পটিয়া, চট্টগ্রাম
                                    </p>
                                </div>
                                <div class="text-right shrink-0">
                                    <p class="font-display font-bold text-[#D32F2F] text-lg leading-none">৫</p>
                                    <p class="text-[11px] text-[#665252]">বার</p>
                                </div>
                            </div>
                            <!-- Donor 6 -->
                            <div class="rounded-lg bg-white border border-[#EADEDE] p-4 flex items-center gap-3">
                                <span class="h-9 w-9 rounded-full flex items-center justify-center font-bold text-sm shrink-0 bg-[#F4F0F0] text-[#665252]">৬</span>
                                <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-8 w-8 text-sm">AB-</span>
                                <div class="min-w-0 flex-1">
                                    <p class="font-semibold text-[#1A0D0D] truncate">নুসরাত জাহান</p>
                                    <p class="text-xs text-[#665252] flex items-center gap-1 truncate">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3 w-3 shrink-0">
                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        চকোরিয়া, চট্টগ্রাম
                                    </p>
                                </div>
                                <div class="text-right shrink-0">
                                    <p class="font-display font-bold text-[#D32F2F] text-lg leading-none">৩</p>
                                    <p class="text-[11px] text-[#665252]">বার</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Blood Group Compatibility Chart -->
                <section class="bg-white border-b border-[#EADEDE]">
                    <div class="mx-auto max-w-7xl px-4 py-10">
                        <h2 class="font-display text-xl font-bold text-[#1A0D0D] text-center mb-2">রক্তের গ্রুপ মিল গাইড</h2>
                        <p class="text-center text-sm text-[#665252] mb-6 max-w-2xl mx-auto">কোন রক্তের গ্রুপ কাকে রক্ত দিতে বা কার থেকে নিতে পারে — এক নজরে দেখে নিন।</p>
                        <div class="overflow-x-auto rounded-lg border border-[#EADEDE]">
                            <table class="w-full min-w-[520px] text-sm">
                                <thead>
                                    <tr class="bg-[#F4F0F0] text-[#665252]">
                                        <th class="text-left font-semibold px-4 py-3">রক্তের গ্রুপ</th>
                                        <th class="text-left font-semibold px-4 py-3">কাকে রক্ত দিতে পারে</th>
                                        <th class="text-left font-semibold px-4 py-3">কার থেকে নিতে পারে</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-t border-[#EADEDE]">
                                        <td class="px-4 py-3"><span class="inline-flex items-center justify-center h-8 w-11 rounded-md bg-[#D32F2F] text-white font-bold">O-</span></td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">সব গ্রুপ</td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">O-</td>
                                    </tr>
                                    <tr class="border-t border-[#EADEDE]">
                                        <td class="px-4 py-3"><span class="inline-flex items-center justify-center h-8 w-11 rounded-md bg-[#D32F2F] text-white font-bold">O+</span></td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">O+, A+, B+, AB+</td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">O+, O-</td>
                                    </tr>
                                    <tr class="border-t border-[#EADEDE]">
                                        <td class="px-4 py-3"><span class="inline-flex items-center justify-center h-8 w-11 rounded-md bg-[#D32F2F] text-white font-bold">A-</span></td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">A+, A-, AB+, AB-</td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">A-, O-</td>
                                    </tr>
                                    <tr class="border-t border-[#EADEDE]">
                                        <td class="px-4 py-3"><span class="inline-flex items-center justify-center h-8 w-11 rounded-md bg-[#D32F2F] text-white font-bold">A+</span></td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">A+, AB+</td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">A+, A-, O+, O-</td>
                                    </tr>
                                    <tr class="border-t border-[#EADEDE]">
                                        <td class="px-4 py-3"><span class="inline-flex items-center justify-center h-8 w-11 rounded-md bg-[#D32F2F] text-white font-bold">B-</span></td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">B+, B-, AB+, AB-</td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">B-, O-</td>
                                    </tr>
                                    <tr class="border-t border-[#EADEDE]">
                                        <td class="px-4 py-3"><span class="inline-flex items-center justify-center h-8 w-11 rounded-md bg-[#D32F2F] text-white font-bold">B+</span></td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">B+, AB+</td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">B+, B-, O+, O-</td>
                                    </tr>
                                    <tr class="border-t border-[#EADEDE]">
                                        <td class="px-4 py-3"><span class="inline-flex items-center justify-center h-8 w-11 rounded-md bg-[#D32F2F] text-white font-bold">AB-</span></td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">AB+, AB-</td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">AB-, A-, B-, O-</td>
                                    </tr>
                                    <tr class="border-t border-[#EADEDE]">
                                        <td class="px-4 py-3"><span class="inline-flex items-center justify-center h-8 w-11 rounded-md bg-[#D32F2F] text-white font-bold">AB+</span></td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">AB+</td>
                                        <td class="px-4 py-3 text-[#1A0D0D]">সব গ্রুপ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-wrap gap-x-6 gap-y-1 justify-center mt-4 text-xs text-[#665252]">
                            <span>O− = সর্বজনীন দাতা</span>
                            <span>AB+ = সর্বজনীন গ্রহীতা</span>
                        </div>
                    </div>
                </section>

                <!-- Preparation & Rules -->
                <section class="bg-[#FDFBFB] border-b border-[#EADEDE]">
                    <div class="mx-auto max-w-7xl px-4 py-10">
                        <h2 class="font-display text-xl font-bold text-[#1A0D0D] text-center mb-2 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet h-5 w-5 text-[#D32F2F]">
                                <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                            </svg>
                            রক্তদানের প্রস্তুতি ও নিয়ম
                        </h2>
                        <p class="text-center text-sm text-[#665252] mb-8 max-w-2xl mx-auto">রক্তদান নিরাপদ ও সহজ — কে দিতে পারবেন এবং কীভাবে প্রস্তুতি নেবেন জেনে নিন।</p>
                        <div class="grid md:grid-cols-3 gap-5">
                            <!-- Card 1 -->
                            <div class="rounded-lg bg-white border border-[#EADEDE] p-5">
                                <div class="flex items-center gap-2 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-5 w-5 text-[#D32F2F]">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                    <h3 class="font-display font-semibold text-[#1A0D0D]">কে রক্ত দিতে পারবেন</h3>
                                </div>
                                <ul class="space-y-2">
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>বয়স ১৮ থেকে ৬০ বছর</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>ওজন কমপক্ষে ৫০ কেজি</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>হিমোগ্লোবিন ১২.৫ g/dL বা তার বেশি</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>সম্পূর্ণ সুস্থ ও জ্বরমুক্ত</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>শেষ রক্তদানের পর কমপক্ষে ৩ মাস পার</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>রক্তচাপ স্বাভাবিক</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Card 2 -->
                            <div class="rounded-lg bg-white border border-[#EADEDE] p-5">
                                <div class="flex items-center gap-2 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-utensils h-5 w-5 text-[#D32F2F]">
                                        <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"></path>
                                        <path d="M7 2v20"></path>
                                        <path d="M21 15V2a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"></path>
                                    </svg>
                                    <h3 class="font-display font-semibold text-[#1A0D0D]">রক্তদানের আগে</h3>
                                </div>
                                <ul class="space-y-2">
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>রক্তদানের আগে পর্যাপ্ত ঘুম নিন</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>খালি পেটে যাবেন না — হালকা খাবার খান</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>প্রচুর পানি পান করুন</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>ভাজাপোড়া ও অতিরিক্ত তেলযুক্ত খাবার এড়িয়ে চলুন</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Card 3 -->
                            <div class="rounded-lg bg-white border border-[#EADEDE] p-5">
                                <div class="flex items-center gap-2 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-activity h-5 w-5 text-[#D32F2F]">
                                        <path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"></path>
                                    </svg>
                                    <h3 class="font-display font-semibold text-[#1A0D0D]">রক্তদানের পরে</h3>
                                </div>
                                <ul class="space-y-2">
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>রক্তদানের পর কিছুক্ষণ বিশ্রাম নিন</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>পানি ও হালকা খাবার গ্রহণ করুন</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>ভারী কাজ ও ব্যায়াম কিছুক্ষণ এড়িয়ে চলুন</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>৩০ মিনিট ধূমপান থেকে বিরত থাকুন</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Donation Tracker -->
                <section class="bg-white border-b border-[#EADEDE]">
                    <div class="mx-auto max-w-7xl px-4 py-10">
                        <h2 class="font-display text-xl font-bold text-[#1A0D0D] text-center mb-2 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-days h-5 w-5 text-[#D32F2F]">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                                <path d="M8 14h.01"></path>
                                <path d="M12 14h.01"></path>
                                <path d="M16 14h.01"></path>
                                <path d="M8 18h.01"></path>
                                <path d="M12 18h.01"></path>
                                <path d="M16 18h.01"></path>
                            </svg>
                            রক্তদান ট্র্যাকার
                        </h2>
                        <p class="text-center text-sm text-[#665252] mb-8 max-w-2xl mx-auto">শেষ কবে রক্ত দিয়েছেন জানান — পরবর্তী কবে রক্ত দিতে পারবেন এবং রক্তদানের পর শরীর ঠিক রাখতে কী করবেন জেনে নিন।</p>
                        <div class="grid lg:grid-cols-2 gap-5">
                            <div class="rounded-lg bg-[#FDFBFB] border border-[#EADEDE] p-5">
                                <label class="block text-sm font-medium text-[#1A0D0D] mb-2">শেষ রক্তদানের তারিখ</label>
                                <input type="date" class="flex w-full rounded-md border border-[#EADEDE] px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 bg-white" max="2026-09-24" value="">
                                <button class="mt-3 h-10 px-4 rounded-md bg-[#F4F0F0] border border-[#EADEDE] text-[#D32F2F] font-medium text-sm hover:bg-[#EADEDE] transition-colors">আজ রক্ত দিয়েছি</button>
                            </div>
                            <div class="rounded-lg bg-[#FDFBFB] border border-[#EADEDE] p-5">
                                <div class="flex items-center gap-2 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart-pulse h-5 w-5 text-[#D32F2F]">
                                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                                        <path d="M3.22 12H9.5l.5-1 2 4.5 2-7 1.5 3.5h5.27"></path>
                                    </svg>
                                    <h3 class="font-display font-semibold text-[#1A0D0D]">রক্তদানের পরে শরীর ঠিক রাখতে</h3>
                                </div>
                                <ul class="space-y-2">
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>রক্তদানের পর অন্তত ১০–১৫ মিনিট বিশ্রাম নিন</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>পরবর্তী ২৪ ঘণ্টা প্রচুর পানি ও তরল পান করুন</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>আয়রন ও প্রোটিনসমৃদ্ধ খাবার খান — ডিম, মাছ, মাংস, ডাল, পালং শাক</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>ভারী কাজ, ব্যায়াম ও ভারী কিছু তোলা ২৪ ঘণ্টা এড়িয়ে চলুন</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>রক্তদানের স্থান পরিষ্কার ও শুকনো রাখুন</span>
                                    </li>
                                    <li class="flex gap-2 text-sm text-[#665252] leading-relaxed">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check h-4 w-4 text-[#2E7D32] shrink-0 mt-0.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="m9 12 2 2 4-4"></path>
                                        </svg>
                                        <span>মাথা ঘোরা বা দুর্বল লাগলে বসে বা শুয়ে বিশ্রাম নিন</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Hospitals & Donation Centers -->
                <section class="bg-white border-b border-[#EADEDE]">
                    <div class="mx-auto max-w-7xl px-4 py-10">
                        <h2 class="font-display text-xl font-bold text-[#1A0D0D] text-center mb-2 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building2 h-5 w-5 text-[#D32F2F]">
                                <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"></path>
                                <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"></path>
                                <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"></path>
                                <path d="M10 6h4"></path>
                                <path d="M10 10h4"></path>
                                <path d="M10 14h4"></path>
                                <path d="M10 18h4"></path>
                            </svg>
                            হাসপাতাল ও রক্তদান কেন্দ্র
                        </h2>
                        <p class="text-center text-sm text-[#665252] mb-8 max-w-2xl mx-auto">দেশের পরিচিত রক্তদান সংগঠন ও কেন্দ্রগুলো — রক্তদান বা রক্তের প্রয়োজনে যোগাযোগ করুন।</p>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Center 1 -->
                            <div class="rounded-lg bg-[#FDFBFB] border border-[#EADEDE] p-5 flex flex-col">
                                <h3 class="font-display font-semibold text-[#1A0D0D] mb-1">বাংলাদেশ রেড ক্রিসেন্ট সোসাইটি</h3>
                                <p class="text-xs text-[#D32F2F] font-medium flex items-center gap-1 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3.5 w-3.5">
                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    ঢাকা ও সারাদেশ
                                </p>
                                <p class="text-sm text-[#665252] leading-relaxed flex-1">সারাদেশে ব্লাড ব্যাংক ও রক্তদান কার্যক্রম পরিচালনা করে।</p>
                            </div>
                            <!-- Center 2 -->
                            <div class="rounded-lg bg-[#FDFBFB] border border-[#EADEDE] p-5 flex flex-col">
                                <h3 class="font-display font-semibold text-[#1A0D0D] mb-1">সন্ধানী</h3>
                                <p class="text-xs text-[#D32F2F] font-medium flex items-center gap-1 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3.5 w-3.5">
                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    মেডিকেল কলেজভিত্তিক
                                </p>
                                <p class="text-sm text-[#665252] leading-relaxed flex-1">দেশের মেডিকেল কলেজগুলোতে রক্তদাতা সংগঠন ও ব্লাড ব্যাংক কার্যক্রম।</p>
                            </div>
                            <!-- Center 3 -->
                            <div class="rounded-lg bg-[#FDFBFB] border border-[#EADEDE] p-5 flex flex-col">
                                <h3 class="font-display font-semibold text-[#1A0D0D] mb-1">বাঁধন</h3>
                                <p class="text-xs text-[#D32F2F] font-medium flex items-center gap-1 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3.5 w-3.5">
                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    ঢাকা ও সারাদেশ
                                </p>
                                <p class="text-sm text-[#665252] leading-relaxed flex-1">স্বেচ্ছায় রক্তদান ও রক্তদাতা খুঁজে দেওয়ার বড় নেটওয়ার্ক।</p>
                            </div>
                            <!-- Center 4 -->
                            <div class="rounded-lg bg-[#FDFBFB] border border-[#EADEDE] p-5 flex flex-col">
                                <h3 class="font-display font-semibold text-[#1A0D0D] mb-1">কোয়ান্টাম ফাউন্ডেশন</h3>
                                <p class="text-xs text-[#D32F2F] font-medium flex items-center gap-1 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3.5 w-3.5">
                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    ঢাকা
                                </p>
                                <p class="text-sm text-[#665252] leading-relaxed flex-1">ব্লাড ব্যাংক ও স্বেচ্ছায় রক্তদান সেবা কার্যক্রম।</p>
                            </div>
                            <!-- Center 5 -->
                            <div class="rounded-lg bg-[#FDFBFB] border border-[#EADEDE] p-5 flex flex-col">
                                <h3 class="font-display font-semibold text-[#1A0D0D] mb-1">ঢাকা মেডিকেল কলেজ ব্লাড ব্যাংক</h3>
                                <p class="text-xs text-[#D32F2F] font-medium flex items-center gap-1 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3.5 w-3.5">
                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    ঢাকা
                                </p>
                                <p class="text-sm text-[#665252] leading-relaxed flex-1">সরকারি হাসপাতালভিত্তিক রক্তদান ও ব্লাড ব্যাংক সেবা।</p>
                            </div>
                            <!-- Center 6 -->
                            <div class="rounded-lg bg-[#FDFBFB] border border-[#EADEDE] p-5 flex flex-col">
                                <h3 class="font-display font-semibold text-[#1A0D0D] mb-1">সরকারি ব্লাড ট্রান্সফিউশন সেন্টার</h3>
                                <p class="text-xs text-[#D32F2F] font-medium flex items-center gap-1 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3.5 w-3.5">
                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    সারাদেশ
                                </p>
                                <p class="text-sm text-[#665252] leading-relaxed flex-1">হাসপাতালভিত্তিক সরকারি রক্তদান ও ব্লাড ব্যাংক সেবা।</p>
                            </div>
                        </div>
                        <div class="mt-8 rounded-lg bg-[#F4F0F0] border border-[#EADEDE] p-5 text-center">
                            <p class="text-sm text-[#665252] mb-4">আপনার এলাকার নিকটবর্তী রক্তদাতা খুঁজে সরাসরি যোগাযোগ করুন।</p>
                            <button class="h-11 px-6 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold inline-flex items-center gap-2 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search h-4 w-4">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                                রক্তদাতা খুঁজুন
                            </button>
                        </div>
                    </div>
                </section>

                <!-- How It Works -->
                <section class="bg-white border-t border-[#EADEDE]">
                    <div class="mx-auto max-w-7xl px-4 py-10">
                        <h2 class="font-display text-xl font-bold text-[#1A0D0D] text-center mb-8">কিভাবে কাজ করে</h2>
                        <div class="grid md:grid-cols-3 gap-6">
                            <div class="text-center p-5 rounded-lg bg-[#FDFBFB] border border-[#EADEDE]">
                                <div class="mx-auto mb-3 h-12 w-12 rounded-full bg-[#D32F2F] text-white flex items-center justify-center font-bold text-lg">১</div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text h-6 w-6 text-[#D32F2F] mx-auto mb-2">
                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                    <path d="M10 9H8"></path>
                                    <path d="M16 13H8"></path>
                                    <path d="M16 17H8"></path>
                                </svg>
                                <h3 class="font-display font-semibold text-[#1A0D0D] mb-1">পোস্ট করুন</h3>
                                <p class="text-sm text-[#665252] leading-relaxed">রক্তের প্রয়োজন হলে আপনার ফোন নম্বর দিয়ে দ্রুত পোস্ট তৈরি করুন।</p>
                            </div>
                            <div class="text-center p-5 rounded-lg bg-[#FDFBFB] border border-[#EADEDE]">
                                <div class="mx-auto mb-3 h-12 w-12 rounded-full bg-[#D32F2F] text-white flex items-center justify-center font-bold text-lg">২</div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search h-6 w-6 text-[#D32F2F] mx-auto mb-2">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                                <h3 class="font-display font-semibold text-[#1A0D0D] mb-1">দাতার তথ্য খুঁজুন</h3>
                                <p class="text-sm text-[#665252] leading-relaxed">রক্তের গ্রুপ ও অবস্থান অনুযায়ী উপলব্ধ রক্তদাতা খুঁজুন।</p>
                            </div>
                            <div class="text-center p-5 rounded-lg bg-[#FDFBFB] border border-[#EADEDE]">
                                <div class="mx-auto mb-3 h-12 w-12 rounded-full bg-[#D32F2F] text-white flex items-center justify-center font-bold text-lg">৩</div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-call h-6 w-6 text-[#D32F2F] mx-auto mb-2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    <path d="M14.05 2a9 9 0 0 1 8 7.94"></path>
                                    <path d="M14.05 6A5 5 0 0 1 18 10"></path>
                                </svg>
                                <h3 class="font-display font-semibold text-[#1A0D0D] mb-1">যোগাযোগ করুন</h3>
                                <p class="text-sm text-[#665252] leading-relaxed">দাতার সাথে যোগাযোগ করে রক্তদানের ব্যবস্থা নিশ্চিত করুন।</p>
                            </div>
                        </div>
                        <p class="text-center text-xs text-[#998585] mt-8 max-w-2xl mx-auto">* এই প্ল্যাটফর্ম রক্তদাতার প্রাপ্যতা বা চিকিৎসা উপযোগিতা নিশ্চিত করে না এবং চিকিৎসা পরামর্শের বিকল্প নয়।</p>
                    </div>
                </section>
            </div>
        </main>

        <!-- Footer / Mobile Bottom Nav Component -->
        <x-footer />
    </div>
    <x-verify-modal />
    <x-bd-cascading-js />
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            initCascadingDropdowns('homeDiv', 'homeDist', 'homeUpa');
        });
    </script>
</body>
</html>
