<?= $this->extend('layouts/admin_template') ?>

<?= $this->section('content') ?>

<div class="mb-5 reveal">
    <h2 class="display-5 fw-800 mb-2">Write New Blog</h2>
    <p class="text-muted small ls-1 fw-bold opacity-50">BAGIKAN PEMIKIRAN ANDA DENGAN DUNIA MELALUI EDITOR YANG BERSIH.
    </p>
</div>

<div class="card-modern shadow-lg border-0 reveal" style="transition-delay: 0.2s;">
    <div class="card-body p-4 p-md-5">
        <form action="<?= base_url('admin/post/new') ?>" method="post" id="text-editor">
            <?= csrf_field() ?>

            <div class="mb-5">
                <label class="small fw-800 text-muted mb-3 ls-1 d-block">ARTICLE TITLE</label>
                <input type="text" name="title" class="form-control premium-input border-0 bg-light"
                    placeholder="Enter a catchy title..." required style="font-size: 1.5rem; font-weight: 800;">
            </div>

            <div class="mb-5">
                <label class="small fw-800 text-muted mb-3 ls-1 d-block">CONTENT BODY</label>
                <textarea name="content" class="form-control premium-input border-0 bg-light" rows="12"
                    placeholder="Start writing your story here..." style="line-height: 1.8;"></textarea>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-4 pt-5 border-top">
                <div class="text-muted small fw-bold">
                    <span class="text-primary">•</span> Drafts are automatically saved to your archive.
                </div>
                <div class="d-flex gap-3">
                    <button type="submit" name="status" value="draft"
                        class="btn btn-light rounded-pill px-5 py-3 fw-800 small ls-1 border shadow-sm">
                        Save as Draft
                    </button>
                    <button type="submit" name="status" value="published"
                        class="btn btn-primary rounded-pill px-5 py-3 fw-800 small ls-1 shadow-lg group-hover-arrow">
                        🚀 Publish Blog <span class="arrow-transition ms-2">→</span>
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
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05) !important;
        transform: translateY(-5px);
    }
</style>

<?= $this->endSection() ?>