"<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tutors | Aviator Tutor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style> … </style>
</head>
<body>
<header>
    <h1>Find an Aviation Tutor</h1>
    <p>Browse working pilots…</p>
    <div class="filters">
        <input type="text" placeholder="Search name or keyword">
        <select>…</select>
        <select>…</select>
        <select>…</select>
    </div>
</header>

<div class="grid">
    @forelse ($tutors as $tutor)
        <article class="card">
            <span class="role-pill">{{ $tutor->role }}</span>
            <h3>{{ $tutor->name }}</h3>
            <p>{{ $tutor->headline }}</p>
            <div class="subjects">
                @foreach (array_slice((array) $tutor->subjects, 0, 3) as $subject)
                    <span>{{ $subject }}</span>
                @endforeach
            </div>
            <p class="rate">${{ number_format($tutor->hourly_rate, 2) }} / hr</p>
            <a class="btn" href="{{ route('tutors.show', $tutor->id) }}">View Profile</a>
        </article>
    @empty
        <div class="empty">No tutors found yet.</div>
    @endforelse
</div>

</body>
</html>
"
