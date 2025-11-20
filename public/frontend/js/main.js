/**
 * Template Name: FlexStart
 * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
 * Updated: Nov 01 2024 with Bootstrap v5.3.3
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */

(function () {
    'use strict';

    /**
     * Apply .scrolled class to the body as the page is scrolled down
     */
    function toggleScrolled() {
        const selectBody = document.querySelector('body');
        const selectHeader = document.querySelector('#header');
        if (
            !selectHeader.classList.contains('scroll-up-sticky') &&
            !selectHeader.classList.contains('sticky-top') &&
            !selectHeader.classList.contains('fixed-top')
        )
            return;
        window.scrollY > 100
            ? selectBody.classList.add('scrolled')
            : selectBody.classList.remove('scrolled');
    }

    document.addEventListener('scroll', toggleScrolled);
    window.addEventListener('load', toggleScrolled);

    /**
     * Mobile nav toggle
     */
    const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

    function mobileNavToogle() {
        document.querySelector('body').classList.toggle('mobile-nav-active');
        mobileNavToggleBtn.classList.toggle('bi-list');
        mobileNavToggleBtn.classList.toggle('bi-x');
    }
    if (mobileNavToggleBtn) {
        mobileNavToggleBtn.addEventListener('click', mobileNavToogle);
    }

    /**
     * Hide mobile nav on same-page/hash links
     */
    document.querySelectorAll('#navmenu a').forEach((navmenu) => {
        navmenu.addEventListener('click', () => {
            if (document.querySelector('.mobile-nav-active')) {
                mobileNavToogle();
            }
        });
    });

    /**
     * Toggle mobile nav dropdowns
     */
    document
        .querySelectorAll('.navmenu .toggle-dropdown')
        .forEach((navmenu) => {
            navmenu.addEventListener('click', function (e) {
                e.preventDefault();
                this.parentNode.classList.toggle('active');
                this.parentNode.nextElementSibling.classList.toggle(
                    'dropdown-active',
                );
                e.stopImmediatePropagation();
            });
        });

    /**
     * Scroll top button
     */
    let scrollTop = document.querySelector('.scroll-top');

    function toggleScrollTop() {
        if (scrollTop) {
            window.scrollY > 100
                ? scrollTop.classList.add('active')
                : scrollTop.classList.remove('active');
        }
    }
    if (scrollTop) {
        scrollTop.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            });
        });
    }

    window.addEventListener('load', toggleScrollTop);
    document.addEventListener('scroll', toggleScrollTop);

    /**
     * Animation on scroll function and init
     */
    function aosInit() {
        AOS.init({
            duration: 600,
            easing: 'ease-in-out',
            once: true,
            mirror: false,
        });
    }
    window.addEventListener('load', aosInit);

    /**
     * Initiate glightbox
     */
    const glightbox = GLightbox({
        selector: '.glightbox',
    });

    /**
     * Initiate Pure Counter (FlexStart default)
     */
    new PureCounter();

    /**
     * Frequently Asked Questions Toggle
     */
    document
        .querySelectorAll('.faq-item h3, .faq-item .faq-toggle')
        .forEach((faqItem) => {
            faqItem.addEventListener('click', () => {
                faqItem.parentNode.classList.toggle('faq-active');
            });
        });

    /**
     * Init isotope layout and filters
     */
    document
        .querySelectorAll('.isotope-layout')
        .forEach(function (isotopeItem) {
            let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
            let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
            let sort =
                isotopeItem.getAttribute('data-sort') ?? 'original-order';

            let initIsotope;
            imagesLoaded(
                isotopeItem.querySelector('.isotope-container'),
                function () {
                    initIsotope = new Isotope(
                        isotopeItem.querySelector('.isotope-container'),
                        {
                            itemSelector: '.isotope-item',
                            layoutMode: layout,
                            filter: filter,
                            sortBy: sort,
                        },
                    );
                },
            );

            isotopeItem
                .querySelectorAll('.isotope-filters li')
                .forEach(function (filters) {
                    filters.addEventListener(
                        'click',
                        function () {
                            isotopeItem
                                .querySelector(
                                    '.isotope-filters .filter-active',
                                )
                                .classList.remove('filter-active');
                            this.classList.add('filter-active');
                            initIsotope.arrange({
                                filter: this.getAttribute('data-filter'),
                            });
                            if (typeof aosInit === 'function') {
                                aosInit();
                            }
                        },
                        false,
                    );
                });
        });

    /**
     * Init swiper sliders
     */
    function initSwiper() {
        document
            .querySelectorAll('.init-swiper')
            .forEach(function (swiperElement) {
                let config = JSON.parse(
                    swiperElement
                        .querySelector('.swiper-config')
                        .innerHTML.trim(),
                );

                if (swiperElement.classList.contains('swiper-tab')) {
                    initSwiperWithCustomPagination(swiperElement, config);
                } else {
                    new Swiper(swiperElement, config);
                }
            });
    }

    window.addEventListener('load', initSwiper);

    /**
     * Correct scrolling position upon page load for URLs containing hash links.
     */
    window.addEventListener('load', function (e) {
        if (window.location.hash) {
            if (document.querySelector(window.location.hash)) {
                setTimeout(() => {
                    let section = document.querySelector(window.location.hash);
                    let scrollMarginTop =
                        getComputedStyle(section).scrollMarginTop;
                    window.scrollTo({
                        top: section.offsetTop - parseInt(scrollMarginTop),
                        behavior: 'smooth',
                    });
                }, 100);
            }
        }
    });

    /**
     * Navmenu Scrollspy
     */
    let navmenulinks = document.querySelectorAll('.navmenu a');

    function navmenuScrollspy() {
        navmenulinks.forEach((navmenulink) => {
            if (!navmenulink.hash) return;
            let section = document.querySelector(navmenulink.hash);
            if (!section) return;
            let position = window.scrollY + 200;
            if (
                position >= section.offsetTop &&
                position <= section.offsetTop + section.offsetHeight
            ) {
                document
                    .querySelectorAll('.navmenu a.active')
                    .forEach((link) => link.classList.remove('active'));
                navmenulink.classList.add('active');
            } else {
                navmenulink.classList.remove('active');
            }
        });
    }
    window.addEventListener('load', navmenuScrollspy);
    document.addEventListener('scroll', navmenuScrollspy);

    /**
     * ==========================
     * CUSTOM SECTION: COUNTER CAMPUS STATS
     * ==========================
     */
    document.addEventListener('DOMContentLoaded', function () {
        const counters = document.querySelectorAll('.counter');
        let animated = false;
        const speed = 100; // smaller = faster

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting && !animated) {
                        counters.forEach((counter) => {
                            const updateCount = () => {
                                const target =
                                    +counter.getAttribute('data-target');
                                const count = +counter.innerText;
                                const inc = target / speed;
                                if (count < target) {
                                    counter.innerText = Math.ceil(count + inc);
                                    setTimeout(updateCount, 20);
                                } else {
                                    counter.innerText = target.toLocaleString();
                                }
                            };
                            updateCount();
                        });
                        animated = true;
                    }
                });
            },
            { threshold: 0.3 },
        );

        const statSection = document.querySelector('#statistics');
        if (statSection) {
            observer.observe(statSection);
        }
    });
})();


