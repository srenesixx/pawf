<?= $this->extend('layouts/admin_template') ?>

<?= $this->section('content') ?>

<div class="row align-items-center mb-5 reveal">
    <div class="col-lg-6">
        <h2 class="font-serif fw-bold h1 mb-1">Posts Archive</h2>
        <p class="text-muted small mb-0 fw-bold ls-1 opacity-50">KELOLA SEMUA ARTIKEL ANDA DALAM SATU TAMPILAN BERSIH.</p>
    </div>
    <div class="col-lg-6 mt-4 mt-lg-0">
        <div class="d-flex gap-3 justify-content-lg-end">
            <form action="<?= base_url('admin/post') ?>" method="get" class="flex-grow-1" style="max-width: 400px;">
                <div class="input-group bg-white rounded-pill p-1 shadow-sm border">
                    <input type="text" name="keyword" class="form-control border-0 bg-transparent ps-3" 
                           placeholder="Search titles..." value="<?= esc($keyword) ?>">
                    <button class="btn btn-primary rounded-pill px-4" type="submit">Search</button>
                </div>
            </form>
            <a href="<?= base_url('admin/post/new') ?>" class="btn btn-primary rounded-pill px-4 shadow-lg fw-800 d-flex align-items-center gap-2">
                <span>+</span> New Post
            </a>
        </div>
    </div>
</div>

<div class="clean-card p-0 shadow-sm border-0">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr class="bg-light">
                    <th class="py-4 border-0 small text-uppercase text-muted fw-800 ls-1 text-center">Title</th>
                    <th class="py-4 border-0 small text-uppercase text-muted fw-800 ls-1 text-center">Date Published</th>
                    <th class="py-4 border-0 small text-uppercase text-muted fw-800 ls-1 text-center">Status</th>
                    <th class="py-4 border-0 small text-uppercase text-muted fw-800 ls-1 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr class="align-middle">
                        <td class="py-4 fw-800 text-dark text-center"><?= esc($post['title']) ?></td>
                        <td class="py-4 text-muted small text-center"><?= date('D, d M Y', strtotime($post['created_at'])) ?></td>
                        <td class="py-4 text-center">
                            <?php if (strtolower($post['status']) === 'published'): ?>
                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 small fw-800 border border-success border-opacity-25">Published</span>
                            <?php else: ?>
                                <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-2 small fw-800 border border-warning border-opacity-25">Draft</span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="<?= base_url('admin/post/' . $post['slug'] . '/preview') ?>"
                                    class="btn btn-sm btn-light text-primary rounded-pill px-3 fw-bold">detail</a>
                                <a href="<?= base_url('admin/post/' . $post['slug'] . '/edit') ?>"
                                    class="btn btn-sm btn-light rounded-pill px-3 fw-bold">Edit</a>
                                <a href="<?= base_url('admin/post/' . $post['slug'] . '/delete') ?>"
                                    class="btn btn-sm btn-light text-danger rounded-pill px-3 fw-bold"
                                    onclick="return confirm('Hapus artikel ini?')">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>