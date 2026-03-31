<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peripheral Tech Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            color-scheme: light;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            --bg: #eff6ff;
            --surface: #ffffff;
            --surface-strong: #f8fafc;
            --text: #0f172a;
            --muted: #475569;
            --accent: #6366f1;
            --accent-dark: #4f46e5;
            --accent-alt: #10b981;
            --border: rgba(148, 163, 184, 0.24);
        }

        body {
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(18px);
            box-shadow: 0 1px 20px rgba(148, 163, 184, 0.12);
            position: sticky;
            top: 0;
            z-index: 1040;
        }

        .secondary-nav {
            position: sticky;
            top: 72px;
            z-index: 1030;
            background: #4f46e5;
            border-bottom: 1px solid rgba(99, 102, 241, 0.15);
            backdrop-filter: blur(18px);
        }

        .secondary-nav .nav-link {
            color: var(--bg) !important;
            font-size: 0.95rem;
        }

        .secondary-nav .nav-link:hover,
        .secondary-nav .nav-link.active {
            color: var(--text) !important;
        }

        .nav-link {
            color: var(--text) !important;
        }

        .nav-link:hover,
        .navbar-brand,
        .navbar-nav .nav-link.active {
            color: var(--accent-dark) !important;
        }

        .hero-gradient {
            background: radial-gradient(circle at top right, rgba(99, 102, 241, 0.16), transparent 28%),
                        radial-gradient(circle at bottom left, rgba(16, 185, 129, 0.14), transparent 30%),
                        linear-gradient(180deg, rgba(248, 250, 252, 1) 0%, rgba(226, 232, 255, 1) 100%);
            border: 1px solid var(--border);
        }

        .card-surface {
            background: var(--surface);
            border: 1px solid rgba(148, 163, 184, 0.22);
            color: var(--text);
        }

        .card-surface .card-title {
            color: var(--text);
        }

        .badge-soft {
            background: rgba(99, 102, 241, 0.12);
            color: #4338ca;
        }

        .btn-accent {
            background: var(--accent);
            color: #ffffff;
            border: none;
        }

        .btn-accent:hover {
            background: var(--accent-dark);
            color: #ffffff;
        }

        .text-accent {
            color: var(--accent) !important;
        }

        .bg-slate-900 {
            background: #eef2ff !important;
            color: var(--text) !important;
        }

        .product-pill {
            background: rgba(16, 185, 129, 0.12);
            color: #065f46;
            border: 1px solid rgba(16, 185, 129, 0.18);
        }

        .footer-note {
            color: #64748b;
        }

        .site-footer {
            background: rgba(15, 23, 42, 0.95);
            border-top: 1px solid rgba(148, 163, 184, 0.16);
            color: #cbd5e1;
        }

        .site-footer a {
            color: #94a3b8;
            text-decoration: none;
        }

        .site-footer a:hover {
            color: #ffffff;
        }

        .site-footer .footer-heading {
            color: #ffffff;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark px-4 py-3 mb-0">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Peripheral Tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#categories">Categories</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#features">Why choose us</a>
                    </li>
                    @if(Auth::check())
                        <div class="dropdown">
                            <a class="btn btn-outline-dark dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('home') }}">My Account</a></li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </ul>
                        </div>
                    @else
                        <li class="nav-item me-3">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="secondary-nav px-4 py-2 mb-4 shadow-sm">
        <div class="container-fluid d-flex flex-wrap align-items-center gap-2">
            <div class="dropdown">
                <a class="btn btn-sm btn-outline-light dropdown-toggle" href="#" role="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    All Categories
                </a>
                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                    @foreach($layoutCategories as $category)
                        <li><a class="dropdown-item" href="{{ route('category_products_list', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            @foreach($layoutCategories as $category)
                <a href="{{ route('category_products_list', ['category' => $category->id]) }}" class="nav-link px-3 py-2 rounded-pill">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>

    <div class="container-fluid px-4">
        @yield('content')
    </div>

    <footer class="site-footer py-5 mt-5">
        <div class="container-fluid px-4">
            <div class="row gy-4">
                <div class="col-md-4">
                    <h5 class="footer-heading">Peripheral Tech</h5>
                    <p class="footer-note">A modern shop for premium PC peripherals — keyboards, mice, headsets, and desk accessories built for performance.</p>
                </div>
                <div class="col-md-2">
                    <h6 class="footer-heading">Shop</h6>
                    <ul class="list-unstyled footer-note mb-0">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="#categories">Categories</a></li>
                        <li><a href="#features">Why choose us</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="footer-heading">Categories</h6>
                    <ul class="list-unstyled footer-note mb-0">
                        @foreach($layoutCategories->take(5) as $category)
                            <li><a href="{{ route('category_products_list', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="footer-heading">Contact</h6>
                    <p class="footer-note mb-1">support@peripheraltech.dev</p>
                    <p class="footer-note">Follow us for updates and new arrivals.</p>
                </div>
            </div>
            <div class="border-top border-secondary mt-4 pt-3 text-text small d-flex flex-column flex-md-row justify-content-between">
                <span>© {{ date('Y') }} Peripheral Tech</span>
                <span>Designed for premium PC builds</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>