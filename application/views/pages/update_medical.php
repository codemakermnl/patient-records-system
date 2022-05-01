<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enriquez Clinic - Patient Record System</title>

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

	<div class="page-body">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
					<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
						<h2 id="heading">Update Record</h2>
						<p>Update Record for <?= $result->first_name . ' ' . $result->last_name ?> </p>
						<form id="msform" method="POST" action="<?=base_url()?>update"  enctype="multipart/form-data">
							<!-- progressbar -->
							<ul id="progressbar">
								<li class="active" id=""><strong>Personal</strong></li>
								<li id="employment"><strong>Consultation</strong></li>
								<li id="medical"><strong>Physical</strong></li>
								<li id="image"><strong>Prescription</strong></li>
							</ul>
							<div class="progress">
								<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
							</div> <br> <!-- fieldsets -->

							<fieldset>
								<div class="form-card">
									<div class="row">
										<div class="col-7">
											<h2 class="fs-title">Personal Information:</h2>
										</div>
										<div class="col-5">
											<h2 class="steps"></h2>
										</div>
									</div> 

									<input type="hidden" name="personal_info_id" value="<?= $result->personal_info_id ?>"  /> 
									<div class="row">
										<div class="col-md-4">
											<label class="fieldlabels">First Name: *</label> 
											<input type="text" id="first_name" name="first_name" placeholder="First Name" value="<?= $result->first_name ?>"  /> 
										</div>

										<div class="col-md-4">
											<label class="fieldlabels">Middle Name: </label> 
											<input type="text" name="middle_name" placeholder="Middle Name" value="<?= $result->middle_name ?>"  /> 
										</div>

										<div class="col-md-4">
											<label class="fieldlabels">Last Name: *</label> 
											<input type="text" id="last_name" name="last_name" placeholder="Last Name" value="<?= $result->last_name ?>"  /> 
										</div>
									</div>



									<div class="row">
										<div class="col-md-4">
											<label for="birth_date">Birth Date *</label>
											<input type="date" class="form-control" formControlName="birth_date" id="birth_date" name="birth_date" value="<?= $result->birth_date ?>"  />
										</div>

										<!-- ADD AGE -->

										<div class="col-md-4">
											<div class="form-group">
												<label for="gender">Gender *</label>
												<select class="form-control" formControlName="gender" id="gender" name="gender"  >
													<option value="Male" <?= $result->gender=='Male' ? 'selected' : '' ?> >Male</option>
													<option value="Female" <?= $result->gender=='Female' ? 'selected' : '' ?> >Female</option>
												</select>
											</div>
										</div>

									</div>


									<div class="row">
										<div class="col-md-12">
											<label for="complete_address">Complete Address *</label>
											<input type="text" class="form-control" formControlName="complete_address" id="complete_address" name="complete_address" value="<?=$result->complete_address?>"   />
										</div>
									</div>

									<div class="row">
										<div class="col-7">
											<h2 class="fs-title">Parent's Info:</h2>
										</div>
									</div> 

									<div class="row">
										<div class="col-md-6">
											<label class="fieldlabels">Mother's Name: </label> 
											<input type="text" name="mother_name" placeholder="Mother's First Name"  value="<?=$result->mother_name?>"  /> 
										</div>
										<div class="col-md-2">
											<label class="fieldlabels">Age: </label> 
											<input type="number" step="1" min="18" name="mother_age"  value="<?=$result->mother_age?>"  /> 
										</div>
										<div class="col-md-4">
											<label class="fieldlabels">Mother's Occupation: </label> 
											<input type="text" name="mother_occupation" placeholder="Mother's Occupation"  value="<?=$result->mother_occupation?>"  /> 
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<label class="fieldlabels">Father's Name: </label> 
											<input type="text" name="father_name" placeholder="Father's First Name"  value="<?=$result->father_name?>"  /> 
										</div>
										<div class="col-md-2">
											<label class="fieldlabels">Age: </label> 
											<input type="number" step="1" min="18" name="father_age"  value="<?=$result->father_age?>"  /> 
										</div>
										<div class="col-md-4">
											<label class="fieldlabels">Father's Occupation: </label> 
											<input type="text" name="father_occupation" placeholder="Father's Occupation"  value="<?=$result->father_occupation?>"  /> 
										</div>
									</div>

									<div class="row">
										<div class="col-7">
											<h2 class="fs-title">Family History:</h2>
										</div>
									</div> 

									<div class="row">
										<div class="col-md-3">
											<div class="checkbox">
												<label><input type="checkbox" value="Asthma" name="asthma" <?= $result->asthma == 'Asthma' ? 'checked' : '' ?>  >Asthma</label>
											</div>
										</div>

										<div class="col-md-3">
											<div class="checkbox">
												<label><input type="checkbox" value="DM" name="dm" <?= $result->dm == 'DM' ? 'checked' : '' ?>  >DM</label>
											</div>
										</div>

										<div class="col-md-3">
											<div class="checkbox">
												<label><input type="checkbox" value="HPN" name="hpn" <?= $result->hpn == 'HPN' ? 'checked' : '' ?>  >HPN</label>
											</div>
										</div>

										<div class="col-md-3">
											<div class="checkbox">
												<label><input type="checkbox" value="Ca" name="ca" <?= $result->ca == 'Ca' ? 'checked' : '' ?>  >Ca</label>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="checkbox">
												<label><input type="checkbox" value="Others" name="others_family_history_check" <?= $result->others_family_history_check == 'Others' ? 'checked' : '' ?>   >Others</label>
												<textarea class="form-control" formControlName="others_family_history_text" id="others_family_history_text" name="others_family_history_text" placeholder="Others - Family History"  ><?= $result->others_family_history_text ?></textarea>
											</div>

										</div>
									</div>

									<div class="row">
										<div class="col-7">
											<h2 class="fs-title">Past Medical:</h2>
										</div>
									</div> 

									<div class="row">
										<div class="col-md-8">
											<?php if(!empty($result->past_medical_file)): ?>
												<label class="fieldlabels">PDF: (Lab/XRay/Old Chart) </label> <a href="<?php echo base_url() . 'assets/img/uploads/' . $result->past_medical_file ?>" target="_blank">Medical File</a>
											<?php else: ?>
												<label class="fieldlabels">PDF (Lab/XRay/Old Chart): N/A</label> 
											<?php endif; ?>
											
											<br><label class="fieldlabels">Choose file below to overwrite</label>  <input type="file" accept="application/pdf" name="past_medical_file" >
											<textarea class="form-control" formControlName="additional_past_medical" id="additional_past_medical" name="additional_past_medical" placeholder="Additional Details"  ><?= $result->additional_past_medical ?></textarea>
										</div>
									</div>
								</div> 

								<input type="button" name="next" class="next action-button" value="Next" />
								<a href="<?=base_url()?>patients" class="previous action-button-previous" >Back</a>
							</fieldset>

							<fieldset>
								<div class="form-card">
									<div class="row">
										<div class="col-7">
											<h1 class="fs-title">Consultation:</h1>
										</div>
										<div class="col-5">
											<h2 class="steps"></h2>
										</div>
									</div> 

									<div class="row">
										<div class="col-7">
											<h2 class="fs-title">Complain:</h2>
										</div>
									</div> 

									<div class="row">
										<div class="col-md-6">
											<div class="checkbox">
												<label><input type="checkbox" value="Cough" name="cough" <?= $result->cough == 'Cough' ? 'checked' : '' ?>  >Cough</label>
												<input type="number" step="1" max="31" style="width: 25%" name="cough_days" class="ml-3" value="<?=$result->cough_days?>"  />
												<label class="ml-2">Days</label> 
											</div>
										</div>
										<div class="col-md-6">
											<div class="checkbox">
												<label><input type="checkbox" value="Vomiting" name="vomiting" <?= $result->vomiting == 'Vomiting' ? 'checked' : '' ?>  >Vomiting</label>
												<input type="number" step="1" max="31" style="width: 25%"  name="vomiting_days" class="ml-3" value="<?=$result->vomiting_days?>"  />
												<label class="ml-2">Days</label>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="checkbox">
												<label><input type="checkbox" value="Colds" name="colds" <?= $result->colds == 'Colds' ? 'checked' : '' ?>  >Colds</label>
												<input type="number" step="1" max="31" style="width: 25%"  name="colds_days" class="ml-3" value="<?=$result->colds_days?>"  />
												<label class="ml-2">Days</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="checkbox">
												<label><input type="checkbox" value="Abd Pain" name="abd" <?= $result->abd == 'Abd Pain' ? 'checked' : '' ?>  >Abd Pain</label>
												<input type="number" step="1" max="31" style="width: 25%"  name="abd_days" class="ml-3" value="<?=$result->abd_days?>"  />
												<label class="ml-2">Days</label>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="checkbox">
												<label><input type="checkbox" value="Fever" name="fever" <?= $result->fever == 'Fever' ? 'checked' : '' ?>  >Fever</label>
												<input type="number" step="1" max="31" style="width: 25%"  name="fever_days" class="ml-3" value="<?=$result->fever_days?>"  />
												<label class="ml-2">Days</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="checkbox">
												<label><input type="checkbox" value="Headache" name="headache" <?= $result->headache == 'Headache' ? 'checked' : '' ?>  >Headache</label>
												<input type="number" step="1" max="31" style="width: 25%"  name="headache_days" class="ml-3" value="<?=$result->headache_days?>"  />
												<label class="ml-2">Days</label>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="checkbox">
												<label><input type="checkbox" value="Diarrhea" name="diarrhea" <?= $result->diarrhea == 'Diarrhea' ? 'checked' : '' ?>   >Diarrhea</label>
												<input type="number" step="1" max="31" style="width: 25%"  name="dirrhea_days" class="ml-3" value="<?=$result->dirrhea_days?>"  />
												<label class="ml-2">Days</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="checkbox">
												<label><input type="checkbox" value="Pain" name="pain" <?= $result->pain == 'Pain' ? 'checked' : '' ?>   >Pain</label>
												<input type="number" step="1" max="31" style="width: 25%"  name="pain_days" class="ml-3" value="<?=$result->pain_days?>"  />
												<label class="ml-2">Days</label>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="checkbox">
												<label><input type="checkbox" value="Swelling" name="swelling" <?= $result->swelling == 'Swelling' ? 'checked' : '' ?>   >Swelling</label>
												<input type="number" step="1" max="31" style="width: 25%"  name="swelling_days" class="ml-3" value="<?=$result->swelling_days?>"  />
												<label class="ml-2">Days</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="checkbox">
												<label><input type="checkbox" value="Allergies" name="allergies" <?= $result->allergies == 'Allergies' ? 'checked' : '' ?>   >Allergies</label>
												<input type="number" step="1" max="31" style="width: 25%"  name="allergies_days" class="ml-3" value="<?=$result->allergies_days?>"  />
												<label class="ml-2">Days</label>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-8">
											<div class="checkbox">
												<label><input type="checkbox" value="Others" name="others_complain_check"  <?= $result->others_complain_check == 'Others' ? 'checked' : '' ?>  >Others</label>
												<textarea class="form-control" formControlName="others_complain_text" id="others_complain_text" name="others_complain_text" placeholder="Others - Complains"  ><?= $result->others_complain_text ?></textarea>
											</div>

										</div>
									</div>
								</div> 

								<input type="button" name="next" class="next action-button" value="Next" /> 
								<input type="button" name="previous" class="previous action-button-previous" value="Previous" />
							</fieldset>

							<fieldset>
								<div class="form-card">
									<div class="row">
										<div class="col-7">
											<h2 class="fs-title">Physical Exam:</h2>
										</div>
										<div class="col-5">
											<h2 class="steps"></h2>
										</div>
									</div> 

									<div class="row">
										<div class="col-md-4">
											<label class="fieldlabels">BP:</label> 
											<input type="text" name="bp" placeholder="120/80" value="<?=$result->bp?>"  /> 
										</div>
										<div class="col-md-4">
											<label class="fieldlabels">Temp:</label> 
											<input type="text" name="temp" placeholder="37 C" value="<?=$result->temp?>"  /> 
										</div>
										<div class="col-md-4">
											<label class="fieldlabels">Height:</label> 
											<input type="text" name="height" placeholder="170 cm" value="<?=$result->height?>"  /> 
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<textarea class="form-control" formControlName="physical_exam" id="physical_exam" name="physical_exam" placeholder="Additional Details"  ><?= $result->physical_exam ?></textarea>
										</div>
									</div>

									<div class="row">
										<div class="col-7">
											<h2 class="fs-title">Assessment:</h2>
										</div>
									</div> 

									<div class="row">
										<div class="col-md-12">
											<textarea class="form-control" formControlName="assessment" id="assessment" name="assessment" placeholder="Assessment Details"  ><?= $result->assessment ?></textarea>
										</div>
									</div>
								</div> 

								<input type="button" name="next" class="next action-button" value="Next" /> 

								<input type="button" name="previous" class="previous action-button-previous" value="Previous" />
							</fieldset>

							<fieldset>
								<div class="form-card">
									<div class="row">
										<div class="col-7">
											<h2 class="fs-title">Prescription Plan:</h2>
										</div>
										<div class="col-5">
											<h2 class="steps"></h2>
										</div>
									</div> 

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="antibiotics">Antibiotics: </label>
												<select class="form-control" formControlName="antibiotics" id="antibiotics" name="antibiotics" >
													<option value="None" <?= $result->antibiotics=='None' ? 'selected' : '' ?> >None</option>
													<option value="Droplets" <?= $result->antibiotics=='Droplets' ? 'selected' : '' ?> >Droplets</option>
													<option value="125" <?= $result->antibiotics=='125' ? 'selected' : '' ?> >125 mg</option>
													<option value="250" <?= $result->antibiotics=='250' ? 'selected' : '' ?> >250 mg</option>
												</select>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label for="antihistamine">Antihistamine: </label>
												<select class="form-control" formControlName="antihistamine" id="antihistamine" name="antihistamine"  >
													<option value="None" <?= $result->antihistamine=='None' ? 'selected' : '' ?>  >None</option>
													<option value="Droplets"  <?= $result->antihistamine=='Droplets' ? 'selected' : '' ?> >Droplets</option>
													<option value="125"  <?= $result->antihistamine=='125' ? 'selected' : '' ?> >125 mg</option>
													<option value="250"  <?= $result->antihistamine=='250' ? 'selected' : '' ?> >250 mg</option>
												</select>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label for="antipyretic">Antipyretic: </label>
												<select class="form-control" formControlName="antipyretic" id="antipyretic" name="antipyretic"  >
													<option value="None" <?= $result->antipyretic=='None' ? 'selected' : '' ?> >None</option>
													<option value="Droplets" <?= $result->antipyretic=='Droplets' ? 'selected' : '' ?> >Droplets</option>
													<option value="125" <?= $result->antipyretic=='125' ? 'selected' : '' ?> >125 mg</option>
													<option value="250" <?= $result->antipyretic=='250' ? 'selected' : '' ?> >250 mg</option>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="clarithromycin">Clarithromcyin: </label>
												<select class="form-control" formControlName="clarithromycin" id="clarithromycin" name="clarithromycin"  >
													<option value="None" <?= $result->clarithromycin=='None' ? 'selected' : '' ?> >None</option>
													<option value="Droplets" <?= $result->clarithromycin=='Droplets' ? 'selected' : '' ?> >Droplets</option>
													<option value="125" <?= $result->clarithromycin=='125' ? 'selected' : '' ?> >125 mg</option>
													<option value="250" <?= $result->clarithromycin=='250' ? 'selected' : '' ?> >250 mg</option>
												</select>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label for="multivitamins">Multivitamins: </label>
												<select class="form-control" formControlName="multivitamins" id="multivitamins" name="multivitamins"  >
													<option value="None" <?= $result->multivitamins=='None' ? 'selected' : '' ?> >None</option>
													<option value="Droplets" <?= $result->multivitamins=='Droplets' ? 'selected' : '' ?> >Droplets</option>
													<option value="125" <?= $result->multivitamins=='125' ? 'selected' : '' ?> >125 mg</option>
													<option value="250" <?= $result->multivitamins=='250' ? 'selected' : '' ?> >250 mg</option>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-8 form-group">
											<label for="others_prescription_check">Others: </label>
											<select class="form-control" formControlName="others_prescription_check" id="others_prescription_check" name="others_prescription_check"  >
												<option value="None"  <?= $result->others_prescription_check=='None' ? 'selected' : '' ?>  >None</option>
												<option value="Droplets"  <?= $result->others_prescription_check=='Droplets' ? 'selected' : '' ?>  >Droplets</option>
												<option value="125"  <?= $result->others_prescription_check=='125' ? 'selected' : '' ?>  >125 mg</option>
												<option value="250" <?= $result->others_prescription_check=='250' ? 'selected' : '' ?>   >250 mg</option>
											</select>
											<textarea class="form-control mt-3" formControlName="others_prescription_text" id="others_prescription_text" name="others_prescription_text" placeholder="Others - Prescription"  ><?= $result->others_prescription_text ?></textarea>
										</div>
									</div>

									<div class="row">
										<div class="col-7">
											<h2 class="fs-title">Other:</h2>
										</div>
									</div> 

									<div class="row">
										<div class="col-md-12">
											<textarea class="form-control" formControlName="other_last" id="other_last" name="other_last" placeholder="Other Details"  ><?= $result->other_last ?></textarea>
										</div>
									</div>
								</div> 

								<input type="submit" name="next" class="next action-button" value="Update" /> 
								<input type="button" name="previous" class="previous action-button-previous" value="Previous" />
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


<script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>


<script type="text/javascript">

	$(document).ready(function(){

	var current_fs, next_fs, previous_fs; //fieldsets
	var opacity;
	var current = 1;
	var steps = $("fieldset").length;

	setProgressBar(current);

	$(".next").click(function(){

		var fields = ['first_name', 'last_name', 'birth_date', 'complete_address'];
 		var fieldsValid = true;

 		fields.forEach( function(field){
 			if( !$('#' + field).val() ) {
 				fieldsValid = false;
 				alert(field + ' is required.');
 			}
 		} );

 		if( !fieldsValid ) {
			return;
 		}

		current_fs = $(this).parent();
		next_fs = $(this).parent().next();

		//Add Class Active
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		//show the next fieldset
		next_fs.show();
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now) {
		// for making fielset appear animation
		opacity = 1 - now;

		current_fs.css({
			'display': 'none',
			'position': 'relative'
		});
		next_fs.css({'opacity': opacity});
	},
	duration: 500
});
		setProgressBar(++current);
	});

	$(".previous").click(function(){

		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();

		//Remove class active
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

		//show the previous fieldset
		previous_fs.show();

		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now) {
		// for making fielset appear animation
		opacity = 1 - now;

		current_fs.css({
			'display': 'none',
			'position': 'relative'
		});
		previous_fs.css({'opacity': opacity});
	},
	duration: 500
});
		setProgressBar(--current);
	});

	function setProgressBar(curStep){
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar")
		.css("width",percent+"%")
	}

	$(".submit").click(function(){
		return false;
	})

});

 	$(document).on('click', 'form button[type=submit]', function(e) {
 	// 	var fields = ['fname', 'lname', 'birth_date', 'complete_address'];
 	// 	var fieldsValid = true;

 	// 	fields.forEach( function(field){
 	// 		if( !$('#' + field).val() ) {
 	// 			fieldsValid = false;
 	// 			alert(field + ' is required.');
 	// 		}
 	// 	} );

 	// // 	if(!$('input:radio[name=gender]').is(':checked')){
	 // // 		fieldsValid = false;
		// // 	alert( 'Gender is required.');
		// // }



 	// 	if( !fieldsValid ) {
		// 	e.preventDefault(); //prevent the default action
 	// 	}


 	});


 	function isPasswordValid( value ) {
		return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
	       && /[a-z]/.test(value) // has a lowercase letter
	       && /[A-Z]/.test(value) // has a lowercase letter
	       && /\d/.test(value) // has a digit
	   }



	   function validateImageType(file){
	   	var fileName = file.value;
	   	var idxDot = fileName.lastIndexOf(".") + 1;
	   	var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
	   	if (extFile=="jpg" || extFile=="jpeg" || extFile=="png" || extFile == "gif"){

	   	}else{
	   		clearInputFile(file);
	   		alert("Only jpg/jpeg, png and gif files are allowed!");

	   	}   
	   }

	   function clearInputFile(f){
	   	if(f.value){
	   		try{
                f.value = ''; //for IE11, latest Chrome/Firefox/Opera...
            }catch(err){
            }
            if(f.value){ //for IE5 ~ IE10
            	var form = document.createElement('form'), ref = f.nextSibling;
            	form.appendChild(f);
            	form.reset();
            	ref.parentNode.insertBefore(f,ref);
            }
        }
    }


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