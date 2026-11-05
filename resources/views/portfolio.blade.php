
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Edits_dewww — Freelance Video Editor untuk Instagram Reels, TikTok, dan Social Media.">

    <title>Edits_dewww — Video Editor</title>



    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS Laravel -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- Background Texture -->
    <div class="noise"></div>

    <!-- HEADER -->
    <header class="site-header">

        <a class="brand" href="#home" aria-label="Edits dewww home">
            <span class="brand-mark">E.</span>
            <span>edits_dewww<span class="brand-dot">.</span></span>
        </a>

        <button class="menu-toggle" aria-label="Buka navigasi" aria-expanded="false">
            <span></span>
            <span></span>
        </button>

        <nav class="nav">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#work">My Work</a>
            <a href="#services">Services</a>

            <a class="nav-cta"
               href="https://wa.me/6281249359707"
               target="_blank"
               rel="noopener">
                Let's Talk <span>↗</span>
            </a>
        </nav>

    </header>

    <main>

        <!-- HERO SECTION -->
        <section class="hero section-wrap" id="home">

            <div class="hero-copy">

                <p class="eyebrow">
                    <span class="pulse"></span>
                    FREELANCE VIDEO EDITOR
                </p>

                <h1>
                    Make every<br>
                    second <span class="gradient-text">count.</span>
                </h1>

                <p class="hero-desc">
                    Mengubah footage menjadi konten yang menarik,
                    dinamis, dan siap mencuri perhatian di social media.
                </p>

                <div class="hero-actions">

                    <a class="button button-primary" href="#work">
                        Explore my work <span>↘</span>
                    </a>

                    <a class="text-link"
                       href="https://www.instagram.com/edits.dew/"
                       target="_blank"
                       rel="noopener">
                        Instagram <span>↗</span>
                    </a>

                </div>

                <div class="hero-meta">
                    <span>BASED IN INDONESIA</span>
                    <span class="meta-line"></span>
                    <span>AVAILABLE FOR PROJECTS</span>
                </div>

            </div>

            <!-- HERO VISUAL -->
            <div class="hero-art" aria-label="Dekorasi visual editor">


<!-- INSTAGRAM VIDEO THUMBNAIL -->

<a
    href="https://www.instagram.com/p/De9QcYKgnNe/"
    class="hero-video-link"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Tonton video Edits_dewww di Instagram"
>
    <img
        src="{{ asset('images/hero-thumbnail.jpg') }}"
        alt="Video editing Edits_dewww"
        class="hero-video-image"
    >

    <div class="hero-video-overlay">
        <span class="hero-video-play">▶</span>
    </div>

    <span class="hero-video-duration">INSTAGRAM REEL</span>
</a>

<!-- FLOATING LABELS -->
<div class="hero-video-tag hero-video-tag-top">
    ✦ CREATIVE CUTS
</div>

<div class="hero-video-tag hero-video-tag-bottom">
    REELS · TIKTOK · SHORTS
</div>


                <div class="float-tag tag-top">
                    ✦ CREATIVE CUTS
                </div>

                <div class="float-tag tag-bottom">
                    REELS • TIKTOK • SHORTS
                </div>

                <div class="hero-index">
                    01 <span>/</span> 04
                </div>

            </div>

        </section>

        <!-- RUNNING TEXT -->
        <section class="ticker" aria-label="Spesialisasi">

            <div class="ticker-track">
                <span>SHORT-FORM CONTENT</span>
                <b>✳</b>
                <span>REELS</span>
                <b>✳</b>
                <span>TIKTOK</span>
                <b>✳</b>
                <span>VIDEO EDITING</span>
                <b>✳</b>
                <span>SHORT-FORM CONTENT</span>
                <b>✳</b>
                <span>REELS</span>
                <b>✳</b>
                <span>TIKTOK</span>
                <b>✳</b>
                <span>VIDEO EDITING</span>
                <b>✳</b>
            </div>

        </section>

        <!-- ABOUT ME -->
        <section class="about section-wrap section-pad" id="about">

            <div class="section-label">
                <span>01 / ABOUT ME</span>
                <span>GET TO KNOW ME</span>
            </div>

            <div class="about-grid">


<div class="about-intro">

    <h2>
        Hi, I'm<br>
        <span class="gradient-text">Edits_dewww.</span>
    </h2>

    <!-- PROFILE PHOTO -->
    {{-- <div class="about-profile-photo">
        <img
            src="{{ asset('images/profile.JPG') }}"
            alt="Edits_dewww - Freelance Video Editor"
        >
    </div> --}}

