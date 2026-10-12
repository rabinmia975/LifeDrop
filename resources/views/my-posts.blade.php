<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>আমার পোস্ট — রক্তদান বাংলাদেশ</title>
    <meta name="description" content="আপনার তৈরি রক্তের অনুরোধসমূহ পরিচালনা করুন।">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-[#1A0D0D] bg-[#FDFBFB]">
    <div class="min-h-screen bg-[#FDFBFB] flex flex-col">
        <x-header active="my-posts" />

        @if (session('success'))
            <div class="mx-auto max-w-3xl px-4 pt-4 w-full">
                <div class="rounded-md bg-[#E8F5E9] border border-[#81C784] text-[#2E7D32] px-4 py-3 text-sm">{{ session('success') }}</div>
            </div>
        @endif

        <!-- Main Content -->
        <main class="flex-1 pb-16 lg:pb-0">
            <div class="mx-auto max-w-3xl px-4 py-6">
                <!-- User Profile Header -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="font-display text-2xl font-bold text-[#1A0D0D]">আমার পোস্ট</h1>
                        <p class="text-sm text-[#665252] flex items-center gap-1 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            {{ auth()->user()->phone }}
                        </p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center justify-center gap-1.5 font-medium transition-colors border bg-transparent shadow-sm hover:bg-[#F4F0F0] h-8 rounded-md px-3 text-xs border-[#EADEDE] text-[#665252]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" x2="9" y1="12" y2="12"></line>
                            </svg>
                            লগআউট
                        </button>
                    </form>
                </div>

                <!-- Create Donor Profile CTA Card -->
                @unless (auth()->user()->donor)
                    <a class="block mb-5" href="{{ route('become-donor') }}">
                        <div class="rounded-lg bg-white border border-[#EADEDE] p-4 flex items-center gap-3 hover:shadow-sm transition-shadow">
                            <div class="h-11 w-11 rounded-full bg-[#F4F0F0] flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user text-[#D32F2F]">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-[#1A0D0D]">রক্তদাতা প্রোফাইল তৈরি করুন</p>
                                <p class="text-sm text-[#665252] truncate">রক্তদাতা হিসেবে যুক্ত হয়ে জীবন বাঁচাতে সাহায্য করুন</p>
                            </div>
                            <span class="text-sm text-[#D32F2F] font-medium shrink-0">যুক্ত হোন →</span>
                        </div>
                    </a>
                @endunless

                @php
                    $active = $requests->where('status', 'active');
                    $found = $requests->where('status', 'found');
                    $closed = $requests->where('status', 'closed');
                @endphp

                <!-- Tabs Header -->
                <div>
                    <div class="h-11 items-center justify-center rounded-lg p-1 grid grid-cols-3 w-full mb-4 bg-white border border-[#EADEDE]">
                        <button id="tab-btn-active" onclick="switchMyPostsTab('active')" type="button" class="tab-btn cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 font-semibold transition-all text-xs sm:text-sm bg-[#F4F0F0] text-[#D32F2F] shadow-sm">
                            সক্রিয় (<span id="count-active">{{ $active->count() }}</span>)
                        </button>
                        <button id="tab-btn-completed" onclick="switchMyPostsTab('completed')" type="button" class="tab-btn cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 font-medium transition-all text-xs sm:text-sm text-[#665252] hover:text-[#1A0D0D]">
                            সম্পন্ন (<span id="count-completed">{{ $found->count() }}</span>)
                        </button>
                        <button id="tab-btn-closed" onclick="switchMyPostsTab('closed')" type="button" class="tab-btn cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 font-medium transition-all text-xs sm:text-sm text-[#665252] hover:text-[#1A0D0D]">
                            বন্ধ (<span id="count-closed">{{ $closed->count() }}</span>)
                        </button>
                    </div>

                    <!-- Single reusable post card -->
                    @foreach (['active' => $active, 'completed' => $found, 'closed' => $closed] as $tabName => $items)
                        <div id="tab-content-{{ $tabName }}" class="tab-content space-y-3 {{ $loop->first ? '' : 'hidden' }}">
                            @forelse ($items as $item)
                                <div class="rounded-lg bg-white border border-[#EADEDE] p-4">
                                    <div class="flex items-start justify-between gap-3 mb-3">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-8 w-8 text-sm">{{ $item->blood_group }}</span>
                                            @if ($item->urgency === 'জরুরি')
                                                <span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-xs font-semibold bg-[#DC2626] text-white animate-pulse">
                                                    জরুরি
                                                </span>
                                            @endif
                                            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $item->status === 'active' ? 'bg-[#16A34A] text-white' : ($item->status === 'found' ? 'bg-[#2563EB] text-white' : 'bg-[#998585] text-white') }}">
                                                {{ ['active' => 'সক্রিয়', 'found' => 'রক্ত পাওয়া গেছে', 'closed' => 'বন্ধ'][$item->status] }}
                                            </span>
                                        </div>
                                        <span class="text-sm text-[#665252] font-medium whitespace-nowrap">{{ $item->bags_needed }} ব্যাগ</span>
                                    </div>
                                    <h3 class="font-medium text-[#1A0D0D] mb-1">{{ $item->hospital_name }}, {{ $item->district }}</h3>
                                    <div class="space-y-1 text-sm text-[#665252] mb-3">
                                        <p class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar">
                                                <path d="M8 2v4"></path>
                                                <path d="M16 2v4"></path>
                                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                <path d="M3 10h18"></path>
                                            </svg>
                                            তারিখ: {{ $item->needed_by->format('Y-m-d') }}
                                        </p>
                                        @if ($item->patient_name)
                                            <p>রোগী: {{ $item->patient_name }}</p>
                                        @endif
                                        @if ($item->description)
                                            <p class="text-xs">{{ Str::limit($item->description, 120) }}</p>
                                        @endif
                                    </div>
                                    <div class="flex flex-wrap gap-2 pt-2 border-t border-[#EADEDE]">
                                        <a href="{{ route('find-donor', ['group' => $item->blood_group]) }}">
                                            <button class="inline-flex items-center justify-center whitespace-nowrap font-medium border bg-transparent shadow-sm hover:bg-[#F4F0F0] rounded-md px-3 text-xs border-[#EADEDE] text-[#1A0D0D] h-8">দেখুন</button>
                                        </a>
                                        @if ($item->status === 'active')
                                            <form method="POST" action="{{ route('request.status', $item) }}">
                                                @csrf
                                                <input type="hidden" name="status" value="found">
                                                <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap font-medium shadow rounded-md px-3 text-xs bg-[#16A34A] hover:bg-[#15803D] text-white h-8 cursor-pointer">রক্ত পাওয়া গেছে</button>
                                            </form>
                                            <form method="POST" action="{{ route('request.status', $item) }}">
                                                @csrf
                                                <input type="hidden" name="status" value="closed">
                                                <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap font-medium border bg-transparent shadow-sm hover:bg-[#F4F0F0] rounded-md px-3 text-xs border-[#EADEDE] text-[#665252] h-8 cursor-pointer">বন্ধ করুন</button>
                                            </form>
                                        @endif
                                        <form method="POST" action="{{ route('request.destroy', $item) }}" onsubmit="return confirm('আপনি নিশ্চিত? পোস্টটি মুছে ফেলা হবে।')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap font-medium border bg-transparent shadow-sm rounded-md px-3 text-xs border-[#DC2626] text-[#DC2626] hover:bg-[#FDE8E8] h-8 cursor-pointer">মুছুন</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="rounded-lg bg-white border border-[#EADEDE] p-8 text-center text-sm text-[#665252]">
                                    {{ ['active' => 'কোনো সক্রিয় পোস্ট নেই', 'completed' => 'কোনো সম্পন্ন পোস্ট নেই', 'closed' => 'কোনো বন্ধ পোস্ট নেই'][$tabName] }}
                                    @if ($tabName === 'active')
                                        <div class="mt-3">
                                            <a href="{{ route('post-request') }}" class="inline-flex h-9 items-center rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-xs px-5">নতুন পোস্ট করুন</a>
                                        </div>
                                    @endif
                                </div>
                            @endforelse
                        </div>
                    @endforeach
                </div>
            </div>
        </main>

        <!-- Footer / Mobile Bottom Nav Component -->
        <x-footer />
    </div>
    <script>
        function switchMyPostsTab(tab) {
            const tabs = ['active', 'completed', 'closed'];
            tabs.forEach(function (t) {
                const content = document.getElementById('tab-content-' + t);
                const btn = document.getElementById('tab-btn-' + t);
                if (!content || !btn) return;

                if (t === tab) {
                    content.classList.remove('hidden');
                    btn.classList.add('bg-[#F4F0F0]', 'text-[#D32F2F]', 'font-semibold', 'shadow-sm');
                    btn.classList.remove('text-[#665252]');
                } else {
                    content.classList.add('hidden');
                    btn.classList.remove('bg-[#F4F0F0]', 'text-[#D32F2F]', 'font-semibold', 'shadow-sm');
                    btn.classList.add('text-[#665252]');
                }
            });
        }
    </script>
</body>
</html>
