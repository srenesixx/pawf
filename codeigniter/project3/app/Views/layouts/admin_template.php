<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/admin_navbar') ?>

<div class="admin-layout" style="min-height: 100vh; background-color: #f8f9fa;">
    <!-- SIDEBAR -->
    <?= $this->include('layouts/admin_sidebar') ?>

    <!-- MAIN CONTENT -->
    <main class="admin-main p-4 px-lg-5" style="margin-left: 280px; padding-top: 100px !important;">
        <?= $this->renderSection('content') ?>
    </main>
</div>

<?= $this->include('layouts/footer') ?>