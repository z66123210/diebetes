<link rel="stylesheet" href="<?php echo base_url('assests/styles/calendar.css')?>"> 

	<body>
		<title>Health report</title>
 
    	<!-- END header -->

		<section class="section bg-light element-animate" style="padding-bottom:0px;">
      
      		<div class="col-md-12 text-center heading-wrap" style= "padding-bottom: 4%;">
							<h2>Calendar</h2>
							<span class="back-text-dark"></span>
						</div>
    
    
    <div class ="z111" style ="background-color:#f73471;">
			
		<?php 
	if($this->session->meal_ingredients)
	{?>
	<h2 style = " color:white;">Your current meal suggestion <?php echo $this->session->plan->meal_level; ?> Calories a Day</h2>
		
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
	
	

			<div class="clearfix mb-5 pb-5">
				<div class="container-fluid">
					<div class="row">
				
					</div>
				</div>
			</div>


			<?php 
	echo $calendar;
			?>

		</section>

		<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

		