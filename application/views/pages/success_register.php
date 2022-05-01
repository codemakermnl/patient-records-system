<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vaccine Monitoring and Profiling System | Login</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/layouts.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/standard.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/category.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/datatables.min.css">

<!-- 	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/profile.css"> -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/sign_up.css">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<!-- 	<script src="<?=base_url()?>assets/js/validate.js"></script> -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/datatables.min.js"></script>




	<style>


	</style>
</head>

<body>
	<div class="nav-top container-fluid">
		<div class="row" >
			<img class="nav-logo mx-3" src="<?=base_url()?>assets/img/logos/pnp_logo.png">
			<div class="col col-md-8 ">
				<div class="div-nav-heading" >
					<span class="nav-heading-top">
						<!-- PNP CAMP CRAME -->
					</span>
				</div>
				<div class="div-nav-heading" >
					<span class="nav-title">
						<b>VACCINE MONITORING AND PROFILING SYSTEM</b>
					</span>
				</div>

			</div>
		</div>

		<div class="row" >
			<div class="col col-md-8"> 

			</div>	
		</div>

	</div>
	<nav class="navbar navbar-expand-sm navbar-dark bg-custom">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExample03">
			<ul class="navbar-nav mr-auto">

			</ul>
	</div>
</nav>

<div class="page-body">
	<div class="container-fluid">
	    <div class="row justify-content-center">
	        <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
	            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
	                <h1 id="heading">Sign Up Successful!</h1>
	                <p><a href="<?=base_url()?>signUp">Sign Up</a> again.</p>
	            
	            </div>
	        </div>
	    </div>
	</div>
</div>


<script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>


<script type="text/javascript">



        
</script>




<footer class="footer">
	<div class="container text-center">
		<span class="footer-copyright">Copyright &copy; <?= date('Y') ?> Vaccine Monitoring and Profiling System. All Rights Reserved.</span>
	</div>
</footer>

<?php if($this->session->userdata('position_Id') == 1) {  ?>
	<script>
	</script>
<?php } ?>


</body>
</html>