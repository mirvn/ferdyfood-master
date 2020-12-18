<div class="hero-wrap hero-bread" style="background-image: url(<?= base_url('assets/images/bg_4.jpg') ?>);">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('home') ?>">Home</a></span> <span class="mr-2"><a href="<?= base_url('home/checkout') ?>">Checkout</a></span></p>
                <h1 class="mb-0 bread">Product Checkout</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 ftco-animate">
                <form method="post" action="<?= base_url('home/proses') ?> ">
                    <h3 class="mb-4 billing-heading">Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">Name</label>
                                <input type="text" name="nama" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="streetaddress">Street Address</label>
                                <input type="text" name="alamat" class="form-control" placeholder="House number and street name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="lastname">Phone</label>
                                <input type="text" name="no_telp" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country">Services</label>
                                <div class="select-wrap">

                                    <select name="" id="" class="form-control">
                                        <option value="">JNE</option>
                                        <option value="">J & T</option>
                                        <option value="">Ninja Express</option>
                                        <option value="">COD</option>
                                        <option value="">Ambil Ditempat</option>
                                        <option value="">Gojek</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="col-xl-5">
                <div class="row mt-5 pt-3">
                    <div class="col-md-12 d-flex mb-5">
                        <div class="cart-detail cart-total p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Cart Total</h3>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span><?php $grand_total = 0;
                                        if ($cart = $this->cart->contents()) {
                                            foreach ($cart as $items) {
                                                $grand_total = $grand_total + $items['subtotal'];
                                            }
                                            echo "Rp. " . number_format($grand_total, 0, ',', '.');
                                        }
                                        ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="cart-detail p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Payment Method</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <select name="" id="" class="form-control">
                                        <option value="">BCA - XXXXXXXX</option>
                                        <option value="">BRI - XXXXXXXX</option>
                                        <option value="">BNI - XXXXXXXX</option>
                                        <option value="">Cash Tunai</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3 py-3 px-4">Place an order </button>
                        </div>
                    </div>
                </div>

            </div> <!-- .col-md-8 -->
            </form><!-- END -->
        </div>
    </div>
</section> <!-- .section -->