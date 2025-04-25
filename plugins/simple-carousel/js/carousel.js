class SimpleCarousel {
    constructor(element) {
        this.carousel = element;
        this.wrapper = element.querySelector('.simple-carousel-wrapper');
        this.originalSlides = Array.from(element.querySelectorAll('.simple-carousel-slide'));

        // --- DUPLICA SLIDES SI HAY MENOS DE 3 ---
        if (this.originalSlides.length < 3) {
            const needed = 3 - this.originalSlides.length;
            for (let i = 0; i < needed; i++) {
                const clone = this.originalSlides[i % this.originalSlides.length].cloneNode(true);
                this.wrapper.appendChild(clone);
                this.originalSlides.push(clone);
            }
        }

        this.visibleSlides = 3;
        this.slideCount = this.originalSlides.length;

        // --- CLONAR SLIDES PARA INFINITO ---
        // Clona los últimos N al principio y los primeros N al final
        for (let i = 0; i < this.visibleSlides; i++) {
            const firstClone = this.originalSlides[i].cloneNode(true);
            firstClone.classList.add('is-clone');
            this.wrapper.appendChild(firstClone);

            const lastClone = this.originalSlides[this.slideCount - 1 - i].cloneNode(true);
            lastClone.classList.add('is-clone');
            this.wrapper.insertBefore(lastClone, this.wrapper.firstChild);
        }

        // --- ACTUALIZAR SLIDES Y VARIABLES ---
        this.slides = Array.from(this.wrapper.querySelectorAll('.simple-carousel-slide'));
        this.currentIndex = this.visibleSlides; // Primer slide real (por clones)
        this.slideWidth = this.slides[0].offsetWidth + 20; // 20 = gap
        this.locked = false;
        this.startX = 0;
        this.deltaX = 0;

        // --- SETUP ---
        this.setupDots();
        this.update(true); // true para saltar transición
        this.addEvents();
        this.setAutoplay();
    }

    setupDots() {
        if (!this.dotsContainer) {
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
                this.currentIndex = i + this.visibleSlides; // Salta a slide real
                this.update();
                this.resetAutoplay();
            });
            this.dotsContainer.appendChild(dot);
        }
        this.dots = Array.from(this.dotsContainer.children);
    }

    addEvents() {
        this.prevBtn = this.carousel.querySelector('.simple-carousel-prev');
        this.nextBtn = this.carousel.querySelector('.simple-carousel-next');
        this.prevBtn.addEventListener('click', () => { this.prev(); this.resetAutoplay(); });
        this.nextBtn.addEventListener('click', () => { this.next(); this.resetAutoplay(); });

        // Drag y touch
        this.wrapper.addEventListener('mousedown', e => this.onDragStart(e));
        this.wrapper.addEventListener('touchstart', e => this.onDragStart(e), { passive: true });
        window.addEventListener('mousemove', e => this.onDragMove(e));
        window.addEventListener('touchmove', e => this.onDragMove(e), { passive: true });
        window.addEventListener('mouseup', e => this.onDragEnd(e));
        window.addEventListener('touchend', e => this.onDragEnd(e));
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
        this.currentIndex--;
        this.update();
    }
    next() {
        this.currentIndex++;
        this.update();
    }

    update(skipTransition = false) {
        const slideWidth = this.slides[0].offsetWidth + 20;
        if (skipTransition) {
            this.wrapper.style.transition = 'none';
        } else {
            this.wrapper.style.transition = 'transform .5s cubic-bezier(.77,0,.18,1)';
        }
        this.wrapper.style.transform = `translateX(${-this.currentIndex * slideWidth}px)`;

        // Dots activos
        if (this.dots) {
            this.dots.forEach((dot, i) => dot.classList.toggle('active', i === ((this.currentIndex - this.visibleSlides + this.slideCount) % this.slideCount)));
        }

        // --- LOOP INFINITO: "JUMP" AL ORIGINAL ---
        setTimeout(() => {
            if (this.currentIndex < this.visibleSlides) {
                // Si estás en los clones del principio, salta al real equivalente
                this.wrapper.style.transition = 'none';
                this.currentIndex = this.slideCount + this.currentIndex;
                this.wrapper.style.transform = `translateX(${-this.currentIndex * slideWidth}px)`;
            } else if (this.currentIndex >= this.slideCount + this.visibleSlides) {
                // Si estás en los clones del final, salta al real equivalente
                this.wrapper.style.transition = 'none';
                this.currentIndex = this.currentIndex - this.slideCount;
                this.wrapper.style.transform = `translateX(${-this.currentIndex * slideWidth}px)`;
            }
        }, 510); // Justo después de la transición (500ms + margen)
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
