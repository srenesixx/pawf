<?= $this->extend('layouts/admin_template') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-5 reveal">
    <div>
        <h2 class="display-5 fw-800 mb-2">Refine Article</h2>
        <p class="text-muted small ls-1 fw-bold opacity-50">PERBARUI KONTEN ANDA UNTUK MEMASTIKAN KUALITAS TERBAIK.</p>
    </div>
    <div class="d-flex gap-3">
        <a href="<?= base_url('admin/post') ?>" class="btn btn-light rounded-pill px-4 py-3 fw-800 small ls-1 border shadow-sm">CANCEL</a>
        <button type="submit" form="text-editor" name="status" value="<?= $post['status'] ?>" class="btn btn-primary rounded-pill px-5 py-3 fw-800 small ls-1 shadow-lg">SAVE CHANGES</button>
    </div>
</div>

<div class="card-modern shadow-lg border-0 reveal" style="transition-delay: 0.2s;">
    <div class="card-body p-4 p-md-5">
        <form action="<?= base_url('admin/post/' . $post['slug'] . '/edit') ?>" method="post" id="text-editor">
            <?= csrf_field() ?>
            
            <div class="mb-5">
                <label class="small fw-800 text-muted mb-3 ls-1 d-block">ARTICLE TITLE</label>
                <input type="text" name="title" class="form-control premium-input border-0 bg-light" 
                    value="<?= esc($post['title']) ?>" required style="font-size: 1.5rem; font-weight: 800;">
            </div>

            <div class="mb-5">
                <label class="small fw-800 text-muted mb-3 ls-1 d-block">CONTENT BODY</label>
                <textarea name="content" class="form-control premium-input border-0 bg-light" rows="12" 
                    style="line-height: 1.8;"><?= esc($post['content']) ?></textarea>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-4 pt-5 border-top">
                <div class="d-flex align-items-center gap-3">
                    <span class="small fw-800 text-muted ls-1">CURRENT STATUS:</span>
                    <?php if (strtolower($post['status']) === 'published'): ?>
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 small fw-800 border border-success border-opacity-25">PUBLISHED</span>
                    <?php else: ?>
                        <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-2 small fw-800 border border-warning border-opacity-25">DRAFT</span>
                    <?php endif; ?>
                </div>
                <div class="d-flex gap-3">
                    <button type="submit" name="status" value="draft" class="btn btn-light rounded-pill px-5 py-3 fw-800 small ls-1 border shadow-sm">
                        MOVE TO DRAFT
                    </button>
                    <button type="submit" name="status" value="published" class="btn btn-primary rounded-pill px-5 py-3 fw-800 small ls-1 shadow-lg group-hover-arrow">
                        🚀 UPDATE & PUBLISH <span class="arrow-transition ms-2">→</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .premium-input {
        border-radius: 24px !important;
        padding: 1.5rem !important;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .premium-input:focus {
        background-color: #fff !important;
        box-shadow: 0 15px 40px rgba(0,0,0,0.05) !important;
        transform: translateY(-5px);
    }
</style>

<?= $this->endSection() ?>