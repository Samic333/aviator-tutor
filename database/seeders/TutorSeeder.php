<?php

namespace Database\Seeders;

use App\Models\Tutor;
use Illuminate\Database\Seeder;

class TutorSeeder extends Seeder
{
    public function run(): void
    {
        // Clear old data (dev only)
        //Tutor::truncate();

        Tutor::create([
            'name'             => 'Capt. Samuel Woldegiorgis',
            'role'             => 'pilot',
            'headline'         => 'Q400 Captain | Interview & Simulator Prep',
            'bio'              => 'Airline Captain with experience in regional operations, specializing in Q400 systems, SOP flows, and airline assessment preparation.',
            'country'          => 'Kenya',
            'timezone'         => 'Africa/Nairobi',
            'hourly_rate'      => 60,
            'currency'         => 'USD',
            'aircraft_types'   => ['Q400', 'DHC-8', 'Caravan'],
            'subjects'         => ['Q400 Systems', 'Airline Interview Prep', 'CRM & SOP'],
            'years_experience' => 10,
            'is_verified'      => true,
            'rating'           => 4.9,
            'total_reviews'    => 34,
        ]);

        Tutor::create([
            'name'             => 'First Officer Amina Hassan',
            'role'             => 'pilot',
            'headline'         => 'B737NG FO | ATPL & Simulator Coaching',
            'bio'              => 'B737NG First Officer helping cadets pass type ratings, ATPL theory, and airline sim checks.',
            'country'          => 'UAE',
            'timezone'         => 'Asia/Dubai',
            'hourly_rate'      => 55,
            'currency'         => 'USD',
            'aircraft_types'   => ['B737NG'],
            'subjects'         => ['ATPL Theory', 'Simulator Prep', 'MCC'],
            'years_experience' => 6,
            'is_verified'      => true,
            'rating'           => 4.8,
            'total_reviews'    => 21,
        ]);

        Tutor::create([
            'name'             => 'Senior Cabin Crew Selam T.',
            'role'             => 'cabin_crew',
            'headline'         => 'Cabin Crew Trainer | Interview & Safety Procedures',
            'bio'              => 'Senior cabin crew and trainer focusing on safety drills, service standards, and airline interview preparation.',
            'country'          => 'Ethiopia',
            'timezone'         => 'Africa/Addis_Ababa',
            'hourly_rate'      => 30,
            'currency'         => 'USD',
            'aircraft_types'   => ['A320', 'B737'],
            'subjects'         => ['Cabin Crew Interview', 'Emergency Procedures', 'Service Standards'],
            'years_experience' => 8,
            'is_verified'      => true,
            'rating'           => 4.7,
            'total_reviews'    => 18,
        ]);
    }
}