/* ============================================
   FILE: public/js/features.js
   Alumni Tracer - Features Section JavaScript
   ============================================ */

// Dummy data for each feature
const featureData = {
    'data-alumni': {
        title: 'Data Alumni',
        icon: 'bi-people',
        info: 'Total Alumni: 1,234 | Terdaftar: 856 | Verified: 723',
        description: 'Menampilkan database lengkap alumni dari semua angkatan dengan filter berdasarkan program studi, tahun lulus, dan status.',
        stats: [
            { label: 'Total Alumni', value: '1,234', icon: 'bi-people-fill' },
            { label: 'Terdaftar', value: '856', icon: 'bi-person-check-fill' },
            { label: 'Verified', value: '723', icon: 'bi-patch-check-fill' }
        ]
    },
    'employment': {
        title: 'Status Pekerjaan',
        icon: 'bi-briefcase',
        info: 'Bekerja: 78% | Wirausaha: 12% | Studi Lanjut: 8% | Mencari Kerja: 2%',
        description: 'Tracking real-time status pekerjaan alumni dengan data perusahaan, posisi, dan gaji range.',
        stats: [
            { label: 'Bekerja', value: '78%', icon: 'bi-briefcase-fill' },
            { label: 'Wirausaha', value: '12%', icon: 'bi-shop' },
            { label: 'Studi Lanjut', value: '8%', icon: 'bi-book-fill' },
            { label: 'Mencari Kerja', value: '2%', icon: 'bi-search' }
        ]
    },
    'analytics': {
        title: 'Analytics & Statistik',
        icon: 'bi-bar-chart-line',
        info: 'Rata-rata Waktu Tunggu: 3.2 bulan | Kesesuaian: 85%',
        description: 'Dashboard dengan visualisasi data, trend analysis, dan insights untuk evaluasi program studi.',
        stats: [
            { label: 'Waktu Tunggu', value: '3.2 bulan', icon: 'bi-clock-fill' },
            { label: 'Kesesuaian', value: '85%', icon: 'bi-check-circle-fill' },
            { label: 'Kepuasan', value: '4.2/5.0', icon: 'bi-star-fill' }
        ]
    },
    'survey': {
        title: 'Survey & Feedback',
        icon: 'bi-clipboard-data',
        info: 'Response Rate: 67% | Avg Rating: 4.2/5.0',
        description: 'Kuesioner online untuk feedback kurikulum, fasilitas, dan kompetensi yang diperoleh.',
        stats: [
            { label: 'Response Rate', value: '67%', icon: 'bi-clipboard-check' },
            { label: 'Avg Rating', value: '4.2/5.0', icon: 'bi-star-half' },
            { label: 'Total Survey', value: '156', icon: 'bi-file-text' }
        ]
    },
    'security': {
        title: 'Keamanan Data',
        icon: 'bi-shield-lock',
        info: 'Encryption: AES-256 | SSL: Active | Backup: Daily',
        description: 'Sistem keamanan berlapis dengan enkripsi data, access control, dan audit trail.',
        stats: [
            { label: 'Encryption', value: 'AES-256', icon: 'bi-lock-fill' },
            { label: 'SSL Status', value: 'Active', icon: 'bi-shield-check' },
            { label: 'Backup', value: 'Daily', icon: 'bi-cloud-upload' }
        ]
    },
    'reporting': {
        title: 'Export & Laporan',
        icon: 'bi-file-earmark-text',
        info: 'Format: PDF, Excel, CSV | Templates: 12',
        description: 'Generate laporan tracer study otomatis dengan berbagai template untuk kebutuhan akreditasi.',
        stats: [
            { label: 'Format', value: 'PDF, Excel, CSV', icon: 'bi-filetype-pdf' },
            { label: 'Templates', value: '12', icon: 'bi-file-earmark-ruled' },
            { label: 'Total Export', value: '234', icon: 'bi-download' }
        ]
    }
};

