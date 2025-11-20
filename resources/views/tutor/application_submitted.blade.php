@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-white rounded-3xl shadow-sm border border-sky-50 p-8 text-center space-y-4">
        <div class="mx-auto h-12 w-12 rounded-full bg-emerald-50 flex items-center justify-center">
            <svg class="h-6 w-6 text-emerald-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <h1 class="text-xl font-semibold text-gray-900">Application submitted</h1>
        <p class="text-sm text-gray-600">
            Thank you for applying to teach on Aviator Tutor. We will review your information and get back to you by email.
        </p>
        <a href="{{ route('dashboard') ?? '/' }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-full text-sm font-semibold bg-sky-600 text-white hover:bg-sky-700 shadow-sm">
            Back to dashboard
        </a>
    </div>
</div>
@endsection
