<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<!-- FLOATING HOME BUTTON -->
<div class="position-fixed top-0 start-0 m-4 z-3">
    <a href="<?= base_url() ?>"
        class="btn btn-light shadow-sm rounded-pill px-4 py-3 d-flex align-items-center gap-2 border-0">
        <span class="small fw-800">← BACK TO HOME</span>
    </a>
</div>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh; padding: 100px 0;">
    <div class="card-modern p-4 p-md-5 reveal shadow-lg border-0"
        style="max-width: 500px; width: 100%; border-radius: 40px !important; background: white;">
        <div class="text-center mb-5">
            <!-- BRAND ICON ANIMATED -->
            <div class="d-inline-flex align-items-center justify-content-center mb-4 bg-primary bg-opacity-10 p-3 rounded-circle brand-bounce"
                style="width: 80px; height: 80px;">
                <div
                    style="width: 18px; height: 18px; background: var(--primary); border-radius: 50%; box-shadow: 0 0 25px var(--primary-glow);">
                </div>
            </div>
            <h2 class="display-5 fw-800 mb-2">Login</h2>
        </div>

        <!-- AUTH MESSAGES -->
        <div class="px-2">
            <?= view('Myth\Auth\Views\_message_block') ?>
        </div>

        <form action="<?= url_to('login') ?>" method="post" class="mt-4 px-2">
            <?= csrf_field() ?>

            <div class="mb-4">
                <label class="small fw-800 text-muted mb-3 ls-1 d-block">EMAIL OR USERNAME</label>
                <input type="text" class="form-control premium-input <?= session('errors.login') ? 'is-invalid' : '' ?>"
                    name="login" value="<?= old('login') ?>" placeholder="Enter your credentials">
                <div class="invalid-feedback ps-2"><?= session('errors.login') ?></div>
            </div>

            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <label class="small fw-800 text-muted ls-1">PASSWORD</label>
                </div>
                <input type="password"
                    class="form-control premium-input <?= session('errors.password') ? 'is-invalid' : '' ?>"
                    name="password" placeholder="••••••••">
                <div class="invalid-feedback ps-2"><?= session('errors.password') ?></div>
            </div>

            <?php if ($config->allowRemembering): ?>
                <div class="mb-5 form-check d-flex align-items-center gap-3 ps-1">
                    <input type="checkbox" name="remember" class="form-check-input mt-0 custom-checkbox" id="remember"
                        <?= old('remember') ? 'checked' : '' ?>>
                    <label class="form-check-label small text-muted fw-bold opacity-75" for="remember">Keep me logged
                        in</label>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary w-100 py-4 shadow-lg group-hover-arrow">
                SIGN IN NOW <span class="arrow-transition ms-2">→</span>
            </button>

            <div class="text-center mt-5">
                <p class="small text-muted mb-0">New to MyBlog?
                    <a href="<?= url_to('register') ?>"
                        class="text-decoration-none fw-800 text-primary ms-1 hover-underline">CREATE ACCOUNT</a>
                </p>
            </div>
        </form>
    </div>
</div>

<style>
    .ls-2 {
        letter-spacing: 2.5px;
    }

    .ls-1 {
        letter-spacing: 1.5px;
    }

    .premium-input {
        background-color: #f8f9fa !important;
        border: 2px solid transparent !important;
        border-radius: 24px !important;
        padding: 1.2rem 1.8rem !important;
        font-weight: 500;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .premium-input:focus {
        background-color: #fff !important;
        border-color: var(--primary) !important;
        box-shadow: 0 15px 35px rgba(33, 150, 243, 0.08) !important;
        transform: translateY(-3px);
    }

    .brand-bounce {
        animation: bounce 3s ease-in-out infinite;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    .custom-checkbox {
        width: 22px !important;
        height: 22px !important;
        border-radius: 8px !important;
        border: 2px solid #eee !important;
        cursor: pointer;
    }

    .custom-checkbox:checked {
        background-color: var(--primary) !important;
        border-color: var(--primary) !important;
    }

    .hover-opacity-100:hover {
        opacity: 1 !important;
    }

    .hover-underline:hover {
        text-decoration: underline !important;
    }
</style>
<?= $this->endSection() ?>