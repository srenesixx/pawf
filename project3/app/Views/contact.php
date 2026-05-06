<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container py-5 mt-5 pt-lg-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- PURE CONTACT CARD -->
            <div class="card-modern overflow-hidden reveal shadow-lg border-0 text-center"
                style="background: linear-gradient(135deg, #ffffff, #f8f9fa); color: #1a1a1a; min-height: 500px; display: flex; align-items: center; justify-content: center; position: relative; border-radius: 40px !important;">

                <!-- DECORATIVE ELEMENTS -->
                <div class="position-absolute"
                    style="top: -150px; right: -150px; width: 400px; height: 400px; background: rgba(33, 150, 243, 0.05); border-radius: 50%; filter: blur(60px);">
                </div>
                <div class="position-absolute"
                    style="bottom: -100px; left: -100px; width: 250px; height: 250px; background: rgba(33, 150, 243, 0.03); border-radius: 50%; filter: blur(40px);">
                </div>

                <div class="card-body p-5 position-relative z-1">
                    <div class="reveal" style="transition-delay: 0.2s;">
                        <span class="badge bg-primary text-white mb-4 px-4 py-2 rounded-pill small fw-bold"
                            style="letter-spacing: 2px;">LET'S CONNECT</span>
                        <h1 class="display-3 fw-800 mb-4">Direct <span class="text-primary">Inquiries.</span></h1>
                        <p class="lead text-muted mb-5 mx-auto" style="max-width: 500px;">Kami selalu terbuka untuk
                            kolaborasi, pertanyaan, atau sekadar berbagi ide kreatif. Silakan hubungi kami melalui jalur
                            berikut.</p>
                    </div>

                    <div class="row g-4 justify-content-center mb-5">
                        <!-- EMAIL CARD -->
                        <div class="col-md-6 reveal" style="transition-delay: 0.4s;">
                            <a href="mailto:contact@almaa.digital" class="text-decoration-none">
                                <div
                                    class="bg-light p-4 border border-dark border-opacity-10 hover-lift h-100 d-flex flex-column align-items-center"
                                    style="border-radius: 32px !important;">
                                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle mb-3">✉️</div>
                                    <div class="small fw-800 text-muted mb-1 text-uppercase ls-1">EMAIL US</div>
                                    <div class="fw-bold text-dark h5 mb-0">contact@almaa.digital</div>
                                </div>
                            </a>
                        </div>
                        <!-- LOCATION CARD -->
                        <div class="col-md-6 reveal" style="transition-delay: 0.5s;">
                            <div
                                class="bg-light p-4 border border-dark border-opacity-10 hover-lift h-100 d-flex flex-column align-items-center"
                                style="border-radius: 32px !important;">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle mb-3">📍</div>
                                <div class="small fw-800 text-muted mb-1 text-uppercase ls-1">LOCATION</div>
                                <div class="fw-bold text-dark h5 mb-0">Jakarta, Indonesia</div>
                            </div>
                        </div>
                    </div>

                    <!-- SOCIAL CONNECT -->
                    <div class="reveal" style="transition-delay: 0.7s;">
                        <div
                            class="d-flex flex-wrap justify-content-center gap-4 pt-4 border-top border-dark border-opacity-10">
                            <a href="#" class="social-pill text-dark">INSTAGRAM</a>
                            <a href="#" class="social-pill text-dark">LINKEDIN</a>
                            <a href="#" class="social-pill text-dark">TWITTER</a>
                            <a href="#" class="social-pill text-dark">WHATSAPP</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-lift {
        transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
    }

    .hover-lift:hover {
        transform: translateY(-10px);
        background: #fff !important;
        border-color: var(--primary) !important;
        box-shadow: 0 15px 30px rgba(0,0,0,0.05);
    }

    .social-pill {
        color: #1a1a1a;
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 1.5px;
        opacity: 0.6;
        transition: 0.3s;
        padding: 8px 15px;
        border: 1px solid transparent;
        border-radius: 50px;
    }

    .social-pill:hover {
        opacity: 1;
        border-color: rgba(0, 0, 0, 0.1);
        background: rgba(0, 0, 0, 0.03);
    }
</style>
<?= $this->endSection() ?>