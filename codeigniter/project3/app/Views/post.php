<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container py-5 mt-5 pt-lg-5">
    <div class="row mb-5 reveal pt-lg-4 align-items-end">
        <div class="col-lg-7">
            <h1 class="display-2 fw-800 mb-3">Digital <span class="text-primary">Blogs</span></h1>
            <p class="lead text-muted mb-0" style="max-width: 600px;">Koleksi pemikiran, tutorial, dan catatan perjalanan digital yang dikurasi untuk kenyamanan membaca Anda.</p>
        </div>
        <div class="col-lg-5 mt-4 mt-lg-0">
            <form action="<?= base_url('post') ?>" method="get">
                <div class="input-group card-modern p-1 shadow-sm border-0">
                    <input type="text" name="keyword" class="form-control border-0 bg-transparent ps-4 py-3 fw-bold" 
                           placeholder="Cari judul artikel..." value="<?= esc($keyword) ?>">
                    <button class="btn btn-primary rounded-pill px-4 ms-2" type="submit">
                        🔍 Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="row g-4 g-lg-5">
        <?php if (empty($posts)): ?>
            <div class="col-12 text-center py-5 reveal">
                <div class="card-modern bg-light border-0 py-5 text-muted h5">The archives are currently silent.</div>
            </div>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="card-modern h-100 p-3">
                        <div class="card-body d-flex flex-column p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="small fw-800 text-primary ls-1">Blog</div>
                                <div class="small text-muted font-monospace fw-bold">
                                    <?= date('d.m.y', strtotime($post['created_at'])) ?>
                                </div>
                            </div>
                            <h3 class="h4 fw-800 mb-3" style="line-height: 1.4; min-height: 4rem;"><?= esc($post['title']) ?>
                            </h3>
                            <p class="text-muted small mb-4 flex-grow-1" style="line-height: 1.8;">
                                <?= esc(substr(strip_tags($post['content']), 0, 150)) ?>...
                            </p>
                            <div class="pt-4 border-top mt-auto">
                                <a href="<?= base_url('post/' . $post['slug']) ?>"
                                    class="btn btn-link text-decoration-none fw-800 small text-primary p-0 d-inline-flex align-items-center gap-2 group-hover-arrow">
                                    READ ARTICLE <span class="arrow-transition">→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<style>
    .ls-1 {
        letter-spacing: 1.5px;
    }

    .group-hover-arrow:hover .arrow-transition {
        transform: translateX(5px);
    }

    .arrow-transition {
        transition: transform 0.3s cubic-bezier(0.23, 1, 0.32, 1);
    }
</style>
<?= $this->endSection() ?>