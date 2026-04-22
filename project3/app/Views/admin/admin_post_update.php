<?= $this->extend('layouts/admin_template') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-6">Edit Post</h1>
        </div>
    </div>

    <form action="" method="post" id="text-editor">
        <input type="hidden" name="id" value="<?= $post['id'] ?>" />

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Post title" value="<?= $post['title'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Write a great post!"><?= $post['content'] ?></textarea>
        </div>

        <div class="mb-3">
            <button type="submit" name="status" value="published" class="btn btn-primary">Publish</button>
            <button type="submit" name="status" value="draft" class="btn btn-secondary">Save to Draft</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>