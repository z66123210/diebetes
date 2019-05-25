<!DOCTYPE html>
<style>
.value-positive {
  color: #0cdb02;
}

.value-negative {
  color: #fe0000;
}
</style>
<?php
$user=$this->session->user;
$plan=$this->session->plan;
$button['text'] = 'Add new plan';
$button['icon'] = 'glyphicon-plus';


// var_dump($user);
// echo '<br />';
// echo '<br />';
// echo '<br />';
$current_plan = $this->session->plan;
// var_dump($current_plan);
// echo '<br />';
// echo '<br />';
$meal_levels = $this->session->meal_levels;
// var_dump($meal_levels);

// echo '<br />';
// echo '<br />';
$meal_ingredients = $this->session->meal_ingredients;
// var_dump($meal_ingredients);

$lose05 = $user['calories'] - 500;
$lose1 = $user['calories'] - 1000;
$gain05 = $user['calories'] + 500;
$gain1 = $user['calories'] +1000;

// echo '<br />';
// echo '<br />';
// echo $user['calories'];
?>




<!-- <div class="container-fluid"> -->
<!-- 	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link active" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Report</a>
				</li>
				<li class="nav-item dropdown ml-md-auto">
					<a class="nav-link" href="#">Logout</a>
				</li>
			</ul>
			<div class="page-header">
				<h1>
					<?php echo $user['name']; ?> <small> ! Here is your information</small>
				</h1>
			</div>
		</div> -->
	</div>
	<div class="row">
		<div class="col-md-12">


			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<img class="card-img-top" alt="Bootstrap Thumbnail First" src="https://www.layoutit.com/img/people-q-c-600-200-1.jpg" />
						<div class="card-block">
							<h5 class="card-title">
								General information
							</h5>
							<p class="card-text">
								<?php 

								echo '<br /> <p> Your name: <span style="color:#483D8B">'.$user['name'].'</span>';
								echo '<br /> <p> Your age: <span style="color:#483D8B">'. $user['age'] . '</span> years old';
								echo '<br /> <p> Your Gender: <span style="color:#483D8B">'. $user['sex'].'</span>';
								echo '<br /> <p> Your Height: <span style="color:#483D8B">'.$user['height'].'</span> m';
								echo '<br /> <p> Your Weight: <span style="color:#483D8B">'.$user['weight']. '</span> kg';
								echo '<br /> <p> Your BMI: <span style="color:#E10C36">'.$user['bmi'].'</span>';
								echo '<br /> <p> Your classification: <span style="color:#E10C36">'.$user['classification'].'</span>';



								?>
							</p>

						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<img class="card-img-top" alt="Bootstrap Thumbnail Second" src="https://www.layoutit.com/img/city-q-c-600-200-1.jpg" />
						<div class="card-block">
							<h5 class="card-title">
								Health Suggestion
							</h5>
							<p class="card-text">
								<?php
               
								echo '<br /> <p> Your BMI standards is: <span style="color: #E10C36">25</span> '; 
								echo '<br /><p>Your weight should be: <span style="color: #32CD32">'.$user['good_weight'] .'</span> kg';

                  echo '<br /><p>To maintain your <span style="color: #E10C36">current weight : '.$user['calories']  .'</span> cals/day';
                
