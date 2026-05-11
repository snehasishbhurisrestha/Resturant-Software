<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap 5 (grid & utilities) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lucide icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Font: Inter (premium) + Playfair accent -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300..800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        /* refined colour system – soft eye‑comfort background */
        :root {
            --primary: #1F2A44;
            --primary-hover: #273457;
            --accent: #4F46E5;
            --accent-soft: #EEF2FF;
            --bg-soft: #F2F5F9;        /* soft, warm, eye‑cache base (instead of pure white) */
            --card-bg: rgba(255, 255, 255, 0.7);
            --glass-edge: rgba(255,255,255,0.6);
            --border-subtle: rgba(216, 226, 239, 0.6);
            --text-main: #0F172A;
            --text-muted: #54657E;      /* slightly deeper for comfort */
            --success: #16A34A;
            --warning: #F59E0B;
            --danger: #DC2626;
        }

        body {
            font-family: "Inter", system-ui, -apple-system, sans-serif;
            background-color: var(--bg-soft);  /* soft unified background */
            color: var(--text-main);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        /* glassmorphism refined – overlays on soft bg */
        .glass-nav, .glass-card, .glass-device, .programme-glass, .phone-glass-mock {
            backdrop-filter: blur(16px) saturate(200%);
            -webkit-backdrop-filter: blur(16px) saturate(200%);
            background: rgba(255, 255, 255, 0.55);  /* translucent, lets soft bg through */
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-bottom: 1px solid rgba(229,231,235,0.3);
            box-shadow: 0 20px 40px -22px rgba(31,42,68,0.1), 0 8px 16px -12px rgba(0,0,0,0.02);
        }

        /* navbar specific */
        .navbar {
            background: rgba(242, 245, 249, 0.7) !important;  /* matches body bg + transparency */
            backdrop-filter: blur(20px) saturate(200%);
            border-bottom: 1px solid rgba(255,255,255,0.5);
            box-shadow: 0 8px 20px -14px rgba(31,42,68,0.08);
            padding: 0.7rem 1.2rem;
        }

        .navbar-brand {
            font-weight: 750;
            font-size: 1.7rem;
            background: linear-gradient(145deg, #1F2A44 20%, #4F46E5 90%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.02em;
        }

        .nav-link {
            color: var(--text-main) !important;
            font-weight: 500;
            padding: 0.55rem 1.2rem !important;
            border-radius: 40px;
            transition: 0.2s;
        }
        .nav-link:hover {
            background: rgba(79,70,229,0.08);
            backdrop-filter: blur(4px);
        }

        /* LOGIN BUTTON – perfect alignment */
        .btn-login-glass {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(229,231,235,0.7);
            border-radius: 40px;
            padding: 0.5rem 2rem;
            font-weight: 500;
            color: var(--primary);
            line-height: 1.4;           /* ensures vertical centering */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            box-shadow: 0 6px 12px -10px var(--accent);
            height: 44px;                /* fixed height for perfect centering */
        }
        .btn-login-glass:hover {
            background: white;
            border-color: var(--accent);
            transform: scale(1.02);
        }

        /* primary CTA button – perfect alignment */
        .btn-accent-glass {
            background: linear-gradient(115deg, #4F46E5, #6366f1);
            border: none;
            color: white;
            height: 52px;
            padding: 0 2.4rem;
            border-radius: 50px;
            font-weight: 500;
            letter-spacing: 0.2px;
            box-shadow: 0 20px 30px -18px #4F46E5, 0 6px 14px -8px rgba(79,70,229,0.4);
            backdrop-filter: blur(4px);
            transition: 0.25s ease;
            border: 1px solid rgba(255,255,255,0.3);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }
        .btn-accent-glass:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 28px 36px -18px #4F46E5;
        }

        .btn-outline-glass {
            background: rgba(255,255,255,0.5);
            backdrop-filter: blur(10px);
            border: 1.5px solid rgba(229,231,235,0.8);
            color: var(--text-main);
            height: 52px;
            padding: 0 2.2rem;
            border-radius: 50px;
            font-weight: 500;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }
        .btn-outline-glass:hover {
            background: white;
            border-color: var(--accent);
        }

        /* hero glass device */
        .glass-device {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(20px);
            border-radius: 44px;
            border: 1px solid rgba(255,255,255,0.9);
            box-shadow: 0 60px 70px -45px rgba(31,42,68,0.2);
            padding: 1.5rem 1.2rem;
        }

        .glass-stat {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(6px);
            border-radius: 28px;
            border: 1px solid rgba(255,255,255,0.7);
            padding: 1rem 1.2rem;
        }

        /* feature cards – translucent, soft */
        .feature-card-advanced {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(16px) saturate(200%);
            border: 1px solid rgba(255,255,255,0.8);
            border-radius: 32px;
            padding: 2rem 1.5rem;
            transition: 0.3s cubic-bezier(0.2,0,0,1);
            box-shadow: 0 20px 30px -20px rgba(31,42,68,0.08);
        }
        .feature-card-advanced:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.75);
            border-color: white;
            box-shadow: 0 35px 50px -30px #4F46E5;
        }

        .icon-gloss {
            background: linear-gradient(135deg, #EEF2FF, rgba(255,255,255,0.9));
            backdrop-filter: blur(4px);
            width: 60px;
            height: 60px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
            border: 1px solid rgba(255,255,255,0.8);
            margin-bottom: 1.6rem;
        }

        /* programme cards */
        .programme-glass {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(14px);
            border-radius: 30px;
            border: 1px solid rgba(255,255,255,0.8);
            padding: 2rem 1.8rem;
            transition: 0.3s;
        }
        .programme-glass:hover {
            background: rgba(255, 255, 255, 0.7);
            border-color: white;
            box-shadow: 0 30px 45px -25px var(--accent);
        }

        .badge-glass {
            background: rgba(79,70,229,0.15);
            backdrop-filter: blur(4px);
            color: var(--accent);
            font-weight: 600;
            padding: 0.35rem 1.2rem;
            border-radius: 40px;
            border: 1px solid rgba(255,255,255,0.6);
            font-size: 0.75rem;
            display: inline-block;
        }

        /* mobile preview */
        .phone-glass-mock {
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(30px);
            border-radius: 50px;
            border: 1px solid rgba(255,255,255,0.8);
            box-shadow: 0 60px 70px -45px #1F2A44;
            padding: 1.8rem 1rem 2rem 1rem;
            max-width: 280px;
        }
        .glass-notch {
            width: 100px;
            height: 22px;
            background: rgba(31,42,68,0.3);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            margin: -2.5rem auto 1.5rem auto;
            border: 1px solid rgba(255,255,255,0.7);
        }
        .mock-row-glass {
            background: rgba(255,255,255,0.4);
            backdrop-filter: blur(8px);
            border-radius: 24px;
            padding: 0.9rem 1.2rem;
            margin-bottom: 0.9rem;
            border: 1px solid rgba(255,255,255,0.7);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        /* CTA deep but softer */
        .cta-deep {
            background: radial-gradient(85% 85% at 30% 30%, #4F46E5 0%, #1F2A44 130%);
            border-radius: 60px;
            padding: 4rem 2rem;
            border: 1px solid rgba(255,255,255,0.3);
            backdrop-filter: blur(4px);
        }

        .footer-glass {
            background: rgba(242, 245, 249, 0.7);
            backdrop-filter: blur(8px);
            border-top: 1px solid rgba(255,255,255,0.6);
        }
        .footer-link-g {
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 450;
            transition: 0.2s;
            padding: 0.25rem 0;
        }
        .footer-link-g:hover {
            color: var(--primary);
            border-bottom: 1px solid var(--accent);
        }

        /* typography */
        .display-3 {
            font-size: calc(2.2rem + 1.5vw);
            font-weight: 700;
            letter-spacing: -0.03em;
            line-height: 1.1;
            background: linear-gradient(140deg, #0F172A 30%, #1F2A44 80%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .subhead-premium {
            font-size: 1.3rem;
            color: var(--text-muted);
            font-weight: 350;
        }

        /* mobile button stacking – keep perfect alignment */
        @media (max-width: 576px) {
            .btn-accent-glass, .btn-outline-glass {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<!-- glass navigation -->
<nav class="navbar navbar-expand-lg sticky-top px-3 px-lg-5">
    <div class="container-fluid px-0">
        {{-- <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}<span style="background:linear-gradient(130deg,#4F46E5,#4F46E5); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">.</span></a> --}}
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/admin/images/logo/1.png') }}" alt="Momentum Club" height="36" style="max-height: 44px; width: auto; display: block;">
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarRefined">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarRefined">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="#programms">Programmes</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                {{-- <li class="nav-item d-lg-none"><a class="nav-link" href="{{ route('login') }}">Login</a></li> --}}
            </ul>
            <div class="d-flex">
                <a href="{{ route('login') }}" class="btn btn-login-glass">Login</a>
            </div>
        </div>
    </div>
</nav>

<main>
    <!-- HERO – button text perfectly centered -->
    <section class="container pt-5 pb-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge-glass mb-4">⚡ next‑gen sports hub</span>
                <h1 class="display-3 fw-semibold mb-4">Smarter Sports<br>Club Management</h1>
                <p class="subhead-premium mb-5">Manage programmes, track player progress, and organize training sessions — all in one simple, elegant platform.</p>
                <div class="d-flex flex-column flex-sm-row gap-3">
                    <a href="{{ route('login') }}" class="btn btn-accent-glass">Login to Dashboard</a>
                    <a href="javascript:void(0)" class="btn btn-outline-glass">Learn More</a>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- glass mockup (soft) -->
                <div class="glass-device">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="fw-semibold fs-6" style="color:#1F2A44;">today · momentum</span>
                        <span class="badge" style="background:rgba(79,70,229,0.2); backdrop-filter:blur(4px); color:#4F46E5; border:1px solid rgba(255,255,255,0.6);">LIVE</span>
                    </div>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="glass-stat d-flex flex-column">
                                <i data-lucide="users" width="22" height="22" color="#1F2A44"></i>
                                <div class="fw-bold fs-3 mt-1">24</div>
                                <div class="small text-muted">players</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="glass-stat d-flex flex-column">
                                <i data-lucide="calendar" width="22" height="22" color="#4F46E5"></i>
                                <div class="fw-bold fs-3 mt-1">3</div>
                                <div class="small text-muted">sessions</div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="glass-stat d-flex align-items-center gap-3">
                                <i data-lucide="trending-up" width="28" height="28" color="#16A34A"></i>
                                <div><span class="fw-semibold">U12 progress +18%</span><span class="d-block small text-muted">this month</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES (4 cards) -->
    <section class="container my-5" id="features">
        <div class="text-center mb-5">
            <span class="badge-glass">ELEVATED FEATURES</span>
            <h2 class="fw-semibold display-6 mt-3" style="background: linear-gradient(145deg,#0F172A,#1F2A44); -webkit-background-clip:text;">Everything at a glance</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card-advanced">
                    <div class="icon-gloss"><i data-lucide="users"></i></div>
                    <h3 class="h5 fw-bold">Parent Dashboard</h3>
                    <p class="text-muted small">Track children’s sessions and progress in real time.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card-advanced">
                    <div class="icon-gloss"><i data-lucide="activity"></i></div>
                    <h3 class="h5 fw-bold">Player Progress</h3>
                    <p class="text-muted small">Coaches log effort & development after every session.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card-advanced">
                    <div class="icon-gloss"><i data-lucide="calendar"></i></div>
                    <h3 class="h5 fw-bold">Session Management</h3>
                    <p class="text-muted small">Groups, schedules, and training — all in one place.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card-advanced">
                    <div class="icon-gloss"><i data-lucide="bell"></i></div>
                    <h3 class="h5 fw-bold">Smart Alerts</h3>
                    <p class="text-muted small">Instant updates about sessions & progress.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PROGRAMMES -->
    <section class="container my-5" id="programms">
        <div class="text-center mb-5">
            <span class="badge-glass">TAILORED PROGRAMMES</span>
            <h2 class="fw-semibold display-6 mt-3" style="background: linear-gradient(145deg,#0F172A,#1F2A44); -webkit-background-clip:text;">For every athlete & coach</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="programme-glass">
                    <div class="badge-glass mb-3">social · adult</div>
                    <h3 class="h3 fw-semibold">She Plays Social</h3>
                    <p class="text-muted">Adults football programme · friendly & competitive</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="programme-glass">
                    <div class="badge-glass mb-3">youth · academy</div>
                    <h3 class="h3 fw-semibold">She Plays Academy</h3>
                    <p class="text-muted">Youth football training U5–U18 · elite pathway</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="programme-glass">
                    <div class="badge-glass mb-3">coach · pro</div>
                    <h3 class="h3 fw-semibold">The Coaching Academy</h3>
                    <p class="text-muted">Professional coach development programme</p>
                </div>
            </div>
        </div>
    </section>

    <!-- MOBILE PREVIEW -->
    <section class="container my-5" id="about">
        <div class="row align-items-center g-5">
            <div class="col-md-8 order-md-2">
                <span class="badge-glass">MOBILE-FIRST INTERFACE</span>
                <h2 class="display-6 fw-semibold mt-3" style="background: linear-gradient(145deg,#0F172A,#1F2A44); -webkit-background-clip:text;">Your club, right in your pocket</h2>
                <p class="text-muted fs-5 mt-3">Designed for parents, players & coaches on the go. Next session, progress, alerts – all behind glass.</p>
            </div>
            <div class="col-md-3 offset-md-1 order-md-1" style="justify-content: center;display: flex;">
                <div class="phone-glass-mock">
                    <div class="glass-notch"></div>
                    <div class="mock-row-glass">
                        <i data-lucide="calendar" width="22" height="22" color="#4F46E5"></i>
                        <div><span class="fw-semibold">Next session</span><span class="d-block small text-muted">U12 · tomorrow 10:00</span></div>
                    </div>
                    <div class="mock-row-glass">
                        <i data-lucide="trending-up" width="22" height="22" color="#16A34A"></i>
                        <div><span class="fw-semibold">Latest progress</span><span class="d-block small text-muted">Emma +2 new skills</span></div>
                    </div>
                    <div class="mock-row-glass">
                        <i data-lucide="bell" width="22" height="22" color="#F59E0B"></i>
                        <div><span class="fw-semibold">Alerts</span><span class="d-block small text-muted">Session rescheduled</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA with perfect button -->
    <section class="container" style="padding-bottom: 6rem;">
        <div class="cta-deep text-center">
            <h2 class="fw-bold display-6 mb-4 text-white">Ready to simplify your sports club?</h2>
            <a href="{{ route('login') }}" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-semibold d-inline-flex align-items-center justify-content-center" style="background: rgba(255,255,255,0.9); backdrop-filter: blur(10px); border: 1px solid white; color: #1F2A44; height: 60px; line-height: 1;">Login to Platform</a>
            <p class="mt-4 text-white opacity-75 small">No credit card · free for clubs</p>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer-glass py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 mb-3 mb-md-0">
                    <span class="fw-bold fs-3" style="background: linear-gradient(130deg,#1F2A44,#4F46E5); -webkit-background-clip:text;">Momentum Sports Club</span>
                    <p class="text-muted small mt-2">© 2026 {{ config('app.name', 'Laravel') }} · all rights reserved</p>
                </div>
                <div class="col-md-7">
                    <div class="d-flex flex-wrap justify-content-md-end gap-4">
                        <a href="javascript:void(0);" class="footer-link-g">Privacy Policy</a>
                        <a href="javascript:void(0);" class="footer-link-g">Terms</a>
                        <a href="javascript:void(0);" class="footer-link-g">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script> lucide.createIcons(); </script>
</body>
</html>