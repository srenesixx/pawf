<?= $this->extend('layouts/template') ?>


<?= $this->section('content') ?>

<!-- HERO SECTION -->
<section class="py-5 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 reveal">
                <div class="card-modern p-5 text-center position-relative overflow-hidden"
                    style="background: linear-gradient(145deg, #ffffff, #f8f9fa);">
                    <div class="card-body py-5 position-relative z-1">
                        <h1 class="display-1 mb-4">Welcome To My Blog</h1>
                        <p class="lead text-muted mb-5 mx-auto" style="max-width: 700px; font-size: 1.25rem;">Sebuah
                            ruang digital untuk berbagi pemikiran, pengalaman, dan inspirasi melalui tulisan yang
                            terstruktur dan elegan.</p>
                        <div class="d-flex flex-wrap justify-content-center gap-4">
                            <a href="<?= base_url('post') ?>" class="btn btn-primary px-5 py-3 rounded-5">Blog Posts</a>
                            <a href="<?= base_url('about') ?>" class="btn btn-outline-dark px-5 py-3 rounded-5">About
                                Me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LATEST POSTS -->
<section class="py-5 mt-5">
    <div class="container">
        <div class="row mb-5 align-items-end reveal">
            <div class="col-lg-8">
                <h2 class="display-3 mb-0">Latest <span class="text-primary">Blog</span></h2>
                <p class="text-muted mt-3 h5 fw-normal">Wawasan dan cerita terbaru yang dikurasi khusus untukmu.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                <a href="<?= base_url('post') ?>" class="btn btn-outline-primary px-4 rounded-5">VIEW ALL →</a>
            </div>
        </div>

        <div class="row g-4 g-lg-5">
            <?php if (empty($latest_posts)): ?>
                <div class="col-12 text-center py-5 reveal">
                    <div class="card-modern bg-light border-0 py-5 text-muted h5">The frequency is currently silent.</div>
                </div>
            <?php else: ?>
                <?php foreach ($latest_posts as $post): ?>
                    <div class="col-md-6 col-lg-4 reveal">
                        <div class="card-modern h-100 p-3">
                            <div class="card-body d-flex flex-column p-4">
                                <div class="mb-4 d-flex justify-content-between align-items-center">
                                    <div class="small fw-800 text-primary" style="letter-spacing: 1px;">Blog</div>
                                    <div class="small text-muted font-monospace">
                                        <?= date('d.m.y', strtotime($post['created_at'])) ?>
                                    </div>
                                </div>
                                <h3 class="h4 fw-800 mb-3" style="line-height: 1.4; min-height: 3.5rem;">
                                    <?= esc($post['title']) ?>
                                </h3>
                                <p class="text-muted small mb-4 flex-grow-1">
                                    <?= esc(substr(strip_tags((string) $post['content']), 0, 140)) ?>...
                                </p>
                                <div class="pt-4 border-top mt-auto d-flex justify-content-end">
                                    <a href="<?= base_url('post/' . $post['slug']) ?>"
                                        class="btn btn-link text-decoration-none fw-800 small text-primary p-0">READ FULL
                                        ARTICLE →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>