<!-- Phone Verification Modal -->
<span id="lifedrop-csrf" class="hidden" data-token="{{ csrf_token() }}"></span>

<div id="phoneVerificationModal" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 relative">
        <button type="button" onclick="closePhoneModal()" class="absolute top-4 right-4 text-[#998585] hover:text-[#1A0D0D] transition-colors p-1" aria-label="বন্ধ করুন">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

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

            <p id="otpError" class="hidden text-sm text-[#DC2626] mb-3"></p>

            <button type="button" id="sendOtpBtn" onclick="handleSendOTP()" class="w-full py-3 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-base transition-colors shadow-sm">
                OTP পাঠান
            </button>
        </div>

        <div id="modalStep2" class="hidden">
            <h3 class="font-display text-xl font-bold text-[#1A0D0D] mb-1">OTP যাচাই করুন</h3>
            <p class="text-sm text-[#665252] mb-2 leading-relaxed"><span id="targetPhoneText" class="font-semibold text-[#1A0D0D]"></span> নম্বরে পাঠানো ৪ ডিজিটের কোডটি লিখুন।</p>
            <p id="devCodeHint" class="hidden text-xs bg-[#FFF8E1] border border-[#F59E0B] text-[#92400E] rounded-md px-3 py-2 mb-3"></p>

            <div class="mb-5">
                <input type="text" id="otpInput" maxlength="4" placeholder="1 2 3 4" class="w-full text-center tracking-widest text-2xl font-bold py-2.5 rounded-md border border-[#EADEDE] text-[#1A0D0D] focus:outline-none focus:ring-1 focus:ring-[#D32F2F]">
            </div>

            <p id="otpCheckError" class="hidden text-sm text-[#DC2626] mb-3"></p>

            <button type="button" id="verifyOtpBtn" onclick="handleVerifyOTP()" class="w-full py-3 rounded-md bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-semibold text-base transition-colors shadow-sm mb-3">
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

    function lifedropCsrf() {
        const el = document.getElementById('lifedrop-csrf');
        return el ? el.dataset.token : '';
    }

    function showOtpError(message) {
        const el = document.getElementById('otpError');
        if (el) { el.textContent = message; el.classList.remove('hidden'); }
    }

    async function handleSendOTP() {
        const phone = document.getElementById('modalPhoneInput').value.trim();
        const errorEl = document.getElementById('otpError');
        errorEl.classList.add('hidden');

        if (!/^01[3-9]\d{8}$/.test(phone)) {
            showOtpError('সঠিক ফোন নম্বর লিখুন (01XXXXXXXXX)');
            return;
        }

        const btn = document.getElementById('sendOtpBtn');
        btn.disabled = true;
        btn.textContent = 'পাঠানো হচ্ছে...';

        try {
            const res = await fetch('{{ route('otp.send') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': lifedropCsrf(),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ phone })
            });

            const data = await res.json();

            if (!data.ok) {
                showOtpError(data.message || 'SMS পাঠানো যায়নি।');
                return;
            }

            document.getElementById('targetPhoneText').innerText = phone;
            const hint = document.getElementById('devCodeHint');
            if (data.dev_mode) {
                hint.textContent = 'ডেভ মোড (Twilio সেট নেই): আপনার কোড — ' + data.dev_code;
                hint.classList.remove('hidden');
            } else {
                hint.classList.add('hidden');
            }
            document.getElementById('modalStep1').classList.add('hidden');
            document.getElementById('modalStep2').classList.remove('hidden');
        } catch (e) {
            showOtpError('সমস্যা হয়েছে, আবার চেষ্টা করুন।');
        } finally {
            btn.disabled = false;
            btn.textContent = 'OTP পাঠান';
        }
    }

    async function handleVerifyOTP() {
        const phone = document.getElementById('modalPhoneInput').value.trim();
        const otp = document.getElementById('otpInput').value.trim();
        const errorEl = document.getElementById('otpCheckError');
        errorEl.classList.add('hidden');

        if (!otp || otp.length < 4) {
            errorEl.textContent = 'অনুগ্রহ করে ৪ ডিজিটের সঠিক OTP লিখুন';
            errorEl.classList.remove('hidden');
            return;
        }

        const btn = document.getElementById('verifyOtpBtn');
        btn.disabled = true;
        btn.textContent = 'যাচাই হচ্ছে...';

        try {
            const res = await fetch('{{ route('otp.verify') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': lifedropCsrf(),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ phone, otp })
            });

            const data = await res.json();

            if (!data.ok) {
                errorEl.textContent = data.message || 'কোডটি সঠিক নয়।';
                errorEl.classList.remove('hidden');
                return;
            }

            window.location.reload();
        } catch (e) {
            errorEl.textContent = 'সমস্যা হয়েছে, আবার চেষ্টা করুন।';
            errorEl.classList.remove('hidden');
        } finally {
            btn.disabled = false;
            btn.textContent = 'যাচাই সম্পন্ন করুন';
        }
    }

    function backToStep1() {
        document.getElementById('modalStep1').classList.remove('hidden');
        document.getElementById('modalStep2').classList.add('hidden');
        document.getElementById('otpInput').value = '';
        document.getElementById('otpError').classList.add('hidden');
        document.getElementById('otpCheckError').classList.add('hidden');
        document.getElementById('devCodeHint').classList.add('hidden');
    }
</script>
