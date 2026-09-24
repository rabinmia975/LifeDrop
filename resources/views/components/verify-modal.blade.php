<!-- Phone Verification Modal -->
<div id="phoneVerificationModal" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 relative">
        <!-- Close Button -->
        <button type="button" onclick="closePhoneModal()" class="absolute top-4 right-4 text-[#998585] hover:text-[#1A0D0D] transition-colors p-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <!-- Step 1: Input Phone Number -->
        <div id="modalStep1">
            <h3 class="font-display text-xl font-bold text-[#1A0D0D] mb-1">ফোন নম্বর যাচাই করুন</h3>
            <p class="text-sm text-[#665252] mb-5 leading-relaxed">কোনো পাসওয়ার্ড বা রেজিস্ট্রেশন ছাড়াই — শুধু ফোন নম্বর দিয়ে যাচাই করুন।</p>
            
            <div class="mb-5">
                <label class="block text-sm font-medium text-[#1A0D0D] mb-1.5">ফোন নম্বর</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#998585]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                    </div>
                    <input type="tel" id="modalPhoneInput" placeholder="01XXXXXXXXX" class="w-full pl-10 pr-4 py-2.5 rounded-md border border-[#EADEDE] text-sm text-[#1A0D0D] placeholder:text-[#998585] focus:outline-none focus:ring-1 focus:ring-[#D32F2F]">
                </div>
            </div>

            <button type="button" onclick="handleSendOTP()" class="w-full py-3 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-base transition-colors shadow-sm">
                OTP পাঠান
            </button>
        </div>

        <!-- Step 2: Enter OTP -->
        <div id="modalStep2" class="hidden">
            <h3 class="font-display text-xl font-bold text-[#1A0D0D] mb-1">OTP যাচাই করুন</h3>
            <p class="text-sm text-[#665252] mb-5 leading-relaxed"><span id="targetPhoneText" class="font-semibold text-[#1A0D0D]"></span> নম্বরে পাঠানো ৪ ডিজিটের কোডটি লিখুন।</p>

            <div class="mb-5">
                <input type="text" id="otpInput" maxlength="4" placeholder="1 2 3 4" class="w-full text-center tracking-widest text-2xl font-bold py-2.5 rounded-md border border-[#EADEDE] text-[#1A0D0D] focus:outline-none focus:ring-1 focus:ring-[#D32F2F]">
            </div>

            <button type="button" onclick="handleVerifyOTP()" class="w-full py-3 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-base transition-colors shadow-sm mb-3">
                যাচাই সম্পন্ন করুন
            </button>
            <button type="button" onclick="backToStep1()" class="w-full text-xs text-[#665252] hover:text-[#D32F2F] text-center font-medium">
                ← ফোন নম্বর পরিবর্তন করুন
            </button>
        </div>
    </div>
</div>

<script>
    function openPhoneModal() {
        const modal = document.getElementById('phoneVerificationModal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closePhoneModal() {
        const modal = document.getElementById('phoneVerificationModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
            backToStep1();
        }
    }

    function handleSendOTP() {
        const phone = document.getElementById('modalPhoneInput').value;
        if (!phone) {
            alert('অনুগ্রহ করে আপনার ফোন নম্বর লিখুন');
            return;
        }
        document.getElementById('targetPhoneText').innerText = phone;
        document.getElementById('modalStep1').classList.add('hidden');
        document.getElementById('modalStep2').classList.remove('hidden');
    }

    function handleVerifyOTP() {
        const otp = document.getElementById('otpInput').value;
        if (!otp || otp.length < 4) {
            alert('অনুগ্রহ করে ৪ ডিজিটের সঠিক OTP লিখুন');
            return;
        }
        alert('আপনার ফোন নম্বর সফলভাবে যাচাই করা হয়েছে!');
        closePhoneModal();
    }

    function backToStep1() {
        document.getElementById('modalStep1').classList.remove('hidden');
        document.getElementById('modalStep2').classList.add('hidden');
    }
</script>
