<footer class="at-footer">
    <div class="at-footer-inner">
        <div class="at-footer-brand">© {{ date('Y') }} Aviator Tutor</div>

        <div class="at-footer-links">
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('faq') }}">FAQ</a>
            <a href="{{ route('contact') }}">Contact</a>
            <a href="{{ url('/terms') }}">Terms</a>
            <a href="{{ url('/privacy') }}">Privacy</a>
        </div>
    </div>
</footer>
