<?php

namespace Database\Seeders;

use App\Models\BloodBank;
use Illuminate\Database\Seeder;

class BloodBankSeeder extends Seeder
{
    public function run(): void
    {
        $banks = [
            ['name' => 'বাংলাদেশ রেড ক্রিসেন্ট সোসাইটি', 'phone' => '01711-000000', 'address' => 'ঢাকা', 'division' => 'ঢাকা', 'district' => 'ঢাকা'],
            ['name' => 'সন্ধানী জাতীয় স্বেচ্ছাসেবী সংস্থা', 'phone' => '01711-111111', 'address' => 'ঢাকা মেডিকেল কলেজ, ঢাকা', 'division' => 'ঢাকা', 'district' => 'ঢাকা'],
            ['name' => 'বাঁধন (স্বেচ্ছাসেবী রক্তদাতা সংস্থা)', 'phone' => '01711-222222', 'address' => 'ঢাকা', 'division' => 'ঢাকা', 'district' => 'ঢাকা'],
            ['name' => 'কোয়ান্টাম ফাউন্ডেশন', 'phone' => '01711-333333', 'address' => 'গুলশান, ঢাকা', 'division' => 'ঢাকা', 'district' => 'ঢাকা'],
            ['name' => 'ঢাকা মেডিকেল কলেজ ব্লাড ব্যাংক', 'phone' => '01711-444444', 'address' => 'ঢাকা মেডিকেল কলেজ হাসপাতাল, ঢাকা', 'division' => 'ঢাকা', 'district' => 'ঢাকা'],
            ['name' => 'সরকারি ব্লাড ট্রান্সফিউশন সেন্টার', 'phone' => '01711-555555', 'address' => 'ঢাকা', 'division' => 'ঢাকা', 'district' => 'ঢাকা'],
            ['name' => 'চট্টগ্রাম মেডিকেল কলেজ ব্লাড ব্যাংক', 'phone' => '01711-666666', 'address' => 'চট্টগ্রাম', 'division' => 'চট্টগ্রাম', 'district' => 'চট্টগ্রাম'],
            ['name' => 'রাজশাহী মেডিকেল কলেজ ব্লাড ব্যাংক', 'phone' => '01711-777777', 'address' => 'রাজশাহী', 'division' => 'রাজশাহী', 'district' => 'রাজশাহী'],
        ];

        foreach ($banks as $bank) {
            BloodBank::firstOrCreate(['name' => $bank['name']], $bank);
        }
    }
}
