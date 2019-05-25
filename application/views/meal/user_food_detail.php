
   <title>Diabetes Monitoring App</title>
    
    
  <section class="section bg-light element-animate" style="padding-bottom:0px;">

      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>What you have eaten today</h2>
              <span class="back-text-dark"></span>
            </div>
          </div>
        </div>
      </div>
    
 

 <div class ="z111" style ="background-color:#f73471;">
			
		<?php 
	if($details)
	{?>
	<h2 style = " color:white;">Your meal on <?php echo $date ?> </h2>
		
</div>

<div class="a111">
<?php
	foreach ($details as $detail)
	{

	?>
  <div class="b111" style = "         float: left !important;
          width: 20% !important;
          padding-top: 10px !important;
        padding-bottom: 10px !important;         
        border: 1px solid black !important; height: 580px !important;" >
		<div><img src="<?php echo base_url('assests/'. $detail['image']);?>" style=" padding-bottom: 10px; display: block;
			margin-left: auto;
			margin-right: auto;"></div>
		<div style="background-color:#ddd; padding:2%; text-align: center; font-size:25px; font-weight: bold;"> <?php echo $detail['calsconsumed'] . ' cals' ?></div>
		<div style ="padding:2%; font-weight: bold;"> <?php// echo $meal_ingredient->title?></div>
		<div style ="padding:2%;"> <?php //echo $meal_ingredient->description?></div>
				<div style ="padding:2%;"><span style ="font-weight: bold"><?php //echo $meal_ingredient->note?></div>
  </div>
<?php
	}
			}
			else
		{
			echo '<h2>You dont have meal this day</h2>';
		}
	?>
	

  
  
</div>
	

</section>

