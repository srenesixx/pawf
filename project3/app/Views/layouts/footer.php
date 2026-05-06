    <footer class="bg-white py-5 mt-5 border-top">
        <div class="container py-4">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <h4 class="fw-800 mb-3">My<span class="text-primary">Blog</span></h4>
                    <p class="text-muted small mb-0" style="max-width: 400px;">Platform digital untuk berbagi cerita dan pemikiran dengan desain yang modern, responsif, dan elegan.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="d-flex gap-3 justify-content-md-end mb-3">
                        <a href="#" class="text-muted small text-decoration-none hover-primary">Twitter</a>
                        <a href="#" class="text-muted small text-decoration-none hover-primary">Instagram</a>
                        <a href="#" class="text-muted small text-decoration-none hover-primary">LinkedIn</a>
                    </div>
                    <p class="small text-muted mb-0">&copy; <?= date('Y') ?> MyBlog. Built with passion & precision.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // 1. Navbar Scroll Detection
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        // 2. Intersection Observer for Scroll Reveal
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

        // 3. Smooth Scroll for all internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
    
    <style>
        .hover-primary:hover { color: var(--bs-primary) !important; transition: 0.3s; }
    </style>
</body>
</html>