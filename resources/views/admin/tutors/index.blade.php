@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-6">
        <p class="text-xs font-semibold text-sky-600 uppercase tracking-wide mb-1">Admin</p>
        <h1 class="text-2xl font-bold text-gray-900">Tutor applications</h1>
        <p class="mt-2 text-sm text-gray-500">Review and approve aviation professionals who want to teach.</p>
    </div>

    @if(session('status'))
        <div class="mb-4 rounded-xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border border-sky-50 overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-sky-50 text-xs font-semibold text-gray-600 uppercase tracking-wide">
                <tr>
                    <th class="px-4 py-3 text-left">Applicant</th>
                    <th class="px-4 py-3 text-left">License</th>
                    <th class="px-4 py-3 text-left">Aircraft</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Submitted</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($applications as $application)
                    <tr>
                        <td class="px-4 py-3">
                            <div class="font-semibold text-gray-900">{{ $application->user->name ?? 'Unknown' }}</div>
                            <div class="text-xs text-gray-500">{{ $application->user->email ?? '' }}</div>
                        </td>
                        <td class="px-4 py-3 text-xs text-gray-700">
                            {{ $application->license_type ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-xs text-gray-700">
                            {{ $application->primary_aircraft ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold
                                @if($application->status === 'approved') bg-emerald-50 text-emerald-700 border border-emerald-100
                                @elseif($application->status === 'rejected') bg-red-50 text-red-700 border border-red-100
                                @else bg-yellow-50 text-yellow-700 border border-yellow-100 @endif">
                                {{ ucfirst($application->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-xs text-gray-500">
                            {{ $application->created_at?->format('Y-m-d H:i') }}
                        </td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.tutors.show', $application) }}" class="text-xs font-semibold text-sky-600 hover:text-sky-800">
                                Review
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-sm text-gray-500">
                            No tutor applications yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $applications->links() }}
    </div>
</div>
@endsection
