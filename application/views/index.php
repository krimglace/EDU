<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>EDULAB</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-warning">
	<div class="container"><br><br><br><br><br>
		<div class="row justify-content-center">
			<div class="col-xl-5 col-lg-6 col-md-5">
				<div class="row">
                    <div class="col-lg-12 bg-secondary" style="border-radius: 50px">
                        <div class="p-3">
                            <div>  
                                <img src="<?= base_url('assets/mystyle/img/Edumant1.png') ?>" width="80px" class="col-3 mt-5" style="float: left;">
                                <?= $this->session->flashdata('pesan') ?>
                                <div class="col-8" style="float: left;" >
                                    <div class="text-center">
                                        <img src="<?= base_url('assets/mystyle/img/LogoEdulab.png') ?>" width="150px">
                                    </div>
                                    <form method="post" action="<?= base_url('login/proses_login') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" name="username_admin">
                                            <?= form_error('username_admin', '<div class="text-danger small ml-3">','</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control mt-2" placeholder="Password" name="password_admin">
                                            <?php echo form_error('password_admin', '<div class="text-danger small ml-3">','</div>') ?>
                                    </div>
                                   <button class="btn btn-primary btn-user btn-block mt-2">Login</button>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</body>
</html>