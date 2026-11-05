<?php

return [

    'disk' => env('CMS_DISK', 'public'),

    'uploads' => [
        'video_max_kb' => (int) env('CMS_VIDEO_MAX_KB', 512000),
        'image_max_kb' => (int) env('CMS_IMAGE_MAX_KB', 5120),
    ],

    'admin' => [
        'name' => env('CMS_ADMIN_NAME', 'Administrator'),
        'email' => env('CMS_ADMIN_EMAIL'),
        'password' => env('CMS_ADMIN_PASSWORD'),
    ],

    'defaults' => [
        'meta_title' => 'Edits_dewww — Video Editor',
        'meta_description' => 'Edits_dewww — Freelance Video Editor untuk Instagram Reels, TikTok, dan Social Media.',

        'brand_mark' => 'E.',
        'brand_name' => 'edits_dewww',
        'footer_tagline' => 'Made with creativity.',

        'hero_eyebrow' => 'FREELANCE VIDEO EDITOR',
        'hero_title_line1' => 'Make every',
        'hero_title_line2' => 'second',
        'hero_title_highlight' => 'count.',
        'hero_description' => 'Mengubah footage menjadi konten yang menarik, dinamis, dan siap mencuri perhatian di social media.',
        'hero_button_label' => 'Explore my work',
        'hero_meta_left' => 'BASED IN INDONESIA',
        'hero_meta_right' => 'AVAILABLE FOR PROJECTS',
        'hero_index' => '01',
        'hero_total' => '04',
        'hero_thumbnail' => '/images/hero-thumbnail.jpg',
        'hero_link' => 'https://www.instagram.com/p/De9QcYKgnNe/',
        'hero_badge_top' => '✦ CREATIVE CUTS',
        'hero_badge_bottom' => 'REELS · TIKTOK · SHORTS',
        'hero_duration' => 'INSTAGRAM REEL',

        'about_title' => "Hi, I'm",
        'about_highlight' => 'Edits_dewww.',
        'about_lead' => 'A freelance video editor who loves turning ordinary footage into engaging stories.',
        'about_body' => 'Fokus pada video pendek untuk kebutuhan social media seperti Instagram Reels dan TikTok. Mulai dari menyusun potongan video, mengatur ritme, menambahkan teks, hingga membuat hasil akhir terasa lebih hidup.',
        'about_skills' => "CapCut\nShort-form video\nStorytelling\nSocial media",
        'about_photo' => '',

        'work_title_line1' => 'Some things',
        'work_title_highlight' => "I've created.",
        'work_description' => 'Beberapa contoh slot karya. Nantinya kita akan menggantinya dengan video hasil editing aslimu.',
        'placeholder_status' => 'PREVIEW COMING SOON',

        'services_title_line1' => "Let's make",
        'services_title_highlight' => 'something stand out.',
        'service_1_title' => 'Instagram Reels',
        'service_1_description' => 'Video pendek yang dinamis dan menarik untuk Instagram.',
        'service_2_title' => 'TikTok Content',
        'service_2_description' => 'Editing dengan tempo, teks, dan transisi yang sesuai format TikTok.',
        'service_3_title' => 'Short-form Editing',
        'service_3_description' => 'Mengolah footage menjadi konten singkat yang lebih rapi dan engaging.',

        'contact_eyebrow' => 'HAVE A PROJECT IN MIND?',
        'contact_title_line1' => "Let's create",
        'contact_title_highlight' => 'something great.',
        'contact_description' => 'Punya ide konten atau butuh bantuan editing? Yuk, ngobrol dan mulai project-mu.',
        'whatsapp_number' => '6281249359707',
        'whatsapp_message' => 'Halo Edits_dewww, saya tertarik dengan jasa video editing-mu.',
        'instagram_url' => 'https://www.instagram.com/edits.dew/',
    ],

    'projects' => [
        [
            'title' => 'Clip dr. Tirta KPI',
            'subtitle' => 'Instagram Reels • Short-form Editing',
            'type_label' => 'REELS',
            'video_path' => '/videos/project-01.mp4',
            'thumbnail_path' => '/images/project-01-thumb.jpg',
            'sort_order' => 1,
        ],
        [
            'title' => 'Clip dr. Tirta EGO',
            'subtitle' => 'Social Media • Content Editing',
            'type_label' => 'SOCIAL',
            'video_path' => '/videos/project-02.mp4',
            'thumbnail_path' => '/images/project-02-thumb.jpg',
            'sort_order' => 2,
        ],
        [
            'title' => 'Aditya Pratama Hari Ini Elu Siapa?',
            'subtitle' => 'Reels Instagram - Clipping',
            'type_label' => 'TIKTOK',
            'video_path' => '/videos/project-03.mp4',
            'thumbnail_path' => '/images/project-03-thumb.jpg',
            'sort_order' => 3,
        ],
        [
            'title' => 'Product Stories',
            'subtitle' => 'Product • Promotional Video',
            'type_label' => 'PRODUCT',
            'video_path' => null,
            'thumbnail_path' => null,
            'sort_order' => 4,
        ],
        [
            'title' => 'Travel Moments',
            'subtitle' => 'Travel • Cinematic Reels',
            'type_label' => 'TRAVEL',
            'video_path' => null,
            'thumbnail_path' => null,
            'sort_order' => 5,
        ],
        [
            'title' => 'Daily Highlights',
            'subtitle' => 'YouTube Shorts • Social Media',
            'type_label' => 'SHORTS',
            'video_path' => null,
            'thumbnail_path' => null,
            'sort_order' => 6,
        ],
    ],

];
