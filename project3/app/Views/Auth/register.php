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
        style="max-width: 650px; width: 100%; border-radius: 40px !important; background: white;">
        <div class="text-center mb-5">
            <!-- BRAND ICON ANIMATED -->
            <div class="d-inline-flex align-items-center justify-content-center mb-4 bg-primary bg-opacity-10 p-3 rounded-circle brand-bounce"
                style="width: 80px; height: 80px;">
                <div
                    style="width: 18px; height: 18px; background: var(--primary); border-radius: 50%; box-shadow: 0 0 25px var(--primary-glow);">
                </div>
            </div>
            <h2 class="display-5 fw-800 mb-2">Register</h2>
        </div>

        <!-- AUTH MESSAGES -->
        <div class="px-2">
            <?= view('Myth\Auth\Views\_message_block') ?>
        </div>

        <form action="<?= url_to('register') ?>" method="post" class="mt-4 px-2">
            <?= csrf_field() ?>

            <div class="row g-4">
                <div class="col-md-6 mb-2">
                    <label class="small fw-800 text-muted mb-3 ls-1 d-block">EMAIL ADDRESS</label>
                    <input type="email"
                        class="form-control premium-input <?= session('errors.email') ? 'is-invalid' : '' ?>"
                        name="email" value="<?= old('email') ?>" placeholder="name@email.com">
                    <div class="invalid-feedback ps-2"><?= session('errors.email') ?></div>
                </div>
                <div class="col-md-6 mb-2">
                    <label class="small fw-800 text-muted mb-3 ls-1 d-block">USERNAME</label>
                    <input type="text"
                        class="form-control premium-input <?= session('errors.username') ? 'is-invalid' : '' ?>"
                        name="username" value="<?= old('username') ?>" placeholder="YourUniqueHandle">
                    <div class="invalid-feedback ps-2"><?= session('errors.username') ?></div>
                </div>
            </div>

            <div class="row g-4 mt-1">
                <div class="col-md-6 mb-2">
                    <label class="small fw-800 text-muted mb-3 ls-1 d-block">PASSWORD</label>
                    <input type="password"
                        class="form-control premium-input <?= session('errors.password') ? 'is-invalid' : '' ?>"
                        name="password" autocomplete="off" placeholder="••••••••">
                    <div class="invalid-feedback ps-2"><?= session('errors.password') ?></div>
                </div>
                <div class="col-md-6 mb-2">
                    <label class="small fw-800 text-muted mb-3 ls-1 d-block">CONFIRM PASSWORD</label>
                    <input type="password"
                        class="form-control premium-input <?= session('errors.pass_confirm') ? 'is-invalid' : '' ?>"
                        name="pass_confirm" autocomplete="off" placeholder="••••••••">
                    <div class="invalid-feedback ps-2"><?= session('errors.pass_confirm') ?></div>
                </div>
            </div>

            <div class="mt-5">
                <button type="submit" class="btn btn-primary w-100 py-4 shadow-lg group-hover-arrow">
                    CREATE ACCOUNT NOW <span class="arrow-transition ms-2">→</span>
                </button>
            </div>

            <div class="text-center mt-5">
                <p class="small text-muted mb-0">Already have an account?
                    <a href="<?= url_to('login') ?>"
                        class="text-decoration-none fw-800 text-primary ms-1 hover-underline">SIGN IN HERE</a>
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

    .hover-underline:hover {
        text-decoration: underline !important;
    }
</style>
<?= $this->endSection() ?>