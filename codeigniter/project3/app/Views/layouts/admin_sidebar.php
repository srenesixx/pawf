<aside class="admin-sidebar bg-white border-end d-none d-lg-flex flex-column"
    style="width: 280px; position: fixed; top: 0; left: 0; bottom: 0; height: 100vh; z-index: 1050; padding-top: 40px; padding-left: 1.5rem; padding-right: 1.5rem; padding-bottom: 3rem;">
    <div class="mb-5 text-center">
        <span class="text-uppercase small fw-800 text-muted ls-1 d-block" style="letter-spacing: 2px;">MANAGEMENT</span>
    </div>
    <nav class="nav flex-column gap-2">
        <a href="<?= base_url('admin/post') ?>"
            class="nav-link py-3 px-4 d-flex align-items-center gap-3 <?= (url_is('admin/post') ? 'active-admin' : 'text-muted') ?>"
            style="border-radius: 100px !important;">
            <span>📄</span> Posts Archive
        </a>
        <a href="<?= base_url('admin/post/new') ?>"
            class="nav-link py-3 px-4 d-flex align-items-center gap-3 <?= (url_is('admin/post/new') ? 'active-admin' : 'text-muted') ?>"
            style="border-radius: 100px !important;">
            <span>✍️</span> Create New Entry
        </a>
        <a href="<?= base_url('admin/setting') ?>"
            class="nav-link py-3 px-4 d-flex align-items-center gap-3 <?= (url_is('admin/setting') ? 'active-admin' : 'text-muted') ?>"
            style="border-radius: 100px !important;">
            <span>⚙️</span> Admin Settings
        </a>
    </nav>

    <div class="mt-auto pt-4 border-top">
        <a href="<?= base_url('logout') ?>"
            class="btn btn-danger bg-opacity-10 text-light border-0 w-100 py-3 rounded-pill fw-800 ls-1 shadow-sm hover-lift">
            LOGOUT
        </a>
    </div>
</aside>