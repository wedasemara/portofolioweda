
/* =========================================
   EDITS_DEWWW - MAIN JAVASCRIPT
========================================= */


/* =========================================
   1. MOBILE NAVIGATION
========================================= */

const toggle = document.querySelector(".menu-toggle");
const nav = document.querySelector(".nav");

if (toggle && nav) {

    toggle.addEventListener("click", () => {

        const isOpen = nav.classList.toggle("open");

        toggle.setAttribute(
            "aria-expanded",
            String(isOpen)
        );

    });

    nav.querySelectorAll("a").forEach(link => {

        link.addEventListener("click", () => {

            nav.classList.remove("open");

            toggle.setAttribute(
                "aria-expanded",
                "false"
            );

        });

    });

}


/* =========================================
   2. AUTOMATIC COPYRIGHT YEAR
========================================= */

const yearElement = document.getElementById("year");

if (yearElement) {
    yearElement.textContent = new Date().getFullYear();
}


/* =========================================
   3. METEOR EFFECT
========================================= */

(() => {

    // Menghormati pengaturan reduced motion
    const reduceMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;

    if (reduceMotion) return;

    // Membuat canvas meteor
    const canvas = document.createElement("canvas");

    canvas.id = "meteor-canvas";
    canvas.setAttribute("aria-hidden", "true");

    document.body.prepend(canvas);

    const ctx = canvas.getContext("2d");

    if (!ctx) {
        canvas.remove();
        return;
    }

    let width = 0;
    let height = 0;
    let meteors = [];

    let lastMeteor = 0;
    let nextMeteorDelay = 2000;

    // Mengatur ukuran canvas
    function resizeCanvas() {

        const dpr = Math.min(
            window.devicePixelRatio || 1,
            2
        );

        width = window.innerWidth;
        height = window.innerHeight;

        canvas.width = width * dpr;
        canvas.height = height * dpr;

        canvas.style.width = width + "px";
        canvas.style.height = height + "px";

        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

    }

    resizeCanvas();

    window.addEventListener(
        "resize",
        resizeCanvas,
        { passive: true }
    );


    // Membuat meteor baru
    function createMeteor() {

        meteors.push({

            x: Math.random() * width,

            y: -30,

            speedX: 2 + Math.random() * 2.5,

            speedY: 3 + Math.random() * 2.5,

            length: 70 + Math.random() * 90,

            opacity: 0.4 + Math.random() * 0.5

        });

    }


    // Menggambar meteor
    function drawMeteors() {

        for (
            let i = meteors.length - 1;
            i >= 0;
            i--
        ) {

            const meteor = meteors[i];

            meteor.x += meteor.speedX;
            meteor.y += meteor.speedY;

            // Ekor cahaya meteor
            const gradient = ctx.createLinearGradient(

                meteor.x,
                meteor.y,

                meteor.x - meteor.length,
                meteor.y - meteor.length

            );

            gradient.addColorStop(
                0,
                `rgba(255,255,255,${meteor.opacity})`
            );

            gradient.addColorStop(
                0.35,
                "rgba(198,255,77,0.35)"
            );

            gradient.addColorStop(
                1,
                "rgba(198,255,77,0)"
            );

            ctx.beginPath();

            ctx.moveTo(meteor.x, meteor.y);

            ctx.lineTo(
                meteor.x - meteor.length,
                meteor.y - meteor.length
            );

            ctx.strokeStyle = gradient;
            ctx.lineWidth = 2;
            ctx.stroke();

            // Kepala meteor
            ctx.beginPath();

            ctx.arc(
                meteor.x,
                meteor.y,
                2,
                0,
                Math.PI * 2
            );

            ctx.fillStyle = "#ffffff";
            ctx.shadowBlur = 12;
            ctx.shadowColor = "#c6ff4d";

            ctx.fill();

            ctx.shadowBlur = 0;

            // Menghapus meteor di luar layar
            if (
                meteor.y > height + 120 ||
                meteor.x > width + 150
            ) {

                meteors.splice(i, 1);

            }

        }

    }


    // Animasi utama
    function animate(timestamp) {

        ctx.clearRect(0, 0, width, height);

        // Meteor muncul dengan jeda acak
        if (
            timestamp - lastMeteor > nextMeteorDelay
        ) {

            createMeteor();

            lastMeteor = timestamp;

            nextMeteorDelay =
                2000 + Math.random() * 3000;

        }

        drawMeteors();

        requestAnimationFrame(animate);

    }

    requestAnimationFrame(animate);

})();


