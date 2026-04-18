// --- 1. WordPress Navigation Control ---
(function () {
  const siteNavigation = document.getElementById('site-navigation');
  if (!siteNavigation) return;
  const button = siteNavigation.getElementsByTagName('button')[0];
  if ('undefined' === typeof button) return;
  const menu = siteNavigation.getElementsByTagName('ul')[0];
  if ('undefined' === typeof menu) {
    button.style.display = 'none';
    return;
  }
  if (!menu.classList.contains('nav-menu')) {
    menu.classList.add('nav-menu');
  }
  button.addEventListener('click', function () {
    siteNavigation.classList.toggle('toggled');
    button.setAttribute('aria-expanded', siteNavigation.classList.contains('toggled'));
  });
}());

// --- 2. GSAP & Animations ---
gsap.registerPlugin(ScrollTrigger);

// 【追加】帯アニメーションの設定
function revealTextAnimation() {
  const target = document.querySelector(".slide-copy1");
  if (!target) return;

  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: ".slide-copy1",
      start: "top 85%",
      once: true
    }
  });

  // CSS変数 --reveal-x を制御して帯を動かす
  tl.to(".slide-copy1 p", {
    "--reveal-x": "0%",
    duration: 0.6,
    ease: "expo.out",
    stagger: 0.2
  })
    .set(".slide-copy1 p", { color: "#fff" }, "-=0.1") // 帯が重なった瞬間に文字色を白に
    .to(".slide-copy1 p", {
      "--reveal-x": "100%",
      duration: 0.6,
      ease: "power2.inOut",
      stagger: 0.2
    }, "-=0.3");
}

// 控えめなフェードインアニメーション
function fadeInAnimation(selector) {
  const element = document.querySelector(selector);
  if (!element) return;

  gsap.fromTo(selector, {
    autoAlpha: 0,
    y: 20 // 控えめな移動距離
  }, {
    autoAlpha: 1,
    y: 0,
    duration: 1.0,
    ease: "power2.out",
    scrollTrigger: {
      trigger: selector,
      start: "top 90%",
      toggleActions: "play none none none"
    }
  });
}

// --- 3. Initializations ---
document.addEventListener("DOMContentLoaded", function () {
  // 帯アニメーション実行
  revealTextAnimation();

  // フェードイン実行
  const targets = [
    ".access", ".environment", ".concept-title", ".concept-subtitle",
    ".concept__text", ".concept__picture-1", ".features-title",
    ".information-title", ".information__list", ".features__box-item",
    ".profile", ".rooms", ".roomplan", ".propertyinfo", ".contact",
    ".news", ".page-404", ".policy"
  ];
  targets.forEach(target => fadeInAnimation(target));

  // スムーススクロール
  if (typeof SmoothScroll !== 'undefined') {
    new SmoothScroll('a[href*="#"]', {
      speed: 800,
      speedAsDuration: true
    });
  }
});

// --- 4. Navigation & UI Controls ---
window.addEventListener('load', function () {
  const nav = document.getElementById('nav-wrapper');
  const hamburger = document.getElementById('js-hamburger');
  const blackBg = document.getElementById('js-black-bg');

  if (hamburger && nav) {
    hamburger.addEventListener('click', function () {
      nav.classList.toggle('open');
      document.body.classList.toggle('no-scroll');
    });
  }
  if (blackBg && nav) {
    blackBg.addEventListener('click', function () {
      nav.classList.remove('open');
      document.body.classList.remove('no-scroll');
    });
  }

  // --- Swiper Settings ---
  // メインフェードスライダー
  if (document.querySelector('.swiper-container-4')) {
    new Swiper('.swiper-container-4', {
      loop: true,
      effect: 'fade',
      autoplay: { delay: 4000, disableOnInteraction: false },
      speed: 2000,
      pagination: { el: '.swiper-pagination', clickable: true }
    });
  }

  // 物件一覧スライダー
  if (document.querySelector('.swiper')) {
    new Swiper('.swiper', {
      loop: true,
      autoplay: { delay: 4000, disableOnInteraction: false },
      slidesPerView: 1,
      spaceBetween: 20,
      speed: 1000,
      breakpoints: {
        600: { slidesPerView: 2 },
        1024: { slidesPerView: 3, spaceBetween: 30 }
      },
      pagination: { el: '.swiper-pagination', clickable: true },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }
    });
  }
});

// --- 5. Header Scroll Control ---
const header = document.querySelector('#header');
let prevY = window.pageYOffset;
window.addEventListener('scroll', () => {
  const currentY = window.pageYOffset;
  if (header) {
    if (currentY < prevY || currentY <= 0) {
      header.classList.remove('hidden');
    } else if (currentY > 100) {
      header.classList.add('hidden');
    }
  }
  prevY = currentY;
}, { passive: true });
