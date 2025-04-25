class SimpleCarousel {
    constructor(element) {
        this.carousel = element;
        this.wrapper = element.querySelector('.simple-carousel-wrapper');
        this.slides = Array.from(element.querySelectorAll('.simple-carousel-slide'));
        this.prevBtn = element.querySelector('.simple-carousel-prev');
        this.nextBtn = element.querySelector('.simple-carousel-next');
        this.dotsContainer = element.querySelector('.simple-carousel-indicators');
        this.slideCount = this.slides.length;
        this.currentIndex = 0;
        this.slideWidth = this.slides[0].offsetWidth + 20; // 20 = gap
        this.locked = false;
        this.startX = 0;
        this.deltaX = 0;

        this.setupDots();
        this.update();
        this.addEvents();
        this.setAutoplay();
    }

    setupDots() {
        if (!this.dotsContainer) {
            // Crear dots si no existen
            this.dotsContainer = document.createElement('div');
            this.dotsContainer.className = 'simple-carousel-indicators';
            this.carousel.appendChild(this.dotsContainer);
        }
        this.dotsContainer.innerHTML = '';
        for (let i = 0; i < this.slideCount; i++) {
            const dot = document.createElement('div');
            dot.className = 'simple-carousel-indicator';
            if (i === 0) dot.classList.add('active');
            dot.addEventListener('click', () => {
                this.currentIndex = i;
                this.update();
                this.resetAutoplay();
            });
            this.dotsContainer.appendChild(dot);
        }
        this.dots = Array.from(this.dotsContainer.children);
    }

    addEvents() {
        this.prevBtn.addEventListener('click', () => { this.prev(); this.resetAutoplay(); });
        this.nextBtn.addEventListener('click', () => { this.next(); this.resetAutoplay(); });

        // Drag y touch
        this.wrapper.addEventListener('mousedown', e => this.onDragStart(e));
        this.wrapper.addEventListener('touchstart', e => this.onDragStart(e), {passive:true});
        window.addEventListener('mousemove', e => this.onDragMove(e));
        window.addEventListener('touchmove', e => this.onDragMove(e), {passive:true});
        window.addEventListener('mouseup', e => this.onDragEnd(e));
        window.addEventListener('touchend', e => this.onDragEnd(e));

        // Ya NO se maneja aquí la apertura del modal, es global.js ahora
    }

    setAutoplay() {
        this.autoPlayInterval = setInterval(() => this.next(), 7000);
        this.wrapper.addEventListener('mouseenter', () => clearInterval(this.autoPlayInterval));
        this.wrapper.addEventListener('mouseleave', () => this.setAutoplay());
    }
    resetAutoplay() {
        clearInterval(this.autoPlayInterval);
        this.setAutoplay();
    }

    prev() {
        this.currentIndex = (this.currentIndex - 1 + this.slideCount) % this.slideCount;
        this.update();
    }
    next() {
        this.currentIndex = (this.currentIndex + 1) % this.slideCount;
        this.update();
    }

    update() {
        const slideWidth = this.slides[0].offsetWidth + 20;
        this.wrapper.style.transition = 'transform .5s cubic-bezier(.77,0,.18,1)';
        this.wrapper.style.transform = `translateX(${-this.currentIndex * slideWidth}px)`;
        if (this.dots) {
            this.dots.forEach((dot, i) => dot.classList.toggle('active', i === this.currentIndex));
        }
    }

    // --- DRAG & SWIPE HANDLING ---
    onDragStart(e) {
        if (e.type === 'touchstart') {
            this.startX = e.touches[0].clientX;
        } else {
            this.startX = e.clientX;
        }
        this.deltaX = 0;
        this.locked = true;
        this.wrapper.style.transition = 'none';
    }
    onDragMove(e) {
        if (!this.locked) return;
        let clientX = (e.type === 'touchmove') ? e.touches[0].clientX : e.clientX;
        this.deltaX = clientX - this.startX;
        this.wrapper.style.transform = `translateX(${-this.currentIndex * (this.slides[0].offsetWidth + 20) + this.deltaX}px)`;
    }
    onDragEnd(e) {
        if (!this.locked) return;
        this.locked = false;
        if (Math.abs(this.deltaX) > this.slides[0].offsetWidth / 4) {
            if (this.deltaX > 0) this.prev();
            else this.next();
        } else {
            this.update();
        }
        this.deltaX = 0;
    }
}

// Inicializar todos los carouseles
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.simple-carousel').forEach(carousel => new SimpleCarousel(carousel));
});

// Modal video eliminado, va en global.js