</div>




                <div class="about-copy">

                    <p class="lead">
                        A freelance video editor who loves turning
                        ordinary footage into engaging stories.
                    </p>

                    <p>
                        Fokus pada video pendek untuk kebutuhan social
                        media seperti Instagram Reels dan TikTok.
                        Mulai dari menyusun potongan video, mengatur
                        ritme, menambahkan teks, hingga membuat hasil
                        akhir terasa lebih hidup.
                    </p>

                    <div class="skill-chips">
                        <span>CapCut</span>
                        <span>Short-form video</span>
                        <span>Storytelling</span>
                        <span>Social media</span>
                    </div>

                </div>

            </div>

        </section>

        <!-- PORTFOLIO -->
        <section class="work section-wrap section-pad" id="work">

            <div class="section-label">
                <span>02 / SELECTED WORK</span>
                <span>PORTFOLIO</span>
            </div>

            <div class="section-heading">

                <h2>
                    Some things<br>
                    I've <span class="gradient-text">created.</span>
                </h2>

                <p>
                    Beberapa contoh slot karya. Nantinya kita akan
                    menggantinya dengan video hasil editing aslimu.
                </p>

            </div>


<div class="work-grid">

    <!-- PROJECT 01 -->
    <article class="work-card">


<div class="work-visual work-video">

    <span class="visual-number">PROJECT / 01</span>

    <video
        class="work-video-player"
        controls
        playsinline
        preload="metadata"
        poster="{{ asset('images/project-01-thumb.jpg') }}"
    >
        <source
            src="{{ asset('videos/project-01.mp4') }}"
            type="video/mp4"
        >

        Browser kamu tidak mendukung pemutar video.
    </video>

    <span class="work-type">01 — REELS</span>

</div>


        <div class="work-info">
            <div>
                <h3>Clip dr. Tirta KPI</h3>
                <p>Instagram Reels • Short-form Editing</p>
            </div>
            <span class="work-arrow">↗</span>
        </div>

    </article>


    <!-- PROJECT 02 -->
    <article class="work-card">


<!-- PROJECT 02 VIDEO -->
<div class="work-visual work-video">

    <span class="visual-number">PROJECT / 02</span>

    <video
        class="work-video-player"
        controls
        playsinline
        preload="metadata"
        poster="{{ asset('images/project-02-thumb.jpg') }}"
    >
        <source
            src="{{ asset('videos/project-02.mp4') }}"
            type="video/mp4"
        >

        Browser kamu tidak mendukung pemutar video.
    </video>

    <span class="work-type">02 — SOCIAL</span>

</div>


        <div class="work-info">
            <div>
                <h3>Clip dr. Tirta EGO</h3>
                <p>Social Media • Content Editing</p>
            </div>
            <span class="work-arrow">↗</span>
        </div>

    </article>


    <!-- PROJECT 03 -->
    <article class="work-card">


<div class="work-visual placeholder-three">
    <video
        class="work-video"
        controls
        playsinline
        preload="metadata"
        poster="{{ asset('images/project-03-thumb.jpg') }}"
    >
        <source src="{{ asset('videos/project-03.mp4') }}" type="video/mp4">
        Browser kamu tidak mendukung video.
    </video>

    <span class="work-type">03 — TIKTOK</span>
