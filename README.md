# LifeDrop — রক্তদান বাংলাদেশ

Blood donor search platform for Bangladesh: find donors by blood group and location,
post urgent blood requests, and manage everything from an English admin panel (Tabler UI).

## Features

- **Find Donor** — search approved donors by blood group, division, district, upazila and
  availability (90-day donation cooldown is enforced automatically).
- **Phone-only login (OTP)** — no passwords on the public site. Users verify their phone
  with a 4-digit OTP sent via Twilio (dev fallback shows the code on screen until
  Twilio credentials are configured).
- **Post Blood Requests** — urgency, bags needed, hospital info, needed-by date;
  posters manage their requests in **My Posts** (active / found / closed / delete).
- **Donor registration** — moderation flow: new donors are `pending` until an admin approves.
- **Donation history** — admins record donations; last-donation date, 90-day eligibility
  and total counts update automatically.
- **Blood bank directory** — managed in the admin panel, shown on the home page.
- **Admin panel** (`/admin`, English, Tabler UI) — dashboard stats, donor approvals,
  request management, user block/delete, blood bank CRUD, and Twilio settings.

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run build   # or: php artisan serve + npm run dev
```

Seeded admin account: **admin@lifedrop.com / admin1234** (change the password after first login).

## Twilio phone verification

1. Create a Twilio account, copy your **Account SID** and **Auth Token**.
2. Twilio → **Verify → Services** → create (or use the default) service → copy its **Service SID**.
3. Enter all three in **Admin → Settings** and save (or put them in `.env`).
4. Use the "Send test SMS" button in Settings to verify.

Until Twilio is configured the site runs in **dev mode**: OTP codes are shown directly
in the verification modal instead of being sent by SMS.

## Location data

Divisions, districts and upazilas are stored in the database and seeded by
`LocationSeeder` (8 divisions, 64 districts, 400+ upazilas). The cascading dropdowns
read from this data.

## Routes

| Page | URL |
|------|-----|
| Home | `/` |
| Find donor | `/find-donor` |
| Post request | `/post-request` |
| Become donor | `/become-donor` |
| My posts | `/my-posts` (login required) |
| Admin panel | `/admin` |
