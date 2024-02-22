<!-- Bagian PHP -->
<?php
// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$name = $msg = $telp = "";
$name_err = $telp_err = $msg_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Tolong masukkan nama anda!";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Tolong Isi nama yang benar";
    } else{
        $name = $input_name;
    }
	// Validate salary
	$input_telp = trim($_POST["telp"]);
	if(empty($input_telp)){
		$telp_err = "Tolong Masukan Nomor Telepon Yang Benar!.";
	} elseif(!ctype_digit($input_telp)){
		$telp_err = "Tolong Untuk memasukkan nomor bukan tulisan";
	} else{
		$telp = $input_telp;
	}

    // Validate address
    $input_msg = trim($_POST["message"]);
    if(empty($input_msg)){
        $msg_err = "Tolong isikan Pesan!.";
    } else{
        $msg = $input_msg;
    }


    // Check input errors before inserting in database
    if(empty($name_err) && empty($telp_err) && empty($msg_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO mail (name, telp, message) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_telp, $param_message);

            // Set parameters
            $param_name = $name;
            $param_telp = $telp;
			$param_message= $msg;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../buku-tamu");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>
<!-- Bagian HTML -->
<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<!-- Informasi Umum -->
		<title>Nama Sekolah | Kontak</title>
		
		<!-- Koleksi CSS -->
		<link href="../aset/paket/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" href="../aset/paket/css/sticky-footer.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../aset/paket/css/icons.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../aset/paket/css/style.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../aset/paket/css/animate.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../aset/paket/css/onebyone.css" media="all" />
		<link href="../aset/css/utama.css" rel="stylesheet" />

		<!-- Favicon -->
		<link rel="shortcut icon" href="aset/img/favicon.ico" />
	</head>
	<body>
		<div class="kerangka-website">
			<header id="header">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 kiri">
							<strong class="logo"><a href=""><img src="../aset/img/..." alt="Logo"></a></strong>
						</div>
						<div class="col-sm-8 kanan">

							<section class="user-navigation">
								<div class="container">
									<div class="frame pull-right">
										<div class="form-search pull-right">
											<form action="../404">
												<fieldset>
													<div class="field-search">
														<input type="text" class="form-control input-sm" placeholder="Cari" />
														<button class="btn-search" type="submit"><span class="fa-icon-search"></span></button>
													</div>
												</fieldset>
											</form>
										</div>
										<div class="profiles-box pull-right active">
											<a href="#" class="link-profiles pull-left">Akun Resmi</a>
											<ul class="tools tools-middle pull-left">
												<li><a href="http://fb.me/" target="_blank"><span class="fa-icon-facebook-sign"></span></a></li>
												<li><a href="http://twitter.com/" target="_blank"><span class="fa-icon-twitter"></span></a></li>
												<li><a href="http://google.com" target="_blank"><span class="fa-icon-google-plus"></span></a></li>
											</ul>
										</div>
									</div>
								</div>
							</section>

							<section class="header-section">
								<div class="container">
									<div class="row">
										<div class="col-sm-12">
											<!--  navbar start -->
											<nav class="navbar navbar-default navbar-business" role="navigation">
												<div class="navbar-header">
													<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
														<span class="sr-only">Toggle Navigasi</span>
														Menu Navigasi
														<span class="wrap-icon pull-left">
															<span class="icon-bar"></span>
															<span class="icon-bar"></span>
															<span class="icon-bar"></span>
														</span>
													</button>
												</div>
												<div class="collapse navbar-collapse">
													<span class="nook">&nbsp;</span>
													<ul class="nav navbar-nav">
														<li><a href="../">Beranda</a></li>
														<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Profil Sekolah</a>
														    <ul class="dropdown-menu">
														      <li><a href="../identitas">Identitas</a></li>
														      <li><a href="../visi-misi">Visi &amp; Misi</a></li>
														      <li><a href="../sarana-prasarana">Sarana &amp; Prasarana</a></li>
														      <li><a href="../program-kegiatan">Program &amp; Kegiatan </a></li>
														      <li><a href="../prestasi">Prestasi</a></li>
														    </ul>
													    </li>
														<li><a href="#">Kurikulum</a></li>
														<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Kesiswaan</a>
														    <ul class="dropdown-menu">
														      <li><a href="../daftar-siswa">Daftar Siswa</a></li>
														      <li><a href="../daftar-guru">Daftar Guru &amp; Staff</a></li>
														      <li><a href="../daftar-kelas">Daftar Kelas</a></li>
														    </ul>
													    </li>
														<li><a href="../galeri">Galeri</a></li>
														<li class="active"><a href="../buku-tamu">Buku Tamu</a></li>
														<li class="last">&nbsp;</li>
													</ul>
													<!--  frame pull-right start -->
													<div class="frame">
														<div class="form-search pull-right">
															<form action="../404">
																<fieldset>
																	<div class="field-search">
																		<input type="text" class="form-control input-sm" placeholder="Cari" />
																		<button class="btn-search" type="submit"><span class="fa-icon-search"></span></button>
																	</div>
																</fieldset>
															</form>
														</div>
														<div class="profiles-box pull-left active">
															<ul class="tools tools-middle pull-right">
																<li><a href="#"><span class="fa-icon-facebook-sign"></span></a></li>
															</ul>
														</div>
													</div>
												</div>
											</nav>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</header>

			<!-- Bagian Tengah -->
			<div class="tengah" id="main">

				<div class="judul-halaman">
					<div class="container">
						<h1>Buku Tamu</h1>
					</div>
				</div>

				<div class="hold-breadcrumbs">
					<div class="container">
						<ol class="breadcrumb breadcrumb-site">
							<li><a href="../">Beranda</a></li>
							<li class="active">Buku Tamu</li>
						</ol>
					</div>
				</div>

				<div class="container">
					<div class="row">
						<div class="col-md-7 col-sm-6">

							


						</div>
						<div class="col-md-5 col-sm-6">
							<h2 style="font-family:Open Sans"><i class="fa-icon-envelope"></i> Isi Buku Tamu </h2>
							<div class="form-details">
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
									<fieldset>
										<div class="field-text field-middle <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
											<input type="text" name="name" class="form-control" placeholder="Nama" value="<?php echo $name; ?>">
											<span class="help-block"><?php echo $name_err;?></span>
										</div>
										<div class="field-text field-middle <?php echo (!empty($telp_err)) ? 'has-error' : ''; ?>">
											<input type="number" class="form-control" name="telp" placeholder="No telp" value="<?php echo $telp; ?>">
											<span class="help-block"><?php echo $telp_err;?></span>
										</div>
										<div class="tarea tarea-middle <?php echo (!empty($msg_err)) ? 'has-error' : ''; ?>">
											<textarea name="message"  class="form-control" cols="8" rows="10" placeholder="Pesan"><?php echo $msg; ?></textarea>
											<span class="help-block"><?php echo $msg_err;?></span>
										</div>
										<button class="btn btn-info btn-details btn-blue-light" type="submit">Kirim Pesan</button>
									</fieldset>
								</form>
							</div>
							<div class="box-address" style="background: #0E487A;">
								<span class="im-icon-home-3"></span>
								<address>
									<ul class="contacts">
										<li>Nama Sekolah,</li>
										<li>Alamat Jalan</li>
										<li>Phone : ?</li>
										<li>Fax : ?</li>
										<li>E-Mail: <a href="mailto:example@yahoo.com">Example@yahoo.com</a></li>
									</ul>
								</address>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Bagian Bawah -->
			<div class="bawah">
				<footer id="footer">
					<div class="container">
						<div class="row">
							<div class="col-md-5 col-sm-6">
								<p>&copy;</p>
							</div>
							<div class="col-md-7 col-sm-6">
								<ul class="list list-inline pull-right">
									<li><a href="../">Beranda</a></li>
									<li><a href="../kabar-sekolah">Kabar Sekolah</a></li>
									<li><a href="../galeri">Galeri</a></li>
									<li><a href="../buku-tamu">Buku Tamu</a></li>
									<li><a href="#top">Kembali Ke Atas</a></li>
								</ul>
							</div>
						</div>
					</div>
				</footer>
			</div>
			<!-- Penutup Bagian Bawah -->
		</div>

		<!-- Koleksi Javascript -->
		<script type="text/javascript" src="../aset/paket/js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="../aset/paket/js/bootstrap.min.js"></script>
		<script src="../aset/paket/js/less.js" type="text/javascript"></script>
		<script type="text/javascript" src="../aset/paket/js/jquery.main.js"></script>
		<!--[if lte IE 9 ]>
			<script type="text/javascript" src="aset/paket/js/modernizr-1.7.min.js"></script>
			<script type="text/javascript" src="aset/paket/js/placeholder.js"></script>
		<![endif]-->

	</body>
</html>