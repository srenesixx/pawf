<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container py-5 mt-5 pt-lg-5">
    <article class="reveal">
        <!-- POST HEADER -->
        <div class="row justify-content-center mb-5 pt-lg-4">
            <div class="col-lg-10 text-center">
                <div class="reveal" style="transition-delay: 0.2s;">
                    <a href="<?= (isset($is_admin) && $is_admin) ? base_url('admin/post') : base_url('post') ?>"
                        class="btn btn-link text-decoration-none fw-800 small text-primary mb-4 p-0 d-inline-flex align-items-center gap-2 group-hover-arrow">
                        <span class="arrow-back-transition">←</span> KEMBALI KE
                        <?= (isset($is_admin) && $is_admin) ? 'ADMIN PANEL' : 'JOURNAL' ?>
                    </a>
                    <h1 class="display-2 fw-800 mb-4"><?= esc($post['title']) ?></h1>
                    <div class="d-flex justify-content-center align-items-center gap-4 text-muted small fw-800 ls-1">
                        <div class="d-flex align-items-center gap-2">
                            <div style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></div>
                            BY ADMINISTRATOR
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <div style="width: 8px; height: 8px; background: #ddd; border-radius: 50%;"></div>
                            <?= date('F d, Y', strtotime($post['created_at'])) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- POST CONTENT -->
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card-modern border-0 shadow-lg reveal" style="transition-delay: 0.4s;">
                    <div class="card-body p-4 p-md-5">
                        <div class="article-body" style="font-size: 1.2rem; line-height: 2.1; color: #1a1a1a;">
                            <?= $post['content'] ?>
                        </div>

                        <!-- SHARE & TAGS -->
                        <div class="mt-5 pt-5 border-top">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-4">
                                <div class="d-flex gap-2 align-items-center">
                                    <span class="small fw-800 text-muted ls-1 me-2">TAGS:</span>
                                    <span
                                        class="badge bg-light text-primary px-3 py-2 rounded-pill fw-bold border">DIGITAL</span>
                                    <span
                                        class="badge bg-light text-primary px-3 py-2 rounded-pill fw-bold border">JOURNAL</span>
                                </div>
                                <div class="small fw-800 ls-1 text-muted">SHARE THIS ENTRY</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>

<style>
    .ls-1 {
        letter-spacing: 1.5px;
    }

    .article-body p {
        margin-bottom: 2.2rem;
    }

    .article-body h2 {
        font-size: 2.8rem;
        font-weight: 800;
        margin-top: 4rem;
        margin-bottom: 1.8rem;
        letter-spacing: -0.04em;
    }

    .article-body blockquote {
        padding: 2.5rem;
        background: #f8f9fa;
        border-left: 6px solid var(--primary);
        font-style: italic;
        margin: 3.5rem 0;
        border-radius: 24px;
        font-family: 'Outfit', sans-serif;
        font-size: 1.4rem;
        color: #444;
    }

    .article-body img {
        max-width: 100%;
        height: auto;
        border-radius: 32px;
        margin: 3rem 0;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
    }

    .group-hover-arrow:hover .arrow-back-transition {
        transform: translateX(-5px);
    }

    .arrow-back-transition {
        transition: transform 0.3s cubic-bezier(0.23, 1, 0.32, 1);
        display: inline-block;
    }
</style>
<?= $this->endSection() ?>