<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>রক্তদাতা হিসেবে যুক্ত হোন — রক্তদান বাংলাদেশ</title>
    <meta name="description" content="কোনো পাসওয়ার্ড ছাড়াই — শুধু ফোন নম্বর দিয়ে রক্তদাতা হিসেবে নিবন্ধন করুন।">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-[#1A0D0D] bg-[#FDFBFB]">
    <div class="min-h-screen bg-[#FDFBFB] flex flex-col">
        <x-header active="become-donor" />

        @if (session('success'))
            <div class="mx-auto max-w-2xl px-4 pt-4 w-full">
                <div class="rounded-md bg-[#E8F5E9] border border-[#81C784] text-[#2E7D32] px-4 py-3 text-sm">{{ session('success') }}</div>
            </div>
        @endif
        @if (session('error'))
            <div class="mx-auto max-w-2xl px-4 pt-4 w-full">
                <div class="rounded-md bg-[#FDE8E8] border border-[#DC2626] text-[#DC2626] px-4 py-3 text-sm">{{ session('error') }}</div>
            </div>
        @endif
        @if ($errors->any())
            <div class="mx-auto max-w-2xl px-4 pt-4 w-full">
                <div class="rounded-md bg-[#FDE8E8] border border-[#DC2626] text-[#DC2626] px-4 py-3 text-sm">
                    <p class="font-semibold mb-1">অনুগ্রহ করে নিচের সমস্যাগুলো ঠিক করুন:</p>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Main Content -->
        <main class="flex-1 pb-16 lg:pb-0">
            <div class="mx-auto max-w-2xl px-4 py-6">
                <!-- Page Title -->
                <div class="mb-6">
                    <h1 class="font-display text-2xl font-bold text-[#1A0D0D] mb-1 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-plus h-6 w-6 text-[#D32F2F]">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <line x1="19" x2="19" y1="8" y2="14"></line>
                            <line x1="22" x2="16" y1="11" y2="11"></line>
                        </svg>
                        রক্তদাতা হিসেবে যুক্ত হোন
                    </h1>
                    <p class="text-sm text-[#665252]">কোনো পাসওয়ার্ড ছাড়াই — শুধু ফোন নম্বর দিয়ে রক্তদাতা হোন।</p>
                </div>

                <!-- Phone Verification Alert Banner -->
                @if (! auth()->check())
                    <div class="rounded-md bg-[#F4F0F0] border border-[#EADEDE] p-3 mb-5 text-sm text-[#665252]">
                        রক্তদাতা হতে ফোন নম্বর যাচাই করা প্রয়োজন। <button type="button" onclick="openPhoneModal()" class="text-[#D32F2F] font-medium underline">এখানে যাচাই করুন</button>
                    </div>
                @endif

                @if (auth()->check() && $donor)
                    <div class="rounded-md bg-[#E8F5E9] border border-[#81C784] p-3 mb-5 text-sm text-[#2E7D32]">
                        আপনার রক্তদাতা প্রোফাইল আগে থেকেই আছে ({{ __('status') }}: <strong>{{ $donor->status }}</strong>)। নিচের ফর্ম দিয়ে তথ্য হালনাগাদ করতে পারেন।
                    </div>
                @endif

                <!-- Registration Form -->
                <form method="POST" action="{{ route('donor.store') }}" class="space-y-6">
                    @csrf

                    <!-- Basic Info Section -->
                    <section class="bg-white rounded-lg border border-[#EADEDE] p-4">
                        <h2 class="font-display font-semibold text-[#1A0D0D] mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet h-4 w-4 text-[#D32F2F]">
                                <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                            </svg>
                            মৌলিক তথ্য
                        </h2>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="col-span-2">
                                <label class="text-sm font-medium leading-none">নাম *</label>
                                <input name="name" value="{{ old('name', $donor?->name) }}" required class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">ফোন নম্বর *</label>
                                <input value="{{ auth()->user()->phone ?? '' }}" disabled class="flex w-full rounded-md border border-[#EADEDE] px-3 py-1 text-base shadow-sm transition-colors md:text-sm h-11 mt-1 bg-[#F4F0F0]">
                                <p class="text-xs text-[#998585] mt-1">OTP দিয়ে যাচাইকৃত নম্বর</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">রক্তের গ্রুপ *</label>
                                <select name="blood_group" required class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                                    <option value="">নির্বাচন</option>
                                    @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                                        <option value="{{ $group }}" {{ old('blood_group', $donor?->blood_group) === $group ? 'selected' : '' }}>{{ $group }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">বয়স (ঐচ্ছিক)</label>
                                <input type="number" name="age" min="18" max="65" value="{{ old('age', $donor?->age) }}" class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">লিঙ্গ (ঐচ্ছিক)</label>
                                <select name="gender" class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                                    <option value="">নির্বাচন</option>
                                    @foreach (['পুরুষ' => 'পুরুষ', 'নারী' => 'নারী', 'অন্যান্য' => 'অন্যান্য'] as $g => $label)
                                        <option value="{{ $g }}" {{ old('gender', $donor?->gender) === $g ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </section>

                    <!-- Location Info Section -->
                    <section class="bg-white rounded-lg border border-[#EADEDE] p-4">
                        <h2 class="font-display font-semibold text-[#1A0D0D] mb-4">অবস্থানের তথ্য</h2>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-sm font-medium leading-none">বিভাগ *</label>
                                <select name="division" id="donorDiv" required class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                                    <option value="">নির্বাচন</option>
                                    @foreach (\App\Models\Division::orderBy('name')->get() as $division)
                                        <option value="{{ $division->name }}" {{ old('division', $donor?->division) === $division->name ? 'selected' : '' }}>{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">জেলা *</label>
                                <select name="district" id="donorDist" required class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                                    <option value="">নির্বাচন</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">উপজেলা / থানা</label>
                                <select name="upazila" id="donorUpa" class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                                    <option value="">নির্বাচন</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">এলাকা</label>
                                <input name="area" value="{{ old('area', $donor?->area) }}" class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                            </div>
                            <div class="col-span-2">
                                <label class="text-sm font-medium leading-none">ঠিকানা</label>
                                <input name="address" value="{{ old('address', $donor?->address) }}" class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                            </div>
                        </div>
                    </section>

                    <!-- Availability Info Section -->
                    <section class="bg-white rounded-lg border border-[#EADEDE] p-4">
                        <h2 class="font-display font-semibold text-[#1A0D0D] mb-4">রক্তদানের প্রাপ্যতা</h2>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="col-span-2">
                                <label class="text-sm font-medium leading-none">বর্তমান অবস্থা</label>
                                <select name="availability" id="availabilitySelect" class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                                    <option value="available" {{ old('availability', $donor ? ($donor->is_available ? 'available' : 'unavailable') : 'available') === 'available' ? 'selected' : '' }}>আমি বর্তমানে রক্ত দিতে পারব</option>
                                    <option value="unavailable" {{ old('availability', $donor ? ($donor->is_available ? 'available' : 'unavailable') : 'available') === 'unavailable' ? 'selected' : '' }}>আমি বর্তমানে রক্ত দিতে পারছি না</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">শেষ রক্তদানের তারিখ (ঐচ্ছিক)</label>
                                <input type="date" name="last_donation_date" value="{{ old('last_donation_date', $donor?->last_donation_date?->format('Y-m-d')) }}" class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">মোট কতবার রক্ত দিয়েছেন (ঐচ্ছিক)</label>
                                <input type="number" value="{{ old('total_donations', $donor?->total_donations ?? 0) }}" disabled class="flex w-full rounded-md border border-[#EADEDE] px-3 py-1 text-base shadow-sm md:text-sm h-11 mt-1 bg-[#F4F0F0]">
                                <p class="text-xs text-[#998585] mt-1">অ্যাডমিন প্যানেল থেকে যাচাই করে হিসাব হয়</p>
                            </div>
                        </div>
                        <label class="flex items-center gap-2 text-sm text-[#1A0D0D] cursor-pointer mt-3">
                            <input type="checkbox" name="accept_calls" checked class="h-4 w-4 rounded border-[#D4B6B6] text-[#D32F2F] focus:ring-[#D32F2F]">
                            আমি জরুরি ফোন কল গ্রহণ করতে পারব
                        </label>
                    </section>

                    <!-- Submit Button -->
                    <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 shadow px-4 py-2 w-full h-12 bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-base" type="submit" {{ ! auth()->check() ? 'disabled' : '' }}>
                        {{ $donor ? 'প্রোফাইল হালনাগাদ করুন' : 'রক্তদাতা হিসেবে যুক্ত হোন' }}
                    </button>
                    @if (! auth()->check())
                        <p class="text-center text-xs text-[#665252]">প্রোফাইল তৈরি করতে উপরে ফোন নম্বর যাচাই করুন</p>
                    @endif
                </form>
            </div>
        </main>

        <!-- Footer / Mobile Bottom Nav Component -->
        <x-footer />
    </div>
    <x-verify-modal />
    <x-bd-cascading-js />
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            initCascadingDropdowns('donorDiv', 'donorDist', 'donorUpa', {
                division: '{{ old('division', $donor?->division) }}',
                district: '{{ old('district', $donor?->district) }}',
                upazila: '{{ old('upazila', $donor?->upazila) }}'
            });
        });
    </script>
</body>
</html>