</div>

        <div class="work-info">
            <div>
                <h3>Aditya Pratama Hari Ini Elu Siapa?</h3>
                <p>Reels Instagram - Clipping</p>
            </div>
            <span class="work-arrow">↗</span>
        </div>

    </article>


    <!-- PROJECT 04 -->
    <article class="work-card">

        <div class="work-visual placeholder-four">
            <span class="visual-number">PROJECT / 04</span>

            <div class="placeholder-content">
                <span class="placeholder-icon">▶</span>
                <span class="placeholder-status">PREVIEW COMING SOON</span>
                <h3>Product Stories</h3>
                <p>PRODUCT SHOWCASE</p>
            </div>

            <span class="work-type">04 — PRODUCT</span>
        </div>

        <div class="work-info">
            <div>
                <h3>Product Stories</h3>
                <p>Product • Promotional Video</p>
            </div>
            <span class="work-arrow">↗</span>
        </div>

    </article>


    <!-- PROJECT 05 -->
    <article class="work-card">

        <div class="work-visual placeholder-five">
            <span class="visual-number">PROJECT / 05</span>

            <div class="placeholder-content">
                <span class="placeholder-icon">▶</span>
                <span class="placeholder-status">PREVIEW COMING SOON</span>
                <h3>Travel Moments</h3>
                <p>CINEMATIC EDITING</p>
            </div>

            <span class="work-type">05 — TRAVEL</span>
        </div>

        <div class="work-info">
            <div>
                <h3>Travel Moments</h3>
                <p>Travel • Cinematic Reels</p>
            </div>
            <span class="work-arrow">↗</span>
        </div>

    </article>


    <!-- PROJECT 06 -->
    <article class="work-card">

        <div class="work-visual placeholder-six">
            <span class="visual-number">PROJECT / 06</span>

            <div class="placeholder-content">
                <span class="placeholder-icon">▶</span>
                <span class="placeholder-status">PREVIEW COMING SOON</span>
                <h3>Daily Highlights</h3>
                <p>SHORT-FORM CONTENT</p>
            </div>

            <span class="work-type">06 — SHORTS</span>
        </div>

        <div class="work-info">
            <div>
                <h3>Daily Highlights</h3>
                <p>YouTube Shorts • Social Media</p>
            </div>
            <span class="work-arrow">↗</span>
        </div>

    </article>

</div>




        </section>

        <!-- SERVICES -->
        <section class="services section-wrap section-pad" id="services">

            <div class="section-label">
                <span>03 / WHAT I DO</span>
                <span>SERVICES</span>
            </div>

            <div class="section-heading">

                <h2>
                    Let's make<br>
                    something <span class="gradient-text">stand out.</span>
                </h2>

            </div>

            <div class="service-list">

                <div class="service-row">
                    <span class="service-no">01</span>
                    <h3>Instagram Reels</h3>
                    <p>
                        Video pendek yang dinamis dan menarik
                        untuk Instagram.
                    </p>
                    <span class="service-plus">↗</span>
                </div>

                <div class="service-row">
                    <span class="service-no">02</span>
                    <h3>TikTok Content</h3>
                    <p>
                        Editing dengan tempo, teks, dan transisi
                        yang sesuai format TikTok.
                    </p>
                    <span class="service-plus">↗</span>
                </div>

                <div class="service-row">
                    <span class="service-no">03</span>
                    <h3>Short-form Editing</h3>
                    <p>
                        Mengolah footage menjadi konten singkat
                        yang lebih rapi dan engaging.
                    </p>
                    <span class="service-plus">↗</span>
                </div>

            </div>

        </section>

        <!-- CONTACT -->
        <section class="contact section-wrap section-pad" id="contact">

            <div class="section-label">
                <span>04 / GET IN TOUCH</span>
                <span>CONTACT</span>
            </div>

            <div class="contact-inner">

                <p class="eyebrow">
                    <span class="pulse"></span>
                    HAVE A PROJECT IN MIND?
                </p>

                <h2>
                    Let's create<br>
                    something <span class="gradient-text">great.</span>
                </h2>

                <p class="contact-desc">
                    Punya ide konten atau butuh bantuan editing?
                    Yuk, ngobrol dan mulai project-mu.
                </p>

                <a class="button button-primary contact-button"
                   href="https://wa.me/6281249359707?text=Halo%20Edits_dewww%2C%20saya%20tertarik%20dengan%20jasa%20video%20editing-mu."
                   target="_blank"
                   rel="noopener">
                    Chat via WhatsApp <span>↗</span>
                </a>

                <div class="social-links">

                    <a href="https://www.instagram.com/edits.dew/"
                       target="_blank"
                       rel="noopener">
                        INSTAGRAM <span>↗</span>
                    </a>

                    <a href="https://wa.me/6281249359707"
                       target="_blank"
                       rel="noopener">
                        WHATSAPP <span>↗</span>
                    </a>

                </div>

            </div>

        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer section-wrap">

        <a class="brand" href="#home">
            <span class="brand-mark">E.</span>
            <span>edits_dewww<span class="brand-dot">.</span></span>
        </a>

        <span>
            © <span id="year"></span>
            Edits_dewww. Made with creativity.
        </span>

        <a href="#home" class="back-top">
            BACK TO TOP ↑
        </a>

    </footer>

    <!-- JavaScript Laravel -->
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
