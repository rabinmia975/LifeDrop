<?php

namespace Database\Seeders;

use App\Models\BloodRequest;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoContentSeeder extends Seeder
{
    /**
     * Sample donors and requests so a fresh install is not empty.
     * Phone numbers are clearly fake (01700xxxxxx) — replace via admin panel.
     */
    public function run(): void
    {
        $donors = [
            ['name' => 'তানভীর আহমেদ', 'phone' => '01700111111', 'blood_group' => 'O+', 'age' => 28, 'gender' => 'পুরুষ', 'division' => 'ঢাকা', 'district' => 'ঢাকা', 'upazila' => 'মিরপুর', 'area' => 'পল্লবী', 'last_donation_date' => '2026-06-15', 'is_available' => true, 'status' => 'approved', 'total_donations' => 3],
            ['name' => 'সাবরিনা সুলতানা', 'phone' => '01700222222', 'blood_group' => 'A+', 'age' => 25, 'gender' => 'নারী', 'division' => 'ঢাকা', 'district' => 'ঢাকা', 'upazila' => 'ধানমন্ডি', 'last_donation_date' => '2026-07-20', 'is_available' => true, 'status' => 'approved', 'total_donations' => 2],
            ['name' => 'মাহমুদুল হক', 'phone' => '01700333333', 'blood_group' => 'O+', 'age' => 32, 'gender' => 'পুরুষ', 'division' => 'ঢাকা', 'district' => 'গাজীপুর', 'upazila' => 'গাজীপুর সদর', 'last_donation_date' => null, 'is_available' => true, 'status' => 'approved', 'total_donations' => 5],
            ['name' => 'রাফসান জামান', 'phone' => '01700444444', 'blood_group' => 'A+', 'age' => 24, 'gender' => 'পুরুষ', 'division' => 'চট্টগ্রাম', 'district' => 'চট্টগ্রাম', 'upazila' => 'পটিয়া', 'last_donation_date' => '2026-09-01', 'is_available' => true, 'status' => 'approved', 'total_donations' => 1],
            ['name' => 'নুসরাত জাহান', 'phone' => '01700555555', 'blood_group' => 'B+', 'age' => 27, 'gender' => 'নারী', 'division' => 'ঢাকা', 'district' => 'ঢাকা', 'upazila' => 'উত্তরা', 'last_donation_date' => null, 'is_available' => true, 'status' => 'approved', 'total_donations' => 0],
            ['name' => 'ইমরান খান', 'phone' => '01700666666', 'blood_group' => 'AB+', 'age' => 30, 'gender' => 'পুরুষ', 'division' => 'সিলেট', 'district' => 'সিলেট', 'upazila' => 'সিলেট সদর', 'last_donation_date' => '2026-05-10', 'is_available' => true, 'status' => 'approved', 'total_donations' => 4],
            ['name' => 'ফারহানা ইয়াসমিন', 'phone' => '01700777777', 'blood_group' => 'O-', 'age' => 26, 'gender' => 'নারী', 'division' => 'রাজশাহী', 'district' => 'রাজশাহী', 'upazila' => 'রাজশাহী সদর', 'last_donation_date' => null, 'is_available' => true, 'status' => 'approved', 'total_donations' => 2],
            ['name' => 'কামরুল হাসান', 'phone' => '01700888888', 'blood_group' => 'B-', 'age' => 35, 'gender' => 'পুরুষ', 'division' => 'খুলনা', 'district' => 'খুলনা', 'upazila' => 'খুলনা সদর', 'last_donation_date' => '2026-08-28', 'is_available' => true, 'status' => 'pending', 'total_donations' => 1],
        ];

        foreach ($donors as $donor) {
            Donor::firstOrCreate(['phone' => $donor['phone']], $donor);
        }

        $requests = [
            ['patient_name' => 'আব্দুল করিম', 'patient_age' => 55, 'patient_gender' => 'পুরুষ', 'blood_group' => 'B-', 'bags_needed' => 3, 'needed_by' => now()->addDays(2)->toDateString(), 'urgency' => 'জরুরি', 'hospital_name' => 'ঢাকা মেডিকেল কলেজ হাসপাতাল', 'hospital_address' => 'ঢাকা', 'division' => 'ঢাকা', 'district' => 'ঢাকা', 'upazila' => 'পল্লবী', 'contact_phone' => '01700123456', 'description' => 'হার্ট সার্জারির জন্য B- রক্ত দরকার।', 'status' => 'active'],
            ['patient_name' => 'ফাতেমা বেগম', 'patient_age' => 40, 'patient_gender' => 'নারী', 'blood_group' => 'O+', 'bags_needed' => 2, 'needed_by' => now()->addDays(5)->toDateString(), 'urgency' => 'সাধারণ', 'hospital_name' => 'শেখ হাসিনা মেডিকেল কলেজ হাসপাতাল', 'hospital_address' => 'টাঙ্গাইল', 'division' => 'ঢাকা', 'district' => 'টাঙ্গাইল', 'upazila' => 'টাঙ্গাইল সদর', 'contact_phone' => '01700654321', 'description' => 'কিডনি রোগীর জন্য রক্ত দরকার।', 'status' => 'active'],
            ['patient_name' => 'সালমা আক্তার', 'patient_age' => 28, 'patient_gender' => 'নারী', 'blood_group' => 'A+', 'bags_needed' => 1, 'needed_by' => now()->addDay()->toDateString(), 'urgency' => 'জরুরি', 'hospital_name' => 'চট্টগ্রাম মেডিকেল কলেজ হাসপাতাল', 'hospital_address' => 'চট্টগ্রাম', 'division' => 'চট্টগ্রাম', 'district' => 'চট্টগ্রাম', 'upazila' => 'চট্টগ্রাম সদর', 'contact_phone' => '01700987654', 'description' => 'প্রসবের সময় A+ রক্ত দরকার।', 'status' => 'active'],
        ];

        foreach ($requests as $request) {
            BloodRequest::firstOrCreate(
                ['contact_phone' => $request['contact_phone'], 'hospital_name' => $request['hospital_name']],
                $request
            );
        }
    }
}
