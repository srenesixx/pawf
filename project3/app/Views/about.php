<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container py-5 mt-5 pt-lg-5">
    <div class="row justify-content-center align-items-center g-5">
        <div class="col-lg-5 reveal">
            <div class="position-relative">
                <div class="card border-0 shadow-lg p-3 rotate-card" style="border-radius: 40px !important;">
                    <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&q=80&w=800"
                        class="img-fluid" style="border-radius: 30px !important;" alt="About Image">
                </div>
                <div class="position-absolute bg-primary rounded-circle"
                    style="width: 100px; height: 100px; bottom: -20px; right: -20px; z-index: -1; opacity: 0.2;"></div>
            </div>
        </div>
        <div class="col-lg-6 reveal" style="transition-delay: 0.3s;">
            <h1 class="display-3 fw-800 mb-4">Crafting Stories in a <span class="text-gradient">Digital World.</span>
            </h1>
            <p class="lead text-muted mb-4">MyBlog adalah ruang di mana ide bertemu dengan estetika. Kami percaya bahwa
                setiap tulisan layak mendapatkan panggung yang indah dan terstruktur.</p>
            <p class="text-muted mb-5">Misi kami adalah menyediakan platform yang tidak hanya fungsional tetapi juga
                memberikan pengalaman visual yang menenangkan bagi setiap pembaca.</p>

            <div class="row g-4">
                <div class="col-sm-6">
                    <div class="card h-100 border-0 shadow-sm p-4 hover-lift" style="border-radius: 32px !important;">
                        <h4 class="fw-800 mb-2">Elegant</h4>
                        <p class="small text-muted mb-0">Desain yang memanjakan mata.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card h-100 border-0 shadow-sm p-4 hover-lift" style="border-radius: 32px !important;">
                        <h4 class="fw-800 mb-2">Responsive</h4>
                        <p class="small text-muted mb-0">Terjangkau dari mana saja.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .rotate-card {
        transform: rotate(-3deg);
        transition: 0.5s;
    }

    .rotate-card:hover {
        transform: rotate(0deg);
    }

    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
    }
</style>
<?= $this->endSection() ?>