// Route mapping (akan digunakan saat database sudah siap)
const routes = {
    'data-alumni': '/alumni/data',
    'employment': '/alumni/employment',
    'analytics': '/dashboard/analytics',
    'survey': '/survey/feedback',
    'security': '/about/security',
    'reporting': '/reports/export'
};

/**
 * Handle feature card clicks
 * @param {string} feature - Feature key
 */
function handleFeatureClick(feature) {
    // Add click animation
    event.currentTarget.style.transform = 'scale(0.95)';
    setTimeout(() => {
        event.currentTarget.style.transform = '';
    }, 150);

    const data = featureData[feature];
    
    // Create modal with detailed info
    showFeatureModal(data, feature);
}

/**
 * Show modal with feature details
 * @param {object} data - Feature data
 * @param {string} featureKey - Feature key for routing
 */
function showFeatureModal(data, featureKey) {
    // Generate stats HTML
    let statsHTML = '<div class="row g-3 mb-3">';
    data.stats.forEach(stat => {
        statsHTML += `
            <div class="col-md-4">
                <div class="card text-center border-0 bg-light">
                    <div class="card-body">
                        <i class="bi ${stat.icon} text-primary fs-2 mb-2"></i>
                        <h6 class="card-title mb-1">${stat.label}</h6>
                        <p class="card-text fw-bold text-primary mb-0">${stat.value}</p>
                    </div>
                </div>
            </div>
        `;
    });
    statsHTML += '</div>';

    // Create modal content
    const modalHTML = `
        <div class="modal fade" id="featureModal" tabindex="-1" aria-labelledby="featureModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="featureModalLabel">
                            <i class="bi ${data.icon} me-2"></i>${data.title}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i><strong>Quick Stats:</strong><br>
                            ${data.info}
                        </div>
                        
                        ${statsHTML}
                        
                        <p class="mb-3">${data.description}</p>
                        <hr>
                        <p class="text-muted small mb-0">
                            <i class="bi bi-lightbulb me-1"></i>
                            <em>Fitur ini akan mengarahkan ke halaman detail dengan data lengkap dan interaktif.</em>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i>Tutup
                        </button>
                        <button type="button" class="btn btn-primary" onclick="simulateNavigation('${featureKey}')">
                            <i class="bi bi-box-arrow-up-right me-1"></i>Buka Halaman
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // Remove existing modal if any
    const existingModal = document.getElementById('featureModal');
    if (existingModal) {
        existingModal.remove();
    }
    
    // Add modal to body
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('featureModal'));
    modal.show();
    
    // Clean up after modal is hidden
    document.getElementById('featureModal').addEventListener('hidden.bs.modal', function() {
        this.remove();
    });

    
}


/**
//  * Simulate navigation to feature page
//  * @param {string} feature - Feature key
//  */
// function simulateNavigation(feature) {
//     // Close modal
//     const modal = bootstrap.Modal.getInstance(document.getElementById('featureModal'));
//     modal.hide();
    
//     // Show loading toast
//     showToast('Navigasi', `Mengarahkan ke halaman ${featureData[feature].title}...`, 'primary');
    
//     // Log navigation info
//     console.log('=== NAVIGATION INFO ===');
//     console.log(`Feature: ${feature}`);
//     console.log(`Route: ${routes[feature]}`);
//     console.log(`Title: ${featureData[feature].title}`);
//     console.log('======================');
    
//     // Actual navigation - tunggu 500ms untuk animasi modal tutup
//     setTimeout(() => {
//         window.location.href = routes[feature];
//     }, 500);
// }


/**
 * Navigate to feature page
 * @param {string} feature - Feature key
 */
function simulateNavigation(feature) {
    // Close modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('featureModal'));
    modal.hide();
    
    // Show loading toast
    showToast('Navigasi', `Mengarahkan ke halaman ${featureData[feature].title}...`, 'primary');
    
    // Actual navigation dengan delay untuk animasi
    setTimeout(() => {
        window.location.href = routes[feature];
    }, 500);
}


/**
 * Show toast notification
 * @param {string} title - Toast title
 * @param {string} message - Toast message
 * @param {string} type - Toast type (primary, success, warning, danger)
 */
function showToast(title, message, type = 'primary') {
    const toastHTML = `
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-${type} text-white">
                    <i class="bi bi-arrow-right-circle me-2"></i>
                    <strong class="me-auto">${title}</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    ${message}
                </div>
            </div>
        </div>
    `;
    
    const toastElement = document.createElement('div');
    toastElement.innerHTML = toastHTML;
    document.body.appendChild(toastElement);
    
    // Auto remove after 3 seconds
    setTimeout(() => {
        toastElement.remove();
    }, 3000);
}

/**
 * Add cursor trail effect on cards
 */
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.feature-card');
    
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
        
        // Add click ripple effect
        card.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.classList.add('ripple-effect');
            
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});

/**
 * Smooth scroll to sections
 */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#' && document.querySelector(href)) {
            e.preventDefault();
            document.querySelector(href).scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// Log when script is loaded
console.log('✅ Features.js loaded successfully');
console.log('📊 Available features:', Object.keys(featureData));