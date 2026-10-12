<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>রক্তের জন্য পোস্ট করুন — রক্তদান বাংলাদেশ</title>
    <meta name="description" content="জরুরি রক্তের প্রয়োজন হলে ফর্ম পূরণ করে পোস্ট তৈরি করুন।">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-[#1A0D0D] bg-[#FDFBFB]">
    <div class="min-h-screen bg-[#FDFBFB] flex flex-col">
        <x-header active="post-request" />

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
                    <h1 class="font-display text-2xl font-bold text-[#1A0D0D] mb-1">রক্তের জন্য পোস্ট করুন</h1>
                    <p class="text-sm text-[#665252]">জরুরি রক্তের প্রয়োজন হলে নিচের ফর্ম পূরণ করুন।</p>
                </div>

                <!-- Verification Alert Banner -->
                @if (! auth()->check())
                    <div class="rounded-md bg-[#F4F0F0] border border-[#EADEDE] p-3 mb-5 text-sm text-[#665252]">
                        পোস্ট করতে ফোন নম্বর যাচাই করা প্রয়োজন। <button type="button" onclick="openPhoneModal()" class="text-[#D32F2F] font-medium underline">এখানে যাচাই করুন</button>
                    </div>
                @endif

                <!-- Post Request Form -->
                <form method="POST" action="{{ route('request.store') }}" class="space-y-6">
                    @csrf

                    <!-- Patient Info Section -->
                    <section class="bg-white rounded-lg border border-[#EADEDE] p-4">
                        <h2 class="font-display font-semibold text-[#1A0D0D] mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplet h-4 w-4 text-[#D32F2F]">
                                <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                            </svg>
                            রোগীর তথ্য
                        </h2>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="col-span-2">
                                <label class="text-sm font-medium leading-none">রোগীর নাম (ঐচ্ছিক)</label>
                                <input name="patient_name" value="{{ old('patient_name') }}" class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">বয়স (ঐচ্ছিক)</label>
                                <input type="number" name="patient_age" min="0" max="120" value="{{ old('patient_age') }}" class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">লিঙ্গ (ঐচ্ছিক)</label>
                                <select name="patient_gender" class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                                    <option value="">নির্বাচন</option>
                                    @foreach (['পুরুষ', 'নারী', 'অন্যান্য'] as $gender)
                                        <option value="{{ $gender }}" {{ old('patient_gender') === $gender ? 'selected' : '' }}>{{ $gender }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">রক্তের গ্রুপ *</label>
                                <select name="blood_group" required class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                                    <option value="">নির্বাচন</option>
                                    @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                                        <option value="{{ $group }}" {{ old('blood_group') === $group ? 'selected' : '' }}>{{ $group }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">ব্যাগ সংখ্যা *</label>
                                <input type="number" name="bags_needed" min="1" max="20" value="{{ old('bags_needed', 1) }}" required class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">প্রয়োজনের তারিখ *</label>
                                <input type="date" name="needed_by" value="{{ old('needed_by') }}" required class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">জরুরি অবস্থা *</label>
                                <select name="urgency" required class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                                    @foreach (['জরুরি', 'সাধারণ', 'পূর্বনির্ধারিত'] as $urgency)
                                        <option value="{{ $urgency }}" {{ old('urgency', 'সাধারণ') === $urgency ? 'selected' : '' }}>{{ $urgency }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </section>

                    <!-- Hospital Info Section -->
                    <section class="bg-white rounded-lg border border-[#EADEDE] p-4">
                        <h2 class="font-display font-semibold text-[#1A0D0D] mb-4">হাসপাতালের তথ্য</h2>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="col-span-2">
                                <label class="text-sm font-medium leading-none">হাসপাতালের নাম *</label>
                                <input name="hospital_name" value="{{ old('hospital_name') }}" required class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                            </div>
                            <div class="col-span-2">
                                <label class="text-sm font-medium leading-none">হাসপাতালের ঠিকানা</label>
                                <input name="hospital_address" value="{{ old('hospital_address') }}" class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">বিভাগ *</label>
                                <select name="division" id="postDiv" required class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                                    <option value="">নির্বাচন</option>
                                    @foreach (\App\Models\Division::orderBy('name')->get() as $division)
                                        <option value="{{ $division->name }}" {{ old('division') === $division->name ? 'selected' : '' }}>{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">জেলা *</label>
                                <select name="district" id="postDist" required class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                                    <option value="">নির্বাচন</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-sm font-medium leading-none">উপজেলা / থানা</label>
                                <select name="upazila" id="postUpa" class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                                    <option value="">নির্বাচন</option>
                                </select>
                            </div>
                        </div>
                    </section>

                    <!-- Poster Info Section -->
                    <section class="bg-white rounded-lg border border-[#EADEDE] p-4">
                        <h2 class="font-display font-semibold text-[#1A0D0D] mb-4">পোস্টদাতার তথ্য</h2>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="col-span-2">
                                <label class="text-sm font-medium leading-none">পোস্টদাতার নাম *</label>
                                <input name="poster_name" value="{{ old('poster_name', auth()->user()->name ?? '') }}" required class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-1 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm h-11 mt-1">
                            </div>
                            <div class="col-span-2">
                                <label class="text-sm font-medium leading-none">ফোন নম্বর *</label>
                                <input value="{{ auth()->user()->phone ?? '' }}" disabled class="flex w-full rounded-md border border-[#EADEDE] px-3 py-1 text-base shadow-sm focus-visible:outline-none md:text-sm h-11 mt-1 bg-[#F4F0F0]">
                                <p class="text-xs text-[#998585] mt-1">OTP দিয়ে যাচাইকৃত নম্বর — এই নম্বরে দাতারা যোগাযোগ করবে</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="text-sm font-medium leading-none">বিস্তারিত বিবরণ</label>
                            <textarea name="description" rows="4" placeholder="রক্তের প্রয়োজন সম্পর্কে বিস্তারিত লিখুন..." class="flex w-full rounded-md border border-[#EADEDE] bg-transparent px-3 py-2 text-base shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#D32F2F] md:text-sm mt-1">{{ old('description') }}</textarea>
                        </div>
                    </section>

                    <!-- Submit Button -->
                    <button type="submit" {{ ! auth()->check() ? 'disabled' : '' }} class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md transition-colors shadow px-4 py-2 w-full h-12 bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-base disabled:opacity-50">
                        পোস্ট করুন
                    </button>
                    @if (! auth()->check())
                        <p class="text-center text-xs text-[#665252]">পোস্ট করতে উপরে ফোন নম্বর যাচাই করুন</p>
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
            initCascadingDropdowns('postDiv', 'postDist', 'postUpa');
        });
    </script>
</body>
</html>
