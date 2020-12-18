<div class="hero-wrap hero-bread" style="background-image: url(<?= base_url('assets/images/bg_5.jpg') ?>);">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
                <h1 class="mb-0 bread">Product</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section">
    <div class="container">

        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Featured Products</span>
                <h2 class="mb-4">Our Products</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <li><a href="<?= base_url('home/shop') ?>">All</a></li>
                    <li><a href="<?= base_url('kategori/nugget') ?>">Nugget</a></li>
                    <li><a href="<?= base_url('kategori/sosis') ?>">Sosis</a></li>
                    <li><a href="<?= base_url('kategori/kentang') ?>">French Fries</a></li>
                    <li><a href="<?= base_url('kategori/bakso') ?>" class="active">Meat Balls</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <?php foreach ($bakso as $b) : ?>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="rounded mx-auto d-block" src="<?= base_url() . '/assets/images/uploads/' . $b->image ?>" style="width:200px; height:200px;">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h5><a href="#"><?= $b->name_product ?></a></h5>
                            <small><?= $b->information ?></small>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price">Rp . <?= number_format($b->price, 0, ',', '.')  ?></span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <?= anchor('home/addcart/' . $b->id_product, '<div class="buy-now d-flex justify-content-center align-items-center mt-2">
                                             </div><i class="ion-ios-cart"></i>') ?>
                                    <?= anchor('home/detail/' . $b->id_product, '<div class="buy-now d-flex justify-content-center align-items-center mt-2">
                                             </div><i class="ion-ios-search"></i>') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<div class="col text-center">
    <div class="block-27">
        <ul>
            <li><a href="#">&lt;</a></li>
            <li class="active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&gt;</a></li>
        </ul>
    </div>
</div>