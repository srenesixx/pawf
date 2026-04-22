
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">MyBlog</a>
        <button class="navbar-toggler" type="button" data-bs-
            toggle="collapse" data-bs-target="#navbarNav" aria-
            controls="navbarNav" aria-expanded="false" aria-label="Togglenavigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?=
                                                base_url('admin/post') ?>">Blog</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url('admin/post/new') ?>"
                        class="btn btn-primary mr-3">New Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=
                                                base_url('admin/setting') ?>">Setting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=
                                                base_url('auth/logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>