// 								echo '<br /><p>To maintain your current weigth : '.$user['calories']  .' cals/day';
                
								echo '<br />To <span style="color: green">+ 0.5 kg</span> / week : <span style="color: green">'.  $gain05.'</span> cals/day';
								echo '<br /><p>To <span style="color: green">+ 1 kg</span> / week : <span style="color: green">'. $gain1 .'</span> cals/day';

                   echo '<br /><p>To <span style="color: red">- 0.5 kg</span> / week : <span style="color: red">'.$lose05  .'</span> cals/day';
                
								
								echo '<br /><p>To <span style="color: red">- 1 kg</span> / week : <span style="color: red">'.$lose1  .'</span> cals/day';


								?>
							</p>

						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<img class="card-img-top" alt="Bootstrap Thumbnail Third" src="https://www.layoutit.com/img/sports-q-c-600-200-1.jpg" />
						<div class="card-block">
							<h5 class="card-title">
								Your current plan
							</h5>
							<p class="card-text">
								<?php

								if ($current_plan->checkplan)
								{
									$button['text'] = 'Change Your Plan';
									$button['icon'] = 'glyphicon-pencil';
									echo '<br /><p> Your <span style="color: #4B0082">planned weight: '. $plan->pweight . '</span> kg ';
									echo '<br /><p>Your <span style="color: #4B0082">planned time: '. $plan->ptime . '</span> week(s) ';
									echo '<br /><p>Your <span style="color: #4B0082">meal calories</span> level: <span style="color: #BC310E">'.$plan->meal_level.'</span></a> calories ';
									echo '<br /><p><span style="color: #4B0082">Calories change</span> by activities: <span style="color: #BC310E">'.$plan->calories_change_by_activities . '</span> calories ';
									echo '<br /><p>Time updated: '. $plan->time_updated;
								}
								else{
									echo 'no plan';
								}
								?>
							</p>
							<p>
								<?php echo '<button class="btn btn-success" onclick="add_page()"><i class="glyphicon' . $button['icon'] . '"></i> '. $button['text'] .'</button>'; 
								?>
							</p>
						</div>
					</div>
				</div>
			</div>
		
			
			
			 <div class ="z111" style ="background-color:#f73471;        text-align: center !important;
      vertical-align: middle !important;
      border: 1px solid black !important; border-top: 2px solid black !important; margin-top: 4%;">
			
		<?php 
	if($this->session->meal_ingredients)
	{?>
	<h2 style = " color:white;">Food Group Amounts for 2,600 Calories a Day</h2>
		
</div>

<div class="a111">
<?php
	foreach ($this->session->meal_ingredients as $meal_ingredient)
	{

	?>
  <div class="b111" style = "         float: left !important;
          width: 20% !important;
          padding-top: 10px !important;
        padding-bottom: 10px !important;         
        border: 1px solid black !important; height: 580px !important;" >
		<div><img src="<?php echo base_url('assests/'. $meal_ingredient->image);?>" style=" padding-bottom: 10px; display: block;
			margin-left: auto;
			margin-right: auto;"></div>
		<div style="background-color:#ddd; padding:2%; text-align: center; font-size:25px; font-weight: bold;"> <?php echo $meal_ingredient->quantity . ' '. $meal_ingredient->metric ?></div>
		<div style ="padding:2%; font-weight: bold;"> <?php echo $meal_ingredient->title?></div>
		<div style ="padding:2%;"> <?php echo $meal_ingredient->description?></div>
				<div style ="padding:2%;"><span style ="font-weight: bold"><?php echo $meal_ingredient->note?></div>
  </div>
<?php
	}
			}
			else
		{
			echo '<h2>You dont have any plan currently</h2>';
		}
	?>
	

  
  
</div>
			
		</div>
	</div>
</div>
<script type="text/javascript">
// 	$(document).ready( function () {
// 		$('#update_plan').DataTable();
// 	} );
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
			url : "<?php echo base_url('/lab/index.php/pages/ajax_edit/')?>/" + id,
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
			url = "<?php echo base_url('/lab/index.php/users/update_plan')?>";
		}
		else
		{
			url = "<?php echo base_url('/lab/index.php/users/update_plan')?>";
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
				url : "<?php echo base_url('/lab/index.php/pages/page_delete')?>/"+id,
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
<!-- 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
				<h3 class="modal-title">Win yourself</h3>
			</div>
			<div class="modal-body form">
				<form action="http://localhost/project/index.php/users/update_plan" method="post" id="form" class="form-horizontal">
					
  
				
          
					<div class="form-body">
						<div class="form-group">
							<label class="control-label" style="font-weight: bold; text-align: center;">What is Your target weight?</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="pweight" id="pweight" placeholder="Your target weight (Kg)..">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label" style="font-weight: bold;">How long you want to achieve your goal?(week)</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="ptime" id="ptime" placeholder="Put a number here..">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label" style="font-weight: bold;">Choose calories level each meal</label>
							<div class="col-md-9">
								<select name="meal_level" id="meal" class="form-control" style= "height:50px !important;">
                     <option value="1600">1600</option>
					  <option value="1800">1800</option>
					  <option value="2000">2000</option>
					  <option value="2200">2200</option>
					  <option value="2400">2400</option>
					  <option value="2600">2600</option>
					  <option value="2800">2800</option>
					  <option value="3000">3000</option>
					  <option value="3200">3200</option>
                  </select>

							</div>
						</div>

	
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" form="form"   id="btnSave"  class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->




