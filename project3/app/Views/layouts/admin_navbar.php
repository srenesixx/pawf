<?php helper('auth'); ?>

<nav class="navbar navbar-expand-lg navbar-clean fixed-top bg-white border-bottom"
    style="margin-left: 280px; z-index: 1030; height: 80px;">
    <div class="container-fluid px-4 px-lg-5">
        <a class="navbar-brand font-serif" href="<?= base_url() ?>" style="font-size: 1.5rem; color: var(--text-dark);">
            Admin<span style="color: var(--accent-pink);">Panel</span>
        </a>

        <div class="ms-auto d-flex align-items-center gap-3">
            <div class="text-end d-none d-sm-block">
                <div class="small fw-bold" style="color: var(--text-dark);"><?= user()->username ?></div>
                <div class="text-muted" style="font-size: 0.7rem;">Super Administrator</div>
            </div>
            <div class="rounded-circle bg-blue-light d-flex align-items-center justify-content-center"
                style="width: 45px; height: 45px; border: 2px solid white; shadow: var(--card-shadow);">
                <span class="fw-bold text-primary">A</span>
            </div>
        </div>
    </div>
</nav>