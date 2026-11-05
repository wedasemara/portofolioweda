<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="{{ $settings['meta_description'] }}">

    <title>{{ $settings['meta_title'] }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS & JS Laravel (Vite) -->
    @vite(['resources/css/portfolio.css', 'resources/js/portfolio.js'])
</head>

<body>

    <!-- Background Texture -->
    <div class="noise"></div>

    <!-- HEADER -->
    <header class="site-header">

        <a class="brand" href="#home" aria-label="{{ $settings['brand_name'] }} home">
            <span class="brand-mark">{{ $settings['brand_mark'] }}</span>
            <span>{{ $settings['brand_name'] }}<span class="brand-dot">.</span></span>
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
               href="{{ $whatsappUrl }}"
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
                    {{ $settings['hero_eyebrow'] }}
                </p>

                <h1>
                    {{ $settings['hero_title_line1'] }}<br>
                    {{ $settings['hero_title_line2'] }} <span class="gradient-text">{{ $settings['hero_title_highlight'] }}</span>
                </h1>

                <p class="hero-desc">
                    {{ $settings['hero_description'] }}
                </p>

                <div class="hero-actions">

                    <a class="button button-primary" href="#work">
                        {{ $settings['hero_button_label'] }} <span>↘</span>
                    </a>

                    <a class="text-link"
                       href="{{ $settings['instagram_url'] }}"
                       target="_blank"
                       rel="noopener">
                        Instagram <span>↗</span>
                    </a>

                </div>

                <div class="hero-meta">
                    <span>{{ $settings['hero_meta_left'] }}</span>
                    <span class="meta-line"></span>
                    <span>{{ $settings['hero_meta_right'] }}</span>
                </div>

            </div>

            <!-- HERO VISUAL -->
            <div class="hero-art" aria-label="Dekorasi visual editor">

                <a
                    href="{{ $settings['hero_link'] }}"
                    class="hero-video-link"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Tonton video {{ $settings['brand_name'] }} di Instagram"
                >
                    <img
                        src="{{ \App\Support\Media::url($settings['hero_thumbnail']) }}"
                        alt="Video editing {{ $settings['brand_name'] }}"
                        class="hero-video-image"
                    >

                    <div class="hero-video-overlay">
                        <span class="hero-video-play">▶</span>
                    </div>

                    <span class="hero-video-duration">{{ $settings['hero_duration'] }}</span>
                </a>

                <!-- FLOATING LABELS -->
                <div class="hero-video-tag hero-video-tag-top">
                    {{ $settings['hero_badge_top'] }}
                </div>

                <div class="hero-video-tag hero-video-tag-bottom">
                    {{ $settings['hero_badge_bottom'] }}
                </div>

                <div class="hero-index">
                    {{ $settings['hero_index'] }} <span>/</span> {{ $settings['hero_total'] }}
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
                        {{ $settings['about_title'] }}<br>
                        <span class="gradient-text">{{ $settings['about_highlight'] }}</span>
                    </h2>

                    @if ($settings['about_photo'])
                        <div class="about-profile-photo">
                            <img
                                src="{{ \App\Support\Media::url($settings['about_photo']) }}"
                                alt="{{ $settings['brand_name'] }} - Freelance Video Editor"
                            >
                        </div>
                    @endif

                </div>

                <div class="about-copy">

                    <p class="lead">
                        {{ $settings['about_lead'] }}
                    </p>

                    <p>
                        {!! nl2br(e($settings['about_body'])) !!}
                    </p>

                    <div class="skill-chips">
                        @foreach (preg_split('/\r\n|\r|\n/', (string) $settings['about_skills']) as $skill)
                            @if (trim($skill) !== '')
                                <span>{{ trim($skill) }}</span>
                            @endif
                        @endforeach
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
                    {{ $settings['work_title_line1'] }}<br>
                    <span class="gradient-text">{{ $settings['work_title_highlight'] }}</span>
                </h2>

                <p>
                    {{ $settings['work_description'] }}
                </p>

            </div>

            <div class="work-grid">

                @forelse ($projects as $project)
                    @php
                        $number = str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT);
                        $type = $project->type_label ?: 'PROJECT';
                    @endphp

                    <article class="work-card">

                        @if ($project->videoUrl())
                            <div class="work-visual work-video">

                                <span class="visual-number">PROJECT / {{ $number }}</span>

                                <video
                                    class="work-video-player"
                                    controls
                                    playsinline
                                    preload="metadata"
                                    @if ($project->thumbnailUrl()) poster="{{ $project->thumbnailUrl() }}" @endif
                                >
                                    <source
                                        src="{{ $project->videoUrl() }}"
                                        type="{{ $project->videoMime() }}"
                                    >

                                    Browser kamu tidak mendukung pemutar video.
                                </video>

                                <span class="work-type">{{ $number }} — {{ $type }}</span>

                            </div>
                        @else
                            <div class="work-visual {{ ['placeholder-four', 'placeholder-five', 'placeholder-six'][$loop->index % 3] }}">

                                <span class="visual-number">PROJECT / {{ $number }}</span>

                                <div class="placeholder-content">
                                    <span class="placeholder-icon">▶</span>
                                    <span class="placeholder-status">{{ $settings['placeholder_status'] }}</span>
                                    <h3>{{ $project->title }}</h3>
                                    <p>{{ strtoupper($type) }}</p>
                                </div>

                                <span class="work-type">{{ $number }} — {{ $type }}</span>

                            </div>
                        @endif

                        <div class="work-info">
                            <div>
                                <h3>{{ $project->title }}</h3>
                                <p>{{ $project->subtitle }}</p>
                            </div>
                            <span class="work-arrow">↗</span>
                        </div>

                    </article>
                @empty
                    <p class="work-note">Belum ada project yang dipublikasikan.</p>
                @endforelse

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
                    {{ $settings['services_title_line1'] }}<br>
                    <span class="gradient-text">{{ $settings['services_title_highlight'] }}</span>
                </h2>

            </div>

            <div class="service-list">

                @for ($i = 1; $i <= 3; $i++)
                    <div class="service-row">
                        <span class="service-no">{{ str_pad((string) $i, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3>{{ $settings["service_{$i}_title"] }}</h3>
                        <p>
                            {{ $settings["service_{$i}_description"] }}
                        </p>
                        <span class="service-plus">↗</span>
                    </div>
                @endfor

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
                    {{ $settings['contact_eyebrow'] }}
                </p>

                <h2>
                    {{ $settings['contact_title_line1'] }}<br>
                    <span class="gradient-text">{{ $settings['contact_title_highlight'] }}</span>
                </h2>

                <p class="contact-desc">
                    {{ $settings['contact_description'] }}
                </p>

                <a class="button button-primary contact-button"
                   href="{{ $whatsappUrl }}"
                   target="_blank"
                   rel="noopener">
                    Chat via WhatsApp <span>↗</span>
                </a>

                <div class="social-links">

                    <a href="{{ $settings['instagram_url'] }}"
                       target="_blank"
                       rel="noopener">
                        INSTAGRAM <span>↗</span>
                    </a>

                    <a href="{{ $whatsappUrl }}"
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
            <span class="brand-mark">{{ $settings['brand_mark'] }}</span>
            <span>{{ $settings['brand_name'] }}<span class="brand-dot">.</span></span>
        </a>

        <span>
            © <span id="year"></span>
            {{ $settings['brand_name'] }}. {{ $settings['footer_tagline'] }}
        </span>

        <a href="#home" class="back-top">
            BACK TO TOP ↑
        </a>

    </footer>

</body>
</html>
