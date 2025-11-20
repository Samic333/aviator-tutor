<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tutor Bookings</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f1f5f9; margin: 0; padding: 2rem; color: #0f172a; }
        .card { max-width: 980px; margin: 0 auto; background: #fff; border-radius: 16px; padding: 2rem; box-shadow: 0 10px 35px rgba(15, 23, 42, 0.08); }
        table { width: 100%; border-collapse: collapse; margin-top: 1.5rem; }
        th, td { padding: 0.85rem; border-bottom: 1px solid #e2e8f0; text-align: left; }
        th { font-size: 0.75rem; letter-spacing: 0.08em; color: #64748b; text-transform: uppercase; }
        .actions { display: flex; gap: 0.5rem; }
        button { border: none; padding: 0.55rem 1rem; border-radius: 6px; cursor: pointer; color: #fff; font-weight: 600; }
        .btn-accept { background: #16a34a; }
        .btn-reject { background: #dc2626; }
        .status { text-transform: capitalize; font-weight: 600; }
        .empty { text-align: center; padding: 2rem; color: #94a3b8; }
    </style>
</head>
<body>
@include('partials.nav')
<div class="card">
    <h1>Incoming Booking Requests</h1>

    @if (session('status'))
        <div style="background:#ecfdf5;border:1px solid #a7f3d0;color:#065f46;padding:0.85rem 1rem;border-radius:8px;">
            {{ session('status') }}
        </div>
    @endif

    <table>
        <thead>
        <tr>
            <th>Student</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th style="width: 160px;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($bookings as $booking)
            <tr>
                <td>{{ optional($booking->student)->name ?? 'Student removed' }}</td>
                <td>{{ optional($booking->requested_date)->format('M j, Y') ?? $booking->requested_date }}</td>
                <td>{{ $booking->requested_time ?? '—' }}</td>
                <td class="status">{{ $booking->status }}</td>
                <td>
                    @if ($booking->status === 'pending')
                        <div class="actions">
                            <form method="POST" action="{{ route('bookings.accept', $booking) }}">
                                @csrf
                                <button type="submit" class="btn-accept">Accept</button>
                            </form>
                            <form method="POST" action="{{ route('bookings.reject', $booking) }}">
                                @csrf
                                <button type="submit" class="btn-reject">Reject</button>
                            </form>
                        </div>
                    @else
                        <span class="status">{{ ucfirst($booking->status) }}</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="empty">No booking requests yet.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $bookings->links() }}
</div>
</body>
</html>
