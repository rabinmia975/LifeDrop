@php
    $currentRoute = request()->route()?->getName() ?? '';
    $isHome = request()->is('/') || $currentRoute === 'home';
    $isFindDonor = request()->is('find-donor*') || $currentRoute === 'find-donor';
    $isPostRequest = request()->is('post-request*') || $currentRoute === 'post-request';
    $isBecomeDonor = request()->is('become-donor*') || $currentRoute === 'become-donor';
    $isMyPosts = request()->is('my-posts*') || $currentRoute === 'my-posts';
@endphp

<!-- Main Desktop & Mobile Footer -->
<footer class="bg-white border-t border-[#EADEDE] pt-10 pb-20 lg:pb-10 mt-12">
    <div class="mx-auto max-w-7xl px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 pb-8 border-b border-[#EADEDE]">
            <!-- Brand Column -->
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#D32F2F] text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet h-5 w-5">
                            <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                        </svg>
                    </div>
                    <span class="font-display text-lg font-bold text-[#D32F2F] leading-tight">রক্তদান বাংলাদেশ</span>
                </a>
                <p class="text-sm text-[#665252] leading-relaxed">
                    জরুরি রক্তদানে মানুষের পাশে — বিনামূল্যে ও নিরাপদ রক্তদাতা সন্ধানের উন্মুক্ত ডিজিটাল প্ল্যাটফর্ম।
                </p>
                <div class="flex items-center gap-3 text-sm text-[#D32F2F] font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-call">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    জরুরি হেল্পলাইন: ০৯৬১১-২২৩৩৪৪
                </div>
            </div>

            <!-- Navigation Links -->
            <div>
                <h3 class="font-display font-semibold text-[#1A0D0D] mb-3">দ্রুত নেভিগেশন</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-[#665252] hover:text-[#D32F2F] transition-colors {{ $isHome ? 'font-bold text-[#D32F2F]' : '' }}">হোম পেজ</a>
                    </li>
                    <li>
                        <a href="{{ route('find-donor') }}" class="text-[#665252] hover:text-[#D32F2F] transition-colors {{ $isFindDonor ? 'font-bold text-[#D32F2F]' : '' }}">রক্তদাতা খুঁজুন</a>
                    </li>
                    <li>
                        <a href="{{ route('post-request') }}" class="text-[#665252] hover:text-[#D32F2F] transition-colors {{ $isPostRequest ? 'font-bold text-[#D32F2F]' : '' }}">রক্তের পোস্ট করুন</a>
                    </li>
                    <li>
                        <a href="{{ route('become-donor') }}" class="text-[#665252] hover:text-[#D32F2F] transition-colors {{ $isBecomeDonor ? 'font-bold text-[#D32F2F]' : '' }}">রক্তদাতা হিসেবে যুক্ত হোন</a>
                    </li>
                    <li>
                        <a href="{{ route('my-posts') }}" class="text-[#665252] hover:text-[#D32F2F] transition-colors {{ $isMyPosts ? 'font-bold text-[#D32F2F]' : '' }}">আমার পোস্টসমূহ</a>
                    </li>
                </ul>
            </div>

            <!-- Donor Info -->
            <div>
                <h3 class="font-display font-semibold text-[#1A0D0D] mb-3">রক্তদান নির্দেশিকা</h3>
                <ul class="space-y-2 text-sm text-[#665252]">
                    <li>• রক্তদানের সর্বনিম্ন বয়স ১৮ বছর</li>
                    <li>• ওজন অন্তত ৪৫ কেজির বেশি হতে হবে</li>
                    <li>• প্রতি ১২০ দিন (৪ মাস) পর পর রক্তদান করা নিরাপদ</li>
                    <li>• রক্তদানের পর প্রচুর পানি ও পুষ্টিকর খাবার খান</li>
                </ul>
            </div>

            <!-- Disclaimer -->
            <div>
                <h3 class="font-display font-semibold text-[#1A0D0D] mb-3">সতর্কতা ও নীতি</h3>
                <p class="text-xs text-[#665252] leading-relaxed mb-3">
                    এই প্ল্যাটফর্ম কেবল রক্তদাতা ও রোগীর যোগাযোগের মাধ্যম। রক্ত লেনদেনে কোনো প্রকার অর্থ লেনদেন করবেন না।
                </p>
                <p class="text-xs text-[#998585]">
                    © {{ date('Y') }} রক্তদান বাংলাদেশ। সর্বস্বত্ব সংরক্ষিত।
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Mobile Bottom Fixed Navigation Menu -->
<nav class="lg:hidden fixed bottom-0 inset-x-0 z-40 bg-white border-t border-[#EADEDE] h-16 flex items-center justify-around px-1 shadow-lg">
    <!-- Home -->
    <a href="{{ route('home') }}" class="flex flex-col items-center justify-center gap-1 flex-1 h-full text-xs transition-colors {{ $isHome ? 'text-[#D32F2F] font-bold' : 'text-[#665252] hover:text-[#D32F2F]' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="{{ $isHome ? '2.5' : '2' }}" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house">
            <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path>
            <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
        </svg>
        <span>হোম</span>
    </a>

    <!-- Find Donor -->
    <a href="{{ route('find-donor') }}" class="flex flex-col items-center justify-center gap-1 flex-1 h-full text-xs transition-colors {{ $isFindDonor ? 'text-[#D32F2F] font-bold' : 'text-[#665252] hover:text-[#D32F2F]' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="{{ $isFindDonor ? '2.5' : '2' }}" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.3-4.3"></path>
        </svg>
        <span>রক্তদাতা</span>
    </a>

    <!-- Post Request (Highlighted Central Action) -->
    <a href="{{ route('post-request') }}" class="flex flex-col items-center justify-center gap-0.5 flex-1 h-full text-xs transition-transform active:scale-95 {{ $isPostRequest ? 'text-[#D32F2F] font-bold' : 'text-[#D32F2F]' }}">
        <div class="h-9 w-9 rounded-full bg-[#D32F2F] text-white flex items-center justify-center shadow-md {{ $isPostRequest ? 'ring-2 ring-offset-1 ring-[#D32F2F]' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
                <path d="M5 12h14"></path>
                <path d="M12 5v14"></path>
            </svg>
        </div>
        <span class="font-bold text-[11px] text-[#D32F2F]">পোস্ট করুন</span>
    </a>

    <!-- Become Donor -->
    <a href="{{ route('become-donor') }}" class="flex flex-col items-center justify-center gap-1 flex-1 h-full text-xs transition-colors {{ $isBecomeDonor ? 'text-[#D32F2F] font-bold' : 'text-[#665252] hover:text-[#D32F2F]' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="{{ $isBecomeDonor ? '2.5' : '2' }}" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-plus">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <line x1="19" x2="19" y1="8" y2="14"></line>
            <line x1="22" x2="16" y1="11" y2="11"></line>
        </svg>
        <span>দাতা হোন</span>
    </a>

    <!-- My Posts -->
    <a href="{{ route('my-posts') }}" class="flex flex-col items-center justify-center gap-1 flex-1 h-full text-xs transition-colors {{ $isMyPosts ? 'text-[#D32F2F] font-bold' : 'text-[#665252] hover:text-[#D32F2F]' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="{{ $isMyPosts ? '2.5' : '2' }}" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text">
            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
            <path d="M10 9H8"></path>
            <path d="M16 13H8"></path>
            <path d="M16 17H8"></path>
        </svg>
        <span>আমার পোস্ট</span>
    </a>
</nav>
