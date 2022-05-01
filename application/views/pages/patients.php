

<div class="page-body">
	<div class="container">
		<div class="section-title">
			<h3>Patient List</h3>
		</div>
		<div class="section-body">
			<div class="container-fluid mb-2">

				<div class="row mb-3">
					<div class="col-md-10">

					</div>
					<div class="col-md-2">
						<button id="btn-add-record" class="btn btn-warning btn-sm "><i class="fa fa-plus"></i> <span>Add New Record</span></button>
					</div>
				</div>
			</div>
			<table id="patient-list" class="table table-hover dt-responsive" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Gender</th>
						<th>Age</th>
						<th>Actions</th>
					</tr>
				</thead>
			</table>

		</div>
	</div>
</div>


<div class="modal fade" id="archiveMedicalModal" tabindex="-1" role="dialog" aria-labelledby="archiveMedicalModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="modalDelete">
			<div class="modal-header">            
				<h4 class="modal-title">Are you sure you want to archive this record?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>


			<div class="modal-footer">
				<input type="hidden" id="patient_archive" value="" />
				<button id="btn-archive-medical" class="btn btn-danger"  >Yes</button>
				<input type="button" class="btn btn-warning" data-dismiss="modal" value="Cancel">
			</div>

		</div> <!-- end modal-content -->
	</div> <!-- end modal-dialog -->
</div> <!-- end modal -->



<script>
	var patients;
	$(document).ready(function() {
		$('#patients a').removeClass('nav-color');
		$('#patients a').addClass('nav-active');
		patients = $("#patient-list").DataTable({
			"bPaginate": false,
			dom: "<'row'<'col-md-6'f><'col-md-6'l>>",
			ajax: {
				url: "<?=base_url()?>ajax/get-patients",
				dataSrc: ''
			},
			responsive:true,
			columnDefs: [
			{
				"targets": 0,
				"data" : "first_name"
			},

			{
				"targets": 1,
				"data" : "last_name"
			},
			{
				"targets": 2,
				"data" : "gender"
			},
			{
				"targets": 3,
				"data" : "age"
			},
			{
				"targets": 4,
				"render": function ( data, type, row ) {
					var html = "";
					html += "<button class='btn btn-info btn-sm btn-cancel viewPatientBtn mr-2' patientID='" + row['hash_id'] + "'>View</button>";
					html += "<button class='btn btn-success btn-sm btn-cancel updatePatientBtn mr-2' patientID='" + row['hash_id'] + "'>Update</button>";
					html += "<button class='btn btn-danger btn-sm btn-cancel archiveMedicalBtn' patientID='" + row['hash_id'] + "'>Archive</button>";
					return html;
				} 
			},



			]
		});

		$(document).on('click', '#btn-add-record', function() {
			window.location.href = "<?=base_url()?>new-medical"
		});

		$(document).on('click', '.archiveMedicalBtn', function() {
			$('#archiveMedicalModal').modal('show');
			$('#patient_archive').val($(this).attr('patientID'));
		});

		$(document).on('click', '.viewPatientBtn', function() {
			var patientID = $(this).attr('patientID');
			window.location.href = "<?=base_url()?>view_medical/" + patientID;
		});

		$(document).on('click', '.updatePatientBtn', function() {
			var patientID = $(this).attr('patientID');
			window.location.href = "<?=base_url()?>update_medical/" + patientID;
		});


		$(document).on('click', '#btn-archive-medical', function() {
			var patientID = $('#patient_archive').val();
			$.ajax({
				url: '<?=base_url()?>ajax/archive-patient',
				type: 'POST',
				data: {
					personal_info_id: patientID
				},
				success:function(data) {
					var result = JSON.parse(data);
            // alert('Product ' + productID + ' deleted.');
            $('#archiveMedicalModal').modal('hide');
            patients.ajax.reload();
        },
        error:function(data) {
        	console.log(data);
        }
    });

		});

	});
</script>