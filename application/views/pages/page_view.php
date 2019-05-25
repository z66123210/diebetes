<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Learn PHP CodeIgniter Framework with AJAX and Bootstrap</title>
		<link href="<?php echo base_url('assests/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
		<link href="<?php echo base_url('assests/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
	</head>
	<body>


		<div class="container">
			<h1>Learn PHP CodeIgniter Framework with AJAX and Bootstrap</h1>
			</center>
		<h3>Page Manager</h3>
		<br />
		<button class="btn btn-success" onclick="add_page()"><i class="glyphicon glyphicon-plus"></i> Add Page</button>
		<br />
		<br />
		<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Page ID</th>
					<th>User ID</th>
					<th>Page Order</th>
					<th>Title</th>
					<th>Body</th>
					<th>Image</th>

					<th style="width:125px;">Action
				</p></th>
			</tr>
		</thead>
	<tbody>
		<?php	foreach($pages as $page){?>
		<tr>
			<td><?php echo $page['id'];?></td>
			<td><?php echo $page['UserId'];?></td>
			<td><?php echo $page['Page_order'];?></td>
			<td><?php echo $page['Title'];?></td>
			<td><?php echo $page['Body'];?></td>
			<td><?php echo $page['Image'];?></td>

			<td>
				<button class="btn btn-warning" onclick="edit_page(<?php echo $page['id'];?>)"><i class="glyphicon glyphicon-pencil"></i></button>
				<button class="btn btn-danger" onclick="delete_page(<?php echo $page['id'];?>)"><i class="glyphicon glyphicon-remove"></i></button>


			</td>
		</tr>
		<?php }?>



	</tbody>

	<tfoot>
		<tr>
			<th>Page ID</th>
			<th>User ID</th>
			<th>Page Order</th>
			<th>Title</th>
			<th>Body</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
	</tfoot>
	</table>

</div>

<script src="<?php echo base_url('assests/jquery/jquery-3.1.0.min.js')?>"></script>
<script src="<?php echo base_url('assests/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assests/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assests/datatables/js/dataTables.bootstrap.js')?>"></script>


<script type="text/javascript">
	$(document).ready( function () {
		$('#table_id').DataTable();
	} );
	var save_method; //for save method string
	var table;


	function add_page()
	{
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('#modal_form').modal('show'); // show bootstrap modal
		//$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
	}

	function edit_page(id)
	{
		save_method = 'update';
		$('#form')[0].reset(); // reset form on modals

		//Ajax Load data from ajax
		$.ajax({
			url : "<?php echo base_url('index.php/pages/ajax_edit/')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{

				$('[name="id"]').val(data.id);
				$('[name="UserId"]').val(data.UserId);
				$('[name="Page_order"]').val(data.Page_order);
				$('[name="Title"]').val(data.Title);
				$('[name="Body"]').val(data.Body);
				$('[name="Image"]').val(data.Image);


				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});
	}



	function save()
	{
		var url;
		if(save_method == 'add')
		{
			url = "<?php echo base_url('index.php/pages/page_add')?>";
		}
		else
		{
			url = "<?php echo base_url('index.php/pages/page_update')?>";
		}

		// ajax adding data to database
		$.ajax({
			url : url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function(data)
			{
				//if success close modal and reload ajax table
				$('#modal_form').modal('hide');
				location.reload();// for reload a page
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error adding / update data');
			}
		});
	}

	function delete_page(id)
	{
		if(confirm('Are you sure delete this data?'))
		{
			// ajax delete data from database
			$.ajax({
				url : "<?php echo base_url('index.php/pages/page_delete')?>/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{

					location.reload();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			});

		}
	}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Page Form</h3>
			</div>
			<div class="modal-body form">
				<form action="#" id="form" class="form-horizontal">
					<input type="hidden" value="" name="id"/>
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">User ID</label>
							<div class="col-md-9">
								<input name="UserId" placeholder="User ID" class="form-control" type="text">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Page Order</label>
							<div class="col-md-9">
								<input name="Page_order" placeholder="Page order" class="form-control" type="text">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Title</label>
							<div class="col-md-9">
								<input name="Title" placeholder="Title" class="form-control" type="text">

							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Body</label>
							<div class="col-md-9">
								<textarea name="Body" placeholder="Body" class="form-control"> </textarea>

									</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Image</label>
								<div class="col-md-9">
									<input name="Image" placeholder="Image" class="form-control" type="text">

								</div>
							</div>
						</div>
						</form>
					</div>
				<div class="modal-footer">
					<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Bootstrap modal -->

	</body>
</html>
