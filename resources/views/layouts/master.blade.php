<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CORE_SYS') | Ayu Rianti [OPERATOR_037]</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            /* System Core Palette - High Contrast Dark */
            --sys-bg: #050505;
            --sys-surface: rgba(15, 15, 15, 0.85);
            --sys-border: rgba(0, 243, 255, 0.2);
            --sys-border-active: rgba(0, 243, 255, 0.8);
            --sys-primary: #00f3ff; /* Cyber Cyan */
            --sys-secondary: #ff00ff; /* Cyber Magenta (for alerts/accents) */
            --sys-success: #00ff41; /* Terminal Green */
            --sys-text: #e0e0e0;
            --sys-text-muted: #666;
            --font-mono: 'Fira Code', monospace;
            --font-sans: 'Inter', sans-serif;
            --sys-glow: 0 0 10px rgba(0, 243, 255, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-sans);
            background-color: var(--sys-bg);
            color: var(--sys-text);
            line-height: 1.6;
            overflow-x: hidden;
            background-image:
                radial-gradient(circle at 50% 50%, rgba(0, 243, 255, 0.03) 0%, transparent 60%),
                linear-gradient(rgba(0, 243, 255, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 243, 255, 0.02) 1px, transparent 1px);
            background-size: 100% 100%, 40px 40px, 40px 40px;
        }

        /* Scanning Line Effect */
        .scanline {
            width: 100%;
            height: 100px;
            z-index: 9999;
            background: linear-gradient(0deg, rgba(0, 243, 255, 0) 0%, rgba(0, 243, 255, 0.1) 50%, rgba(0, 243, 255, 0) 100%);
            opacity: 0.1;
            position: fixed;
            bottom: 100%;
            left: 0;
            pointer-events: none;
            animation: scan 6s linear infinite;
        }

        @keyframes scan {
            0% { bottom: 100%; }
            100% { bottom: -100px; }
        }

        /* Static Noise Overlay */
        .noise {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: -1;
            opacity: 0.02;
            pointer-events: none;
        }

        /* Navbar - HUD Style */
        .navbar {
            background: rgba(5, 5, 5, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid var(--sys-border);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 0.75rem 2rem;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            font-family: var(--font-mono);
        }

        .logo-icon {
            color: var(--sys-primary);
            font-size: 1.8rem;
            filter: drop-shadow(0 0 5px var(--sys-primary));
        }

        .logo-text {
            color: #fff;
            font-weight: 700;
            font-size: 1.2rem;
            letter-spacing: 1px;
        }

        .logo-text span {
            display: block;
            font-size: 0.7rem;
            color: var(--sys-success);
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--sys-text-muted);
            font-family: var(--font-mono);
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            padding-bottom: 0.2rem;
        }

        .nav-links a:hover, .nav-links a.active {
            color: var(--sys-primary);
            text-shadow: 0 0 8px var(--sys-primary);
        }

        .nav-links a.active::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; width: 100%; height: 2px;
            background: var(--sys-primary);
            box-shadow: 0 0 10px var(--sys-primary);
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3rem 2rem;
            min-height: calc(100vh - 160px);
        }

        /* System Module (Card) */
        .card {
            background: var(--sys-surface);
            border: 1px solid var(--sys-border);
            border-left: 4px solid var(--sys-primary);
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            position: relative;
            box-shadow: 10px 10px 0px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }

        .card::before {
            content: 'SYS_MODULE';
            position: absolute;
            top: -10px; right: 20px;
            background: var(--sys-bg);
            padding: 2px 10px;
            font-family: var(--font-mono);
            font-size: 0.7rem;
            color: var(--sys-primary);
            border: 1px solid var(--sys-border);
        }

        .card:hover {
            border-color: var(--sys-primary);
            box-shadow: 0 0 20px rgba(0, 243, 255, 0.1);
            transform: translate(-2px, -2px);
        }

        h1, h2, h3 {
            font-family: var(--font-mono);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        h1 {
            color: #fff;
            font-size: 3rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        h1 span {
            color: var(--sys-primary);
            text-shadow: 0 0 10px var(--sys-primary);
        }

        h2 {
            font-size: 1.5rem;
            color: var(--sys-primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            border-bottom: 1px solid var(--sys-border);
            padding-bottom: 0.5rem;
        }

        /* Buttons - High Tech Style */
        .btn-primary, .btn-outline {
            font-family: var(--font-mono);
            font-weight: 600;
            padding: 0.8rem 1.8rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            transition: all 0.3s ease;
            cursor: pointer;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .btn-primary {
            background: var(--sys-primary);
            color: #000;
            border: 1px solid var(--sys-primary);
            box-shadow: 0 0 15px rgba(0, 243, 255, 0.4);
        }

        .btn-primary:hover {
            background: transparent;
            color: var(--sys-primary);
            box-shadow: 0 0 25px rgba(0, 243, 255, 0.6);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--sys-primary);
            color: var(--sys-primary);
        }

        .btn-outline:hover {
            background: rgba(0, 243, 255, 0.1);
            box-shadow: 0 0 15px rgba(0, 243, 255, 0.2);
        }

        /* Tech Tags */
        .skill-tag {
            background: rgba(0, 243, 255, 0.05);
            border: 1px solid var(--sys-border);
            color: var(--sys-primary);
            padding: 0.4rem 0.8rem;
            font-family: var(--font-mono);
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .skill-tag:hover {
            border-color: var(--sys-primary);
            background: rgba(0, 243, 255, 0.1);
        }

        /* Footer */
        footer {
            border-top: 1px solid var(--sys-border);
            padding: 3rem 2rem;
            text-align: center;
            background: var(--sys-bg);
            font-family: var(--font-mono);
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 1rem;
        }

        .social-links a {
            color: var(--sys-text-muted);
            font-size: 1.3rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            color: var(--sys-primary);
            filter: drop-shadow(0 0 5px var(--sys-primary));
        }

        @media (max-width: 900px) {
            h1 { font-size: 2rem; }
            .card { padding: 1.5rem; }
            .nav-links { display: none; } /* Could add mobile menu later */
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="scanline"></div>
    <div class="noise" id="noise"></div>

    <!-- ============================================== -->
    <!-- NAVBAR (Bagian Navigasi Utama)                 -->
    <!-- ============================================== -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">

            <!-- Bagian Logo (Kiri) -->
            <a href="{{ route('home') }}" class="logo">
                <!-- Ikon Logo (Menggunakan FontAwesome) -->
                <div class="logo-icon">
                    <i class="fab fa-connectdevelop"></i>
                </div>
                <!-- Teks Logo & Sub-teks -->
                <div class="logo-text">
                    AYU_RIANTI
                    <span>[SYS_SOFTWARE_ENG]</span>
                </div>
            </a>

            <div class="nav-links">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                <a href="{{ route('education') }}" class="{{ request()->routeIs('education') ? 'active' : '' }}">Education</a>
                <a href="{{ route('project') }}" class="{{ request()->routeIs('project') ? 'active' : '' }}">Project</a>
            </div>

        </div>
    </nav>
    <!-- Akhir Navbar -->

    <main class="container">
        @yield('content')
    </main>

    <footer>
        <div class="social-links">
            <a href="#"><i class="fab fa-github"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fas fa-terminal"></i></a>
        </div>
        <p style="font-size: 0.8rem; color: var(--sys-text-muted);">
            SYSTEM_OPERATOR: {{ strtoupper($name ?? 'Ayu Rianti') }} // ID: 037 // LOCAL_HOST: {{ request()->ip() }}
        </p>
        <p style="font-size: 0.7rem; margin-top: 0.5rem; color: var(--sys-success);">
            PROCESS_STABLE // &copy; {{ date('Y') }} // BUILT_WITH_LARAVEL_CORE
        </p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
        AOS.init({
            duration: 600,
            once: true,
            offset: 50
        });

        // CV Download Logic
        function downloadCV() {
            const element = document.getElementById('cv-template');
            element.style.display = 'block'; // Temporarily show for capture

            const opt = {
                margin:       0,
                filename:     'CV_Ayu_Rianti.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2, useCORS: true },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opt).from(element).save().then(() => {
                element.style.display = 'none'; // Hide again after capture
            });
        }

        // Technical noise effect simulation
        const noise = () => {
            let canvas = document.createElement('canvas');
            let ctx = canvas.getContext('2d');
            canvas.width = 100;
            canvas.height = 100;
            let idata = ctx.createImageData(100, 100);
            let buffer32 = new Uint32Array(idata.data.buffer);
            for (let i = 0; i < buffer32.length; i++) buffer32[i] = ((Math.random() * 255) | 0) << 24;
            ctx.putImageData(idata, 0, 0);
            document.getElementById('noise').style.backgroundImage = `url(${canvas.toDataURL()})`;
        };
        noise();
    </script>
    @stack('scripts')
</body>
</html>
