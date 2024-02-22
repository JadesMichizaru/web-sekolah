<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- Informasi Umum -->
	<title>Nama Sekolah Official Web - Daftar Guru</title>

	<!-- Koleksi CSS -->
	<link href="../aset/paket/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="../aset/paket/css/sticky-footer.css" media="all" />
	<link rel="stylesheet" type="text/css" href="../aset/paket/css/icons.css" media="all" />
	<link rel="stylesheet" type="text/css" href="../aset/paket/css/style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="../aset/paket/css/animate.css" media="all" />
	<link rel="stylesheet" type="text/css" href="../aset/paket/css/onebyone.css" media="all" />

	<link href="../aset/css/utama.css" rel="stylesheet" />
	<link href="../simple-datatables/style.css" rel="stylesheet">

	<!-- Favicon -->
	<link rel="shortcut icon" href="aset/img/favicon.ico" />
	<style>
		.dashboard .recent-sales .dataTable-top {
			padding: 0 0 10px 0;
		}

		.dashboard .recent-sales .dataTable-bottom {
			padding: 10px 0 0 0;
		}
	</style>
</head>

<body>
	<div class="kerangka-website">
		<header id="header">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 kiri">
						<strong class="logo"><a href="index.html"><img src="aset/img/logo.png" alt="Logo"></a></strong>
					</div>
					<div class="col-sm-8 kanan">

						<section class="user-navigation">
							<div class="container">
								<div class="frame pull-right">
									<div class="form-search pull-right">
										<form action="404.html">
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
											<li><a href="http://fb.me/novaymawbowo" target="_blank"><span class="fa-icon-facebook-sign"></span></a></li>
											<li><a href="http://twitter.com/NovayMawbowo" target="_blank"><span class="fa-icon-twitter"></span></a></li>
											<li><a href="http://google.com/+NovayMawbowo" target="_blank"><span class="fa-icon-google-plus"></span></a></li>
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
													<li><a href="../atmin">Kurikulum</a></li>
													<li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Kesiswaan</a>
														<ul class="dropdown-menu">
															<li><a href="../daftar-siswa">Daftar Siswa</a></li>
															<li><a href="../daftar-guru">Daftar Guru &amp; Staff</a></li>
														</ul>
													</li>
													<li><a href="../galeri">Galeri</a></li>
													<li><a href="../buku-tamu">Buku Tamu</a></li>
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
					<h1>Daftar Siswa</h1>
				</div>
			</div>

			<div class="hold-breadcrumbs">
				<div class="container">
					<ol class="breadcrumb breadcrumb-site">
						<li><a href="../">Beranda</a></li>
						<li><a href="../daftar-guru">Daftar Guru &amp; Staff</a></li>
						<li class="active">Daftar Siswa</li>
					</ol>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<!-- content  start -->
						<div id="content">
							<?php
								// Include config file
								require_once "../config.php";

								// Attempt select query execution
								$sql = "SELECT * FROM student";
								if ($result = mysqli_query($link, $sql)) {
									if (mysqli_num_rows($result) > 0) {
										echo "<table class='table table-bordered table-striped table datatable'>";
										echo "<thead>";
										echo "<tr>";
										echo "<th>#</th>";
										echo "<th>Nama</th>";
										echo "<th>Kelas</th>";
										echo "<th>Gender</th>";
										echo "</tr>";
										echo "</thead>";
										echo "<tbody>";
										while ($row = mysqli_fetch_array($result)) {
											echo "<tr>";
											echo "<td>" . $row['id'] . "</td>";
											echo "<td>" . $row['name'] . "</td>";
											echo "<td>" . $row['class'] . "</td>";
											echo "<td>" . $row['gender'] . "</td>";
										}
										echo "</tbody>";
										echo "</table>";
										// Free result set
										mysqli_free_result($result);
									} else {
										echo "<p class='lead'><em>No records were found.</em></p>";
									}
								} else {
									echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
								}
								mysqli_close($link);
							?>
						</div>
						<!-- content  end -->
					</div>
					<div class="col-sm-3">
						<!-- sidebar  start -->
						<aside id="sidebar">
							<!--  categories start -->

							<!--  categories end -->
						</aside>
						<!-- sidebar  end -->
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
							<p>&copy; 2023 Hak Cipta Dilindungi. Develop oleh <a href="https://birohmatika.com/alif" target="_blank">Alif</a></p>
						</div>
						<div class="col-md-7 col-sm-6">
							<ul class="list list-inline pull-right">
								<li><a href="index.html">Beranda</a></li>
								<li><a href="kabar-sekolah.html">Kabar Sekolah</a></li>
								<li><a href="galeri.html">Galeri</a></li>
								<li><a href="buku-tamu.html">Buku Tamu</a></li>
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
	<script src="../aset/js/vanilla-tilt.js"></script>
	<script src="../js/main.js"></script>
	<script src="../simple-datatables/simple-datatables.js"></script>
	<script src="../tinymce/tinymce.min.js"></script>
	<script src="../tinymce/tinymce.js"></script>

	<!-- Template Main JS File -->
	<script src="../js/main.js"></script>

	<!--[if lte IE 9 ]>
			<script type="text/javascript" src="aset/paket/js/modernizr-1.7.min.js"></script>
			<script type="text/javascript" src="aset/paket/js/placeholder.js"></script>
		<![endif]-->
	<script>
		VanillaTilt.init(document.querySelector(".heheha"), {
			max: 25,
			speed: 3500
		});
		VanillaTilt.init(document.querySelector(""), {
			max: 25,
			speed: 3500
		});
	</script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<<script>
		AOS.init();
		AOS.init({
		once: true

		});
		</script>
</body>

</html>