<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container py-5 mt-4 pt-lg-5">
    <div class="text-center mb-5 reveal pt-lg-5">
        <h1 class="display-3 fw-800">Frequently Asked <span class="text-primary">Questions</span></h1>
        <p class="text-muted mx-auto" style="max-width: 600px;">Temukan jawaban atas pertanyaan umum mengenai platform
            dan konten kami.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="accordion accordion-flush reveal" id="faqAccordion" style="transition-delay: 0.3s;">
                <div class="accordion-item border-0 mb-4 card shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-800 p-4 shadow-none bg-white"
                            style="border-radius: 40px !important;" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq1">
                            Apa itu MyBlog?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body p-4 pt-0 text-muted">
                            MyBlog adalah platform publikasi digital yang fokus pada kualitas tulisan dan pengalaman
                            visual yang premium bagi pembaca.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 mb-4 card shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-800 p-4 shadow-none bg-white"
                            style="border-radius: 40px !important;" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq2">
                            Bagaimana cara berkontribusi?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body p-4 pt-0 text-muted">
                            Anda dapat menghubungi tim kami melalui halaman kontak untuk diskusi kolaborasi atau
                            pengiriman artikel tamu.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 mb-4 card shadow-sm" style="border-radius: 40px !important;">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-800 p-4 shadow-none bg-white"
                            style="border-radius: 40px !important;" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq3">
                            Apakah platform ini gratis?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body p-4 pt-0 text-muted">
                            Ya, seluruh konten di MyBlog dapat diakses secara gratis oleh siapa pun, di mana pun.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .accordion-button:not(.collapsed) {
        color: var(--bs-primary);
        background-color: white !important;
    }

    .accordion-button::after {
        background-size: 1rem;
        transition: 0.3s;
    }
</style>
<?= $this->endSection() ?>