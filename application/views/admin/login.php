<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->
<div class="container">
    <div class="flash-data" data-type="<?= $this->session->flashdata('type'); ?>" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="wrapper">
        <form action="<?= base_url('auth/login') ?>" method="post" class="form-signin">
            <h3 class="form-signin-heading">Login</h3>
            <hr class="colorgraph"><br>

            <input type="text" class="form-control" name="username" placeholder="Username" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="setCustomValidity('')">
            <input type="password" class="form-control" name="password" placeholder="Password" required required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')">

            <button class="btn btn-lg btn-primary btn-block" type="Submit">Login</button>
        </form>
    </div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="<?= base_url() ?>assets/admin/dist/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>assets/admin/dist/js/myswal.js"></script>

<style>
    .wrapper {
        margin-top: 80px;
        margin-bottom: 20px;
    }

    .form-signin {
        max-width: 420px;
        padding: 30px 38px 66px;
        margin: 0 auto;
        background-color: #eee;
        border: 3px dotted rgba(0, 0, 0, 0.1);
    }

    .form-signin-heading {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
    }

    input[type="text"] {
        margin-bottom: 0px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    input[type="password"] {
        margin-bottom: 20px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .colorgraph {
        height: 7px;
        border-top: 0;
        background: #c4e17f;
        border-radius: 5px;
        background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    }
</style>