/* =========================================
   4. AUTO-SCROLL PORTFOLIO
========================================= */

(() => {

    const grid = document.querySelector(".work-grid");

    if (!grid) return;

    // Menghormati pengaturan reduced motion
    if (
        window.matchMedia(
            "(prefers-reduced-motion: reduce)"
        ).matches
    ) return;

    const SPEED = 40; // piksel per detik

    const pauseReasons = new Set();

    let inView = false;
    let direction = 1;
    let lastTimestamp = null;
    let resumeTimer = null;

    // Scroll halus bawaan CSS dapat mengganggu animasi
    grid.style.scrollBehavior = "auto";

    // Snap dimatikan agar auto-scroll tidak tersendat
    grid.style.scrollSnapType = "none";

    const maxScroll = () =>
        grid.scrollWidth - grid.clientWidth;

    const pauseForInteraction = () => {

        pauseReasons.add("interaction");

        clearTimeout(resumeTimer);

    };

    const resumeAfterInteraction = (delay = 1500) => {

        clearTimeout(resumeTimer);

        resumeTimer = setTimeout(() => {

            pauseReasons.delete("interaction");

        }, delay);

    };


    grid.addEventListener("mouseenter", () => {

        pauseReasons.add("hover");

    });

    grid.addEventListener("mouseleave", () => {

        pauseReasons.delete("hover");

        resumeAfterInteraction(0);

    });

    grid.addEventListener("focusin", () => {

        pauseReasons.add("focus");

    });

    grid.addEventListener("focusout", () => {

        pauseReasons.delete("focus");

    });

    grid.addEventListener("pointerdown", () => {

        pauseForInteraction();

    });

    grid.addEventListener("pointerup", () => {

        resumeAfterInteraction();

    });

    grid.addEventListener("pointercancel", () => {

        resumeAfterInteraction();

    });

    window.addEventListener("pointerup", () => {

        resumeAfterInteraction();

    });

    grid.addEventListener("wheel", () => {

        pauseForInteraction();

        resumeAfterInteraction();

    }, { passive: true });

    grid.addEventListener("touchstart", () => {

        pauseForInteraction();

    }, { passive: true });

    grid.addEventListener("touchend", () => {

        resumeAfterInteraction();

    }, { passive: true });

    grid.addEventListener("touchcancel", () => {

        resumeAfterInteraction();

    }, { passive: true });


    document.addEventListener("visibilitychange", () => {

        if (document.hidden) {

            pauseReasons.add("hidden");

        } else {

            pauseReasons.delete("hidden");

        }

    });


    // Mulai bergerak saat section terlihat
    const observer = new IntersectionObserver(
        (entries) => {

            inView = entries[0].isIntersecting;

        },
        { threshold: 0.15 }
    );

    observer.observe(grid);


    function step(timestamp) {

        if (
            !inView ||
            pauseReasons.size > 0
        ) {

            lastTimestamp = null;

            requestAnimationFrame(step);

            return;

        }

        if (lastTimestamp === null) {
            lastTimestamp = timestamp;
        }

        const delta = Math.min(
            timestamp - lastTimestamp,
            64
        ) / 1000;

        lastTimestamp = timestamp;

        const max = maxScroll();

        if (max <= 0) {

            requestAnimationFrame(step);

            return;

        }

        let next = (
            grid.scrollLeft +
            SPEED * delta * direction
        );

        // Berbalik arah di kedua ujung
        if (next >= max) {

            next = max;
            direction = -1;

        } else if (next <= 0) {

            next = 0;
            direction = 1;

        }

        grid.scrollLeft = next;

        requestAnimationFrame(step);

    }

    requestAnimationFrame(step);

})();
