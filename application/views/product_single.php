<div class="hero-wrap hero-bread" style="background-image: url(<?= base_url('assets/images/bg_5.jpg') ?>);">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
                <h1 class="mb-0 bread">Product Single</h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section">
    <div class="container">
        <?php foreach ($product as $p) : ?>
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="<?= base_url() . '/assets/images/uploads/' . $p->image ?>" class="image-popup"><img src="<?= base_url() . '/assets/images/uploads/' . $p->image ?>" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3><?= $p->name_product ?></h3>

                    <p class="price"><span>Rp. <?= number_format($p->price, 0, ',', '.') ?></span></p>
                    <p><?= $p->information ?>
                    </p>
                    <div class="row mt-4">
                        <div class="w-100"></div>
                    </div>
                    <p>
                        <?= anchor('home/addcart/' . $p->id_product, '<div class="btn btn-toolbar-light py-3 px-5">Add to Cart</div>') ?>
                        <a href="<?= base_url('home/index') ?>">
                            <div class="btn btn-sm btn-danger py-3 px-5">Back</div>
                        </a>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>