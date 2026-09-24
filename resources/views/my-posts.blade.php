<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>আমার পোস্ট — রক্তদান বাংলাদেশ</title>
    <meta name="description" content="আপনার তৈরি রক্তের অনুরোধসমূহ পরিচালনা করুন।">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite & Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-[#1A0D0D] bg-[#FDFBFB]">
    <div class="min-h-screen bg-[#FDFBFB] flex flex-col">
        <x-header active="my-posts" />

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
                            01320325852
                        </p>
                    </div>
                    <button onclick="alert('সফলভাবে লগআউট হয়েছে!')" class="inline-flex items-center justify-center gap-1.5 font-medium transition-colors border bg-transparent shadow-sm hover:bg-[#F4F0F0] h-8 rounded-md px-3 text-xs border-[#EADEDE] text-[#665252]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" x2="9" y1="12" y2="12"></line>
                        </svg>
                        লগআউট
                    </button>
                </div>

                <!-- Create Donor Profile CTA Card -->
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

                <!-- Tabs Header -->
                <div>
                    <div class="h-11 items-center justify-center rounded-lg p-1 grid grid-cols-3 w-full mb-4 bg-white border border-[#EADEDE]">
                        <button id="tab-btn-active" onclick="switchMyPostsTab('active')" type="button" class="tab-btn cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 font-semibold transition-all text-xs sm:text-sm bg-[#F4F0F0] text-[#D32F2F] shadow-sm">
                            সক্রিয় (<span id="count-active">1</span>)
                        </button>
                        <button id="tab-btn-completed" onclick="switchMyPostsTab('completed')" type="button" class="tab-btn cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 font-medium transition-all text-xs sm:text-sm text-[#665252] hover:text-[#1A0D0D]">
                            সম্পন্ন (<span id="count-completed">0</span>)
                        </button>
                        <button id="tab-btn-closed" onclick="switchMyPostsTab('closed')" type="button" class="tab-btn cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 font-medium transition-all text-xs sm:text-sm text-[#665252] hover:text-[#1A0D0D]">
                            বন্ধ (<span id="count-closed">0</span>)
                        </button>
                    </div>

                    <!-- Notification Toast -->
                    <div id="status-toast" class="hidden mb-4 p-3 rounded-lg bg-[#E8F5E9] border border-[#81C784] text-[#2E7D32] text-sm flex items-center justify-between transition-all">
                        <span id="toast-msg"></span>
                        <button onclick="document.getElementById('status-toast').classList.add('hidden')" class="font-bold text-lg leading-none">&times;</button>
                    </div>

                    <!-- Tab 1: Active Posts Content -->
                    <div id="tab-content-active" class="tab-content space-y-3">
                        <div id="post-card-1" class="rounded-lg bg-white border border-[#EADEDE] p-4">
                            <div class="flex items-start justify-between gap-3 mb-3">
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center justify-center rounded-full font-bold bg-[#D32F2F] text-white h-8 w-8 text-sm">B-</span>
                                    <span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-xs font-semibold bg-[#DC2626] text-white animate-pulse">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet">
                                            <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                                        </svg>
                                        জরুরি
                                    </span>
                                    <span id="badge-status-1" class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold bg-[#16A34A] text-white">সক্রিয়</span>
                                </div>
                                <span class="text-sm text-[#665252] font-medium">১৬ ব্যাগ</span>
                            </div>
                            <h3 class="font-medium text-[#1A0D0D] mb-1">ঢাকা মেডিকেল কলেজ হাসপাতাল, ঢাকা</h3>
                            <div class="space-y-1 text-sm text-[#665252] mb-3">
                                <p class="flex items-center gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar">
                                        <path d="M8 2v4"></path>
                                        <path d="M16 2v4"></path>
                                        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                        <path d="M3 10h18"></path>
                                    </svg>
                                    তারিখ: 2026-11-16
                                </p>
                            </div>
                            <div class="flex flex-wrap gap-2 pt-2 border-t border-[#EADEDE]">
                                <a href="{{ route('find-donor') }}">
                                    <button class="inline-flex items-center justify-center whitespace-nowrap font-medium border bg-transparent shadow-sm hover:bg-[#F4F0F0] rounded-md px-3 text-xs border-[#EADEDE] text-[#1A0D0D] h-8">দেখুন</button>
                                </a>
                                <button onclick="markAsCompleted('post-card-1')" class="inline-flex items-center justify-center whitespace-nowrap font-medium shadow rounded-md px-3 text-xs bg-[#16A34A] hover:bg-[#15803D] text-white h-8 cursor-pointer">রক্ত পাওয়া গেছে</button>
                                <button onclick="markAsClosed('post-card-1')" class="inline-flex items-center justify-center whitespace-nowrap font-medium border bg-transparent shadow-sm hover:bg-[#F4F0F0] rounded-md px-3 text-xs border-[#EADEDE] text-[#665252] h-8 cursor-pointer">বন্ধ করুন</button>
                                <button onclick="deletePost('post-card-1')" class="inline-flex items-center justify-center whitespace-nowrap font-medium border bg-transparent shadow-sm rounded-md px-3 text-xs border-[#DC2626] text-[#DC2626] hover:bg-[#DC2626] hover:text-white h-8 ml-auto cursor-pointer">মুছুন</button>
                            </div>
                        </div>

                        <!-- Active Empty State (Hidden initially) -->
                        <div id="active-empty" class="hidden bg-white rounded-lg border border-[#EADEDE] p-8 text-center">
                            <div class="h-12 w-12 rounded-full bg-[#F4F0F0] text-[#665252] flex items-center justify-center mx-auto mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                            </div>
                            <p class="font-medium text-[#1A0D0D] mb-1">কোনো সক্রিয় পোস্ট নেই</p>
                            <p class="text-xs text-[#665252] mb-4">আপনার কোনো জরুরি রক্তের অনুরোধ বর্তমানে সক্রিয় নেই।</p>
                            <a href="{{ route('post-request') }}" class="inline-flex items-center justify-center gap-1 text-xs font-semibold bg-[#D32F2F] text-white px-4 py-2 rounded-md hover:bg-[#B71C1C] transition-colors">নতুন পোস্ট করুন</a>
                        </div>
                    </div>

                    <!-- Tab 2: Completed Posts Content -->
                    <div id="tab-content-completed" class="tab-content hidden space-y-3">
                        <div id="completed-empty" class="bg-white rounded-lg border border-[#EADEDE] p-8 text-center">
                            <div class="h-12 w-12 rounded-full bg-[#E8F5E9] text-[#16A34A] flex items-center justify-center mx-auto mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle-2"><circle cx="12" cy="12" r="10"></circle><path d="m9 12 2 2 4-4"></path></svg>
                            </div>
                            <p class="font-medium text-[#1A0D0D] mb-1">কোনো সম্পন্ন পোস্ট নেই</p>
                            <p class="text-xs text-[#665252]">যেসব পোস্টের রক্তদান সফলভাবে সম্পন্ন হয়েছে তা এখানে দেখাবে।</p>
                        </div>
                        <div id="completed-list" class="space-y-3"></div>
                    </div>

                    <!-- Tab 3: Closed Posts Content -->
                    <div id="tab-content-closed" class="tab-content hidden space-y-3">
                        <div id="closed-empty" class="bg-white rounded-lg border border-[#EADEDE] p-8 text-center">
                            <div class="h-12 w-12 rounded-full bg-[#F4F0F0] text-[#665252] flex items-center justify-center mx-auto mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive"><rect width="20" height="5" x="2" y="3" rx="1"></rect><path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"></path><path d="M10 12h4"></path></svg>
                            </div>
                            <p class="font-medium text-[#1A0D0D] mb-1">কোনো বন্ধ পোস্ট নেই</p>
                            <p class="text-xs text-[#665252]">যেসব অনুরোধ বন্ধ করা হয়েছে তা এখানে জমা থাকবে।</p>
                        </div>
                        <div id="closed-list" class="space-y-3"></div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer / Mobile Bottom Nav Component -->
        <x-footer />
    </div>
    <x-verify-modal />

    <script>
        function switchMyPostsTab(tabName) {
            const tabs = ['active', 'completed', 'closed'];
            tabs.forEach(t => {
                const btn = document.getElementById(`tab-btn-${t}`);
                const content = document.getElementById(`tab-content-${t}`);
                if (t === tabName) {
                    btn.className = 'tab-btn cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 font-semibold transition-all text-xs sm:text-sm bg-[#F4F0F0] text-[#D32F2F] shadow-sm';
                    content.classList.remove('hidden');
                } else {
                    btn.className = 'tab-btn cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 font-medium transition-all text-xs sm:text-sm text-[#665252] hover:text-[#1A0D0D]';
                    content.classList.add('hidden');
                }
            });
        }

        function showToast(message) {
            const toast = document.getElementById('status-toast');
            const toastMsg = document.getElementById('toast-msg');
            toastMsg.textContent = message;
            toast.classList.remove('hidden');
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 4000);
        }

        function updateCounts() {
            const activeCount = document.getElementById('tab-content-active').querySelectorAll('#post-card-1').length;
            const completedCount = document.getElementById('completed-list').querySelectorAll('#post-card-1').length;
            const closedCount = document.getElementById('closed-list').querySelectorAll('#post-card-1').length;

            document.getElementById('count-active').textContent = activeCount;
            document.getElementById('count-completed').textContent = completedCount;
            document.getElementById('count-closed').textContent = closedCount;

            // Empty states
            if (activeCount === 0) {
                document.getElementById('active-empty').classList.remove('hidden');
            } else {
                document.getElementById('active-empty').classList.add('hidden');
            }

            if (completedCount === 0) {
                document.getElementById('completed-empty').classList.remove('hidden');
            } else {
                document.getElementById('completed-empty').classList.add('hidden');
            }

            if (closedCount === 0) {
                document.getElementById('closed-empty').classList.remove('hidden');
            } else {
                document.getElementById('closed-empty').classList.add('hidden');
            }
        }

        function markAsCompleted(cardId) {
            const card = document.getElementById(cardId);
            if (!card) return;

            const badge = document.getElementById('badge-status-1');
            if (badge) {
                badge.className = 'inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold bg-[#16A34A] text-white';
                badge.textContent = 'সম্পন্ন';
            }

            document.getElementById('completed-list').appendChild(card);
            showToast('পোস্টটি সম্পন্ন হিসেবে চিহ্নিত করা হয়েছে।');
            updateCounts();
            switchMyPostsTab('completed');
        }

        function markAsClosed(cardId) {
            const card = document.getElementById(cardId);
            if (!card) return;

            const badge = document.getElementById('badge-status-1');
            if (badge) {
                badge.className = 'inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold bg-[#665252] text-white';
                badge.textContent = 'বন্ধ';
            }

            document.getElementById('closed-list').appendChild(card);
            showToast('পোস্টটি বন্ধ করা হয়েছে।');
            updateCounts();
            switchMyPostsTab('closed');
        }

        function deletePost(cardId) {
            if (confirm('আপনি কি নিশ্চিত যে এই পোস্টটি মুছে ফেলতে চান?')) {
                const card = document.getElementById(cardId);
                if (card) {
                    card.remove();
                    showToast('পোস্টটি সফলভাবে মুছে ফেলা হয়েছে।');
                    updateCounts();
                }
            }
        }
    </script>
</body>
</html>
