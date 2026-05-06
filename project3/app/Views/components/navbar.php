<?php helper('auth'); 
$uri = service('uri');
$current_path = $uri->getPath();
?>

<nav class="navbar navbar-expand-lg fixed-top shadow-none bg-white bg-opacity-75" style="backdrop-filter: blur(15px); border-bottom: 1px solid rgba(0,0,0,0.05); padding: 1.2rem 0;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="<?= base_url() ?>">
            <div style="width: 12px; height: 12px; background: var(--primary); border-radius: 50%; box-shadow: 0 0 15px var(--primary-glow);"></div>
            <span class="fw-800" style="font-family: 'Outfit', sans-serif; font-size: 1.6rem; letter-spacing: -1px;">My<span class="text-primary">Blog</span></span>
        </a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center gap-2">
                <li class="nav-item"><a class="nav-link <?= url_is('') ? 'active' : '' ?>" href="<?= base_url() ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link <?= url_is('post*') ? 'active' : '' ?>" href="<?= base_url('post') ?>">Blog</a></li>
                <li class="nav-item"><a class="nav-link <?= url_is('about') ? 'active' : '' ?>" href="<?= base_url('about') ?>">About</a></li>
                <li class="nav-item"><a class="nav-link <?= url_is('faqs') ? 'active' : '' ?>" href="<?= base_url('faqs') ?>">FAQ</a></li>
                <li class="nav-item"><a class="nav-link <?= url_is('contact') ? 'active' : '' ?>" href="<?= base_url('contact') ?>">Contact</a></li>
                <li class="nav-item ms-lg-3">
                    <?php if (logged_in()): ?>
                        <a href="<?= base_url('admin/post') ?>" class="btn btn-primary px-4">Dashboard</a>
                    <?php else: ?>
                        <a href="<?= base_url('login') ?>" class="btn btn-outline-primary px-4">Login</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>