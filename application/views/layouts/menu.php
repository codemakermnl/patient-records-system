<body>
<div class="nav-top container-fluid">
	<div class="row" >
		<img class="nav-logo mx-3" src="<?= base_url() ?>assets/img/logos/logo.png">
		<div class="col col-md-8 ">
			<div class="div-nav-heading" >
				<span class="nav-title">
					<b>Enriquez Clinic</b>
				</span>
			</div>
			<div class="div-nav-heading" >
				<span class="nav-heading-top">
					Patient Records System 
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
				<li id="patients" class="nav-item">
					<a class="nav-link nav-color" href="<?=base_url()?>patients">Patients List</a>
				</li>
		</ul>


		<ul class="navbar-nav">	
			<li class="nav-item dropdown">
<!-- 				<a class="nav-link nav-color dropdown-toggle nav-user" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?= $this->session->userdata('username'); ?>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					 <a class="dropdown-item" href="<?=base_url()?>change-password">Change Password</a>
					<a class="dropdown-item" href="<?=base_url()?>logout">Sign Out</a>
					 <div class="dropdown-divider"></div> -->
				</div>
			</li>
		</ul>
	</div>
</nav>