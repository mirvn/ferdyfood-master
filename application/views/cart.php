<div class="hero-wrap hero-bread" style="background-image: url(<?= base_url('assets/images/bg_5.jpg') ?>);">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('home') ?>">Home</a></span> <span class="mr-2"><a href="<?= base_url('home/detailcart') ?>">Cart</a></span></p>
                <h1 class="mb-0 bread">Product Cart</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>Image</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->cart->contents() as $items) : ?>
                                <tr class="text-center">
                                    <td class="product-remove"><a href="<?= base_url('') . 'home/deleteitem/' . $items['rowid'] ?>"><span class="ion-ios-close"></span></a></td>

                                    <td class="image-prod">
                                        <img width="100px" src="<?= base_url(''); ?>assets/images/uploads/<?= $items['image']; ?>" alt="Image" class="img-fluid">
                                    </td>

                                    <td class="product-name">
                                        <h3><?= $items['name'] ?></h3>

                                    </td>

                                    <td class="price">Rp.<?= number_format($items['price'], 0, ',', '.') ?></td>

                                    <td class="jumlah">
                                        <div class="input-group mb-3">
                                            <input type="text" name="qty" class="quantity form-control input-number" value="<?= $items['qty'] ?>" min="1" max="100">
                                        </div>
                                    </td>

                                    <td class="total">Rp .<?= number_format($items['subtotal'], 0, ',', '.') ?></td>
                                </tr><!-- END TR-->
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-lg-2 mt-4 cart-wrap ftco-animate">
                <p><a href="<?= base_url('home/deletecart'); ?>" class="btn btn-danger py-3 px-4">Delete</a></p>
            </div>
            <div class="col-lg-6 mt-4 cart-wrap ftco-animate">
                <p><a href="<?= base_url('home'); ?>" class="btn btn-success py-3 px-4">continue shopping</a></p>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>Rp . <?= number_format($this->cart->total(), 0, ',', '.'); ?></span>
                    </p>
                </div>
                <p><a href="<?= base_url('home/checkout'); ?>" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>

            </div>
        </div>
    </div>
</section>