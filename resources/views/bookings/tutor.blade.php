<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bookings for my students | Aviator Tutor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        :root {
            --bg: #f5f6fb;
            --panel: #ffffff;
            --border: #e5e7eb;
            --text: #0f172a;
            --muted: #6b7280;
        }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: "Inter", system-ui, sans-serif; background: var(--bg); color: var(--text); }
        main { max-width: 1100px; margin: 0 auto; padding: 40px clamp(16px, 6vw, 80px) 80px; }
        h1 { margin-top: 0; }
        .card {
            background: var(--panel);
            border-radius: 24px;
            border: 1px solid var(--border);
            padding: 28px;
            box-shadow: 0 20px 45px rgba(15,23,42,0.05);
        }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { text-align: left; padding: 12px 10px; border-bottom: 1px solid var(--border); }
        th {
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
            color: var(--muted);
        }
        .empty { padding: 40px; text-align: center; color: var(--muted); }
    </style>
</head>
<body>
@include('partials.nav')
<main>
    <div class="card">
        <h1>Bookings for my students</h1>
        @if ($bookings->isEmpty())
            <div class="empty">No one has booked you yet. Once students request sessions, they’ll appear here.</div>
        @else
            <table>
                <thead>
                <tr>
                    <th>Student</th>
                    <th>Tutor</th>
                    <th>Scheduled</th>
                    <th>Status</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ optional($booking->student)->name ?? 'Student removed' }}</td>
                        <td>{{ optional($booking->tutor)->name ?? 'Tutor removed' }}</td>
                        <td>{{ optional($booking->scheduled_at)->format('M j, Y g:i A') ?? 'TBD' }}</td>
                        <td>{{ ucfirst($booking->status) }}</td>
                        <td>${{ number_format($booking->price_usd, 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</main>
</body>
</html>
