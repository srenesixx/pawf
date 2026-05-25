<?= $this->extend('layouts/admin_template') ?>

<?= $this->section('content') ?>

<div class="mb-5">
    <h2 class="font-serif fw-bold h1">Site Parameters</h2>
    <p class="text-muted small mb-0">Sesuaikan identitas dan konfigurasi dasar website Anda.</p>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="clean-card shadow-sm border-0">
            <form action="<?= base_url('admin/setting') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="row g-4">
                    <?php foreach ($settings as $setting): ?>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted"><?= strtoupper(str_replace('_', ' ', $setting['setting_key'])) ?></label>
                            <input type="text" name="settings[<?= $setting['id'] ?>]" class="form-control border-0 bg-light p-3 rounded-4" value="<?= esc($setting['setting_value']) ?>">
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-5 pt-4 border-top text-end">
                    <button type="submit" class="btn btn-clean btn-blue py-3 px-5 shadow-sm">💾 Update Configuration</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="clean-card bg-blue-light border-0 shadow-sm">
            <h4 class="font-serif mb-4">System Info</h4>
            <div class="d-flex flex-column gap-3">
                <div class="d-flex justify-content-between small">
                    <span class="text-muted">Status:</span>
                    <span class="fw-bold text-primary">Active</span>
                </div>
                <div class="d-flex justify-content-between small">
                    <span class="text-muted">Version:</span>
                    <span class="fw-bold">v3.2.0</span>
                </div>
                <div class="d-flex justify-content-between small">
                    <span class="text-muted">Last Sync:</span>
                    <span class="fw-bold text-muted"><?= date('H:i') ?></span>
                </div>
            </div>
            <div class="mt-5 pt-4 border-top border-white">
                <p class="small text-muted mb-0">Website ini dikonfigurasi untuk performa optimal dan desain yang bersih.</p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>