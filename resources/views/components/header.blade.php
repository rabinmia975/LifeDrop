@props(['active' => ''])

<!-- Header -->
<header class="sticky top-0 z-40 bg-white border-b border-[#EADEDE]">
    <div class="mx-auto max-w-7xl px-4 h-16 flex items-center justify-between">
        <!-- Logo -->
        <a class="flex-shrink-0" href="/">
            <div class="flex items-center gap-2">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#D32F2F] text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet h-5 w-5">
                        <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                    </svg>
                </div>
                <span class="font-display text-lg font-bold text-[#D32F2F] leading-tight">রক্তদান বাংলাদেশ</span>
            </div>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center gap-1">
            <a class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ $active === 'home' ? 'text-[#D32F2F] bg-[#F4F0F0]' : 'text-[#1A0D0D] hover:text-[#D32F2F] hover:bg-[#F4F0F0]' }}" href="/">হোম</a>
            <a class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ $active === 'find-donor' ? 'text-[#D32F2F] bg-[#F4F0F0]' : 'text-[#1A0D0D] hover:text-[#D32F2F] hover:bg-[#F4F0F0]' }}" href="/find-donor">রক্তদাতা খুঁজুন</a>
            <a class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ $active === 'post-request' ? 'text-[#D32F2F] bg-[#F4F0F0]' : 'text-[#1A0D0D] hover:text-[#D32F2F] hover:bg-[#F4F0F0]' }}" href="/post-request">রক্তের জন্য পোস্ট করুন</a>
            <a class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ $active === 'become-donor' ? 'text-[#D32F2F] bg-[#F4F0F0]' : 'text-[#1A0D0D] hover:text-[#D32F2F] hover:bg-[#F4F0F0]' }}" href="/become-donor">রক্তদাতা হিসেবে যুক্ত হোন</a>
        </nav>

        <!-- Right Side Actions & Hamburger Toggle -->
        <div class="flex items-center gap-2">
            <a href="/my-posts" class="items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none border bg-transparent shadow-sm px-4 py-2 hidden sm:flex border-[#D32F2F] text-[#D32F2F] hover:bg-[#D32F2F] hover:text-white h-9">
                আমার পোস্ট
            </a>
            <button type="button" onclick="toggleMobileMenu()" class="lg:hidden p-2 text-[#1A0D0D] rounded-md hover:bg-[#F4F0F0] transition-colors" aria-label="মেনু">
                <svg id="menuIconOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                    <line x1="4" x2="20" y1="12" y2="12"></line>
                    <line x1="4" x2="20" y1="6" y2="6"></line>
                    <line x1="4" x2="20" y1="18" y2="18"></line>
                </svg>
                <svg id="menuIconClose" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 hidden">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Drawer / Dropdown -->
    <div id="mobileMenuDrawer" class="hidden lg:hidden border-t border-[#EADEDE] bg-white px-4 pt-3 pb-5 shadow-lg animate-in slide-in-from-top-2 duration-200">
        <nav class="flex flex-col gap-1.5 mb-4">
            <a class="px-3.5 py-2.5 rounded-lg text-base font-medium transition-colors flex items-center justify-between {{ $active === 'home' ? 'text-[#D32F2F] bg-[#F4F0F0] font-semibold' : 'text-[#1A0D0D] hover:bg-[#F4F0F0]' }}" href="/">
                <span>হোম</span>
                <span class="text-xs">→</span>
            </a>
            <a class="px-3.5 py-2.5 rounded-lg text-base font-medium transition-colors flex items-center justify-between {{ $active === 'find-donor' ? 'text-[#D32F2F] bg-[#F4F0F0] font-semibold' : 'text-[#1A0D0D] hover:bg-[#F4F0F0]' }}" href="/find-donor">
                <span>রক্তদাতা খুঁজুন</span>
                <span class="text-xs">→</span>
            </a>
            <a class="px-3.5 py-2.5 rounded-lg text-base font-medium transition-colors flex items-center justify-between {{ $active === 'post-request' ? 'text-[#D32F2F] bg-[#F4F0F0] font-semibold' : 'text-[#1A0D0D] hover:bg-[#F4F0F0]' }}" href="/post-request">
                <span>রক্তের জন্য পোস্ট করুন</span>
                <span class="text-xs">→</span>
            </a>
            <a class="px-3.5 py-2.5 rounded-lg text-base font-medium transition-colors flex items-center justify-between {{ $active === 'become-donor' ? 'text-[#D32F2F] bg-[#F4F0F0] font-semibold' : 'text-[#1A0D0D] hover:bg-[#F4F0F0]' }}" href="/become-donor">
                <span>রক্তদাতা হিসেবে যুক্ত হোন</span>
                <span class="text-xs">→</span>
            </a>
            <a class="px-3.5 py-2.5 rounded-lg text-base font-medium transition-colors flex items-center justify-between {{ $active === 'my-posts' ? 'text-[#D32F2F] bg-[#F4F0F0] font-semibold' : 'text-[#1A0D0D] hover:bg-[#F4F0F0]' }}" href="/my-posts">
                <span>আমার পোস্ট</span>
                <span class="text-xs">→</span>
            </a>
        </nav>

        <div class="pt-3 border-t border-[#EADEDE] flex flex-col gap-2">
            <a href="/post-request" class="w-full py-2.5 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-center text-sm transition-colors shadow-sm">
                রক্তের জন্য পোস্ট তৈরি করুন
            </a>
            <button onclick="openPhoneModal()" class="w-full py-2.5 rounded-md bg-[#F4F0F0] text-[#D32F2F] font-semibold text-center text-sm transition-colors border border-[#EADEDE]">
                ফোন নম্বর যাচাই করুন
            </button>
        </div>
    </div>
</header>

<script>
    function toggleMobileMenu() {
        const drawer = document.getElementById('mobileMenuDrawer');
        const iconOpen = document.getElementById('menuIconOpen');
        const iconClose = document.getElementById('menuIconClose');

        if (drawer) {
            const isHidden = drawer.classList.contains('hidden');
            if (isHidden) {
                drawer.classList.remove('hidden');
                iconOpen.classList.add('hidden');
                iconClose.classList.remove('hidden');
            } else {
                drawer.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
            }
        }
    }
</script>
