<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peripheral Tech Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            color-scheme: dark;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            --bg: #dfe8ff;
            --surface: #111827;
            --surface-strong: #1f2937;
            --text: #e2e8f0;
            --muted: #94a3b8;
            --accent: #22d3ee;
            --accent-dark: #0e7490;
            --border: rgba(148, 163, 184, 0.18);
        }

        body {
            /* background: linear-gradient(180deg, #050a1a 0%, #071023 100%); */
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        .navbar {
            background: rgba(15, 23, 42, 0.96);
            backdrop-filter: blur(18px);
            position: sticky;
            top: 0;
            z-index: 1040;
        }

        .secondary-nav {
            position: sticky;
            top: 72px;
            z-index: 1030;
            background: rgba(15, 23, 42, 0.94);
            border-bottom: 1px solid rgba(148, 163, 184, 0.16);
            backdrop-filter: blur(18px);
        }

        .secondary-nav .nav-link {
            color: var(--muted) !important;
            font-size: 0.95rem;
        }

        .secondary-nav .nav-link:hover,
        .secondary-nav .nav-link.active {
            color: #ffffff !important;
        }

        .navbar {
            background: rgba(15, 23, 42, 0.96);
            backdrop-filter: blur(18px);
        }

        .nav-link {
            color: var(--muted) !important;
        }

        .nav-link:hover,
        .navbar-brand,
        .navbar-nav .nav-link.active {
            color: #ffffff !important;
        }

        .hero-gradient {
            background: radial-gradient(circle at top right, rgba(34, 211, 238, 0.18), transparent 28%),
                        radial-gradient(circle at bottom left, rgba(59, 130, 246, 0.15), transparent 30%),
                        linear-gradient(180deg, rgba(15,23,42,0.96) 0%, rgba(15,23,42,0.98) 100%);
            border: 1px solid var(--border);
        }

        .card-surface {
            background: rgba(15, 23, 42, 0.95);
            border: 1px solid rgba(148, 163, 184, 0.16);
            color: var(--text);
        }

        .card-surface .card-title {
            color: #ffffff;
        }

        .badge-soft {
            background: rgba(34, 211, 238, 0.16);
            color: #c7f0ff;
        }

        .btn-accent {
            background: #22d3ee;
            color: #0f172a;
            border: none;
        }

        .btn-accent:hover {
            background: #38bdf8;
            color: #0f172a;
        }

        .text-accent {
            color: #22d3ee !important;
        }

        .bg-slate-900 {
            background: #0f172a !important;
        }

        .product-pill {
            background: rgba(148, 163, 184, 0.14);
            color: #cbd5e1;
            border: 1px solid rgba(148, 163, 184, 0.2);
        }

        .footer-note {
            color: var(--muted);
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
                    <li class="nav-item">
                        <a class="btn btn-accent px-4" href="{{ route('home') }}">Shop Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="secondary-nav px-4 py-2 mb-4">
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
</body>
</html>