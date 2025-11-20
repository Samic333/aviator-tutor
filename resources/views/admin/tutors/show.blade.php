@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-xs font-semibold text-sky-600 uppercase tracking-wide mb-1">Admin · Review application</p>
            <h1 class="text-2xl font-bold text-gray-900">
                {{ $application->user->name ?? 'Applicant' }}
            </h1>
            <p class="mt-1 text-xs text-gray-500">{{ $application->user->email ?? '' }}</p>
        </div>
        <div>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold
                @if($application->status === 'approved') bg-emerald-50 text-emerald-700 border border-emerald-100
                @elseif($application->status === 'rejected') bg-red-50 text-red-700 border border-red-100
                @else bg-yellow-50 text-yellow-700 border border-yellow-100 @endif">
                Status: {{ ucfirst($application->status) }}
            </span>
        </div>
    </div>

    <div class="grid sm:grid-cols-2 gap-4 bg-white rounded-3xl shadow-sm border border-sky-50 p-6 text-sm">
        <div>
            <h2 class="text-xs font-semibold text-gray-500 mb-2">License</h2>
            <p class="text-gray-800">{{ $application->license_type ?? '-' }}</p>
        </div>
        <div>
            <h2 class="text-xs font-semibold text-gray-500 mb-2">Aircraft & hours</h2>
            <p class="text-gray-800">{{ $application->primary_aircraft ?? '-' }}</p>
            <p class="text-xs text-gray-500">
                Total: {{ $application->total_hours ?? 0 }} h · Instruction: {{ $application->instruction_hours ?? 0 }} h
            </p>
        </div>
        <div>
            <h2 class="text-xs font-semibold text-gray-500 mb-2">Location</h2>
            <p class="text-gray-800">{{ $application->country ?? '-' }}</p>
            <p class="text-xs text-gray-500">{{ $application->timezone ?? '-' }}</p>
        </div>
        <div>
            <h2 class="text-xs font-semibold text-gray-500 mb-2">Submitted</h2>
            <p class="text-gray-800">{{ $application->created_at?->format('Y-m-d H:i') }}</p>
            @if($application->reviewed_at)
                <p class="text-xs text-gray-500">Reviewed: {{ $application->reviewed_at->format('Y-m-d H:i') }}</p>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-sky-50 p-6 text-sm">
        <h2 class="text-xs font-semibold text-gray-500 mb-2">About this tutor</h2>
        <p class="text-gray-800 whitespace-pre-line">
            {{ $application->about }}
        </p>
    </div>

    <form action="{{ route('admin.tutors.approve', $application) }}" method="POST" class="space-y-3 bg-white rounded-3xl shadow-sm border border-emerald-50 p-6">
        @csrf
        <h2 class="text-sm font-semibold text-gray-900 mb-2">Approve application</h2>
        <label class="block text-xs font-semibold text-gray-700 mb-1">Admin notes (optional)</label>
        <textarea name="admin_notes" rows="3" class="w-full rounded-xl border-gray-200 text-sm">{{ old('admin_notes', $application->admin_notes) }}</textarea>
        <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 rounded-full text-sm font-semibold bg-emerald-600 text-white hover:bg-emerald-700 shadow-sm">
            Approve and mark as tutor
        </button>
    </form>

    <form action="{{ route('admin.tutors.reject', $application) }}" method="POST" class="space-y-3 bg-white rounded-3xl shadow-sm border border-red-50 p-6">
        @csrf
        <h2 class="text-sm font-semibold text-gray-900 mb-2">Reject application</h2>
        <label class="block text-xs font-semibold text-gray-700 mb-1">Reason (visible only to admins)</label>
        <textarea name="admin_notes" rows="3" class="w-full rounded-xl border-gray-200 text-sm">{{ old('admin_notes', $application->admin_notes) }}</textarea>
        <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 rounded-full text-sm font-semibold bg-red-600 text-white hover:bg-red-700 shadow-sm">
            Reject application
        </button>
    </form>
</div>
@endsection
