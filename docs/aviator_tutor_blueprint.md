# AviatorTutor – Product Blueprint

## 1. Core concept

AviatorTutor is a marketplace for aviation training:
- Students / crew (cadets, pilots, cabin crew, ATC, engineers) book 1-to-1 or group online sessions.
- Tutors (pilots, TRI/TRE, CC trainers, ATC, engineers, HR) earn money by teaching.
- Admins manage tutors, bookings, payments, and disputes.

## 2. User roles

- Student
- Tutor
- Admin

A user account can be both Student and Tutor.

## 3. Key features (MVP)

### 3.1 Accounts & profiles
- Student profile: name, country, timezone, license/level, goals.
- Tutor profile: photo, bio, aircraft types, aviation roles, experience, languages, hourly rate, intro video, rating.
- Separate “Apply to become tutor” flow with status (pending, approved, rejected).

### 3.2 Tutor onboarding & verification
- Multi-step application form:
  - Personal details
  - Aviation experience (aircraft, roles, hours, companies)
  - Upload documents (license, certificates)
- Admin panel:
  - List of tutor applications by status
  - Detail view with documents
  - Approve / reject with notes

### 3.3 Tutor search & filters
- Browse tutors page with:
  - Filters: aircraft type, lesson category (sim prep, ATPL, CRM/LOFT, cabin crew interview, ATC, maintenance), price range, language, country, rating, availability.
  - Sort by: best match, price, experience, rating.
- Tutor card:
  - Photo, name, role (e.g. A320 TRI), short bio
  - Price per hour, rating, total lessons
  - Next available time in the student’s timezone.

### 3.4 Timezone & scheduling
- Store user timezone.
- Tutor sets weekly availability in their timezone.
- Student sees available slots converted to their timezone.
- Booking rules:
  - Minimum notice (e.g. 12–24 hours before lesson)
  - Cancellation rules and deadlines.
- Basic email reminders before lesson start.

### 3.5 Bookings & payments (Flutterwave first)
- Booking model:
  - student_id, tutor_id, start_time, end_time, price, currency, status (pending, paid, confirmed, completed, cancelled).
- Payment integration (Flutterwave):
  - Accept card payments and M-Pesa/mobile money.
  - Escrow style: full lesson price collected from student and held by platform until lesson completion.
  - Commission: platform keeps a percentage, remainder becomes tutor balance.
- Wallet:
  - Tutor wallet balance
  - Payout requests and payout history

### 3.6 Video sessions
- MVP: each confirmed booking has a “lesson_link” field.
- Tutor can paste Zoom / Google Meet / Teams URL.
- Student and tutor see a “Join session” button on the booking page and in reminder emails.
- Later phase: integrate Zoom Video SDK for in-app video.

### 3.7 Messaging / chat
- Internal messaging between student and tutor.
- Conversations linked to bookings.
- Pre-booking chat: student can ask questions before booking.
- Anti-leak measures: optionally detect obvious emails/phone numbers to discourage taking lessons off-platform.

### 3.8 Reviews & ratings
- After lesson completion, student can:
  - Rate (1–5 stars)
  - Leave a short review.
- Show aggregated rating and review count on tutor card and profile.
- Admin can remove inappropriate reviews.

### 3.9 Admin dashboard
- Overview:
  - New tutor applications
  - New users, active tutors
  - Bookings and revenue stats
- Users:
  - List/filter students and tutors
  - View profiles
  - Ban/unban
- Tutor applications:
  - Approve/reject with reasons.
- Bookings:
  - Search by date, tutor, student, status
  - Force cancel with manual refund / payout logic.
- Payments:
  - List of incoming payments (from Flutterwave)
  - List of payouts to tutors
  - Export to CSV.

## 4. Future features (post-MVP)

- Group classes with multiple students per session.
- Corporate / academy accounts (ATO or airline pays for crew lessons).
- Referral program (invite friends, earn credit).
- Blog and SEO content.
- Deeper calendar integrations (Google/Outlook).
- In-app video via Zoom Video SDK or another provider.
- Mobile apps.

## 5. Implementation phases

- Phase 1: Public pages, navigation, and aviation-themed homepage (Italki-style layout).
- Phase 2: Authentication, student profiles, tutor application flow, basic admin panel.
- Phase 3: Tutor listing, search & filtering, tutor profile pages, availability.
- Phase 4: Booking flow and Flutterwave payments (card + M-Pesa).
- Phase 5: Messaging, reviews, tutor wallet & payouts, lesson link integration and reminders.
- Phase 6: Group classes, corporate/academy features, mobile apps, advanced analytics.
