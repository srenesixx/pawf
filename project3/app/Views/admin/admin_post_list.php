<?= $this->extend('layouts/admin_template') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-6">Blog &gt; Admin</h1>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?= $post['id'] ?></td>
                        <td>
                            <strong><?= $post['title'] ?></strong>
                            <br>
                            <small class="text-muted"><?= $post['created_at'] ?></small>
                        </td>
                        <td>
                            <?php if ($post['status'] === 'published'): ?>
                                <small class="text-success"><?= $post['status'] ?></small>
                            <?php else: ?>
                                <small class="text-muted"><?= $post['status'] ?></small>
                            <?php endif ?>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/post/' . $post['id'] . '/preview') ?>" class="btn btn-sm btn-outline-secondary" target="_blank">Preview</a>
                            <a href="<?= base_url('admin/post/' . $post['id'] . '/edit') ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <a href="#" data-href="<?= base_url('admin/post/' . $post['id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="confirm-dialog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h2 class="h2">Are you sure?</h2>
                    <p>The data will be deleted and lost forever</p>
                </div>
                <div class="modal-footer">
                    <a href="#" id="delete-button" class="btn btn-danger">Delete</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmToDelete(el) {
        document.getElementById('delete-button').setAttribute('href', el.dataset.href);
        const myModal = new bootstrap.Modal(document.getElementById('confirm-dialog'), {
            keyboard: false
        });
        myModal.show();
    }
</script>
<?= $this->endSection() ?>