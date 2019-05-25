<!doctype html>
<?php
$bmi = $this->session->bmi;
$height = $this->session->height;
$calories = $this->session->calories;
if ($bmi < 18.5) {
	$classification = 'Underweight';
}
else if ($bmi < 24.99){
	$classification = 'Normal range';
}
else if ($bmi < 29.99){
	$classification = 'Preobese';
}
else if ($bmi < 34.99){
	$classification = 'Obese class 1';
}else if ($bmi < 39.99){
	$classification = 'Obese class 2';
}else{
	$classification = 'Obese class 3';
};

$lose05 = $calories - 500;
$lose1 = $calories - 1000;
$gain05 = $calories + 500;
$gain1 = $calories +1000;
$good_weight = 25*($height * $height);


?>



<html lang="en">
  <head>
    <title>Diabetes Monitoring App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assests/css/bootstrap.css')?>">   
    <link rel="stylesheet" href="<?php echo base_url('assests/css/animate.css')?>">  
    <link rel="stylesheet" href="<?php echo base_url('assests/css/owl.carousel.min.css')?>">  

    <link rel="stylesheet" href="<?php echo base_url('assests/css/magnific-popup.css')?>"> 


    <link rel="stylesheet" href="<?php echo base_url('assests/fonts/ionicons/css/ionicons.min.css')?>"> 
    <link rel="stylesheet"  href="<?php echo base_url('assests/fonts/fontawesome/css/font-awesome.min.css')?>">  

    <!-- Theme Style -->
    <link rel="stylesheet" href="<?php echo base_url('assests/css/style.css')?>">   
	<style>
	
	/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 3px solid black;
    width: 80%; /* Could be more or less, depending on screen size */
}


/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 200px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
.content
{
	max-width: 900px;
	margin: auto;
	padding: 10px;
}

.clearfix{
	
	padding: 0px !important;
	margin: 0px  !important;
}
.section{
	padding-bottom: 5% !important;
}
<!--.home-slider{
	height: 350px !important;
}
.slider-item{
	height: 350px !important;
} -->
.form-wrap{
	margin:20%;
	position:relative !important;
	z-index: 1 !important;
}


	</style>
  </head>
  <body>
  <div class="content">
    
    <header role="banner">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
         
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse"  id="navbarsExample05">
            <ul class="navbar-nav mr-auto pl-lg-5 pl-0" >
      
              <li class="nav-item cta-btn" style="border:solid black 2px;">
                <a class="nav-link" href="<?php echo base_url('index.php/Users')?>">Plan</a>
              </li>
             
              <li class="nav-item cta-btn" style="border:solid black 2px;">
                <a class="nav-link" href="<?php echo base_url('index.php/Report')?>">Calendar</a>
              </li>
 
            </ul>


            
          </div>
        </div>
        <a href="<?php echo base_url('index.php/users/logout')?>" class="btn btn-primary" role="button" style="border:solid black 2px;">Log Out</a>
      </nav>
    </header>
    <!-- END header -->
    

 

    <section class="section bg-light element-animate">


   

      <div class="clearfix mb-5 pb-5" style= "padding-bottom: 0px;" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Your Details</h2>
              <span class="back-text-dark"></span>
            </div>
          </div>
        </div>
      </div>
<?php
 
		
		echo '<br /> <p> Your name: '.$this->session->name;
		echo '<br /> <p> Your age: '. $this->session->age . ' years old';
		echo '<br /> <p> Your Gender: '. $this->session->sex;
		echo '<br /> <p> Your Height: '.$height.' m';
		echo '<br /> <p> Your Weight: '.$this->session->weight. ' kg';
		echo '<br /> <p> Your BMI: '.$bmi.'. Your classification: '.$classification;
		echo '<br /> <p> Your BMI standards is: 25 . Your weight should be: '.$good_weight;

		?>

      <div class="container" >
        
        <div class="row no-gutters">
          <div class="col-md-12">
            <div class="sched d-block d-lg-flex" >
                            <div class="text order-1" style="border: solid black 2px; padding: 5px;">
                <h3><span class='span'><?php echo $bmi ?></span></h3>
                <p>Is Your Current BMI</p>
             
                
              </div>
              <div class="text order-1" style="border: solid black 2px;padding: 5px;">
                <h3><span class='span'><?php echo $classification ?></span></h3>
                <p>Is Your classification</p>
               
                
              </div>
			               <div class="text" style="border: solid black 2px;padding: 5px;">
                <h3>25 </h3>
                <p>Is Your BMI Standards </p>
       
                
              </div>
			       <div class="text" style="border: solid black 2px;padding: 5px;">
                <h3><span class='span'><?php echo $good_weight ?></span> Kg</h3>
                <p>Is Your Ideal weight </p>
                
              
                
              </div>
			  
              
            </div>

         </div>

          <div class="col-md-12">
            <div class="sched d-block d-lg-flex">
              
			               
				<div class="text order-1" style="border: solid black 2px;padding: 5px;">
               
			   	 <h3><span class='span'> <?php echo $calories ?></span> Kcal/day</h3>
                
					<p>Is what you need to maintain your weight</p>
             
                
              	</div>
			  
              <div class="text order-1" style="border: solid black 2px;padding: 5px;">
                <h3><span class='span'><?php echo $lose05 ?></span> Kcal/day</h3>
                <p>Is what you need To lose 0.5 kg per week</p>
           
                
              </div>
			  
			  	              <div class="text" style="border: solid black 2px;padding: 5px;">
                <h3><span class='span'><?php echo $lose1 ?></span> Kcal/day</h3>
                <p>Is what you need To lose 1 kg per week</p>
            
                
              </div>
			
              <div class="text" style="border: solid black 2px;padding: 5px;">
                <h3><span class='span'><?php echo $gain05 ?></span> Kcal/day</h3>
                <p>Is what you need To gain 0.5 kg per week</p>
              
                
              </div>
			  
			        <div class="text" style="border: solid black 2px;padding: 5px;">
                <h3><span class='span'><?php echo $gain1 ?></span> Kcal/day</h3>
                <p>Is what you need To gain 1 kg per week</p>
              
                
              </div>
              
            </div>
          <div style="text-align:center; padding-top:2%;">
				<a href="#" class="btn btn-primary" role="button" style="border:solid black 2px;"onclick="document.getElementById('id01').style.display='block'">Create Plan</a> 
     
            </div>
          </div>
        </div>
		<P>Your Plan:</p>
		<?php
// 	var_dump($meal_plan_details);
    if ($this->session->checkplan)
    {
      $plan = $this->session->plan;
      echo 'Your planned weight: '. $plan['pweight'] . ' kg <br />';
      echo 'Your planned time: '. $plan['ptime'] . ' week(s) <br />';
      echo 'Your meal calories level: '. anchor_popup('meal/meal_info/'. $plan['meal_level'], $plan['meal_level'])  . '</a> calories <br />';
      echo 'Calories change by activities: '. $plan['calories_change_by_activities'] . ' calories <br />';
      echo 'Time updated: '. $plan['time_updated'];
    }
    else{
      echo 'no plan';
    }
    ?>
    
    
    <br /><br />
				<p>
					<b>Check ingredients of meal level: </b>
				</p>
    <?php 
    
    if ($this->session->meal_levels)
    {
      
      foreach ($this->session->meal_levels as $meal_level)
      {
    // 		echo '<br />';
        
//         echo '<button class ="btn-info" onclick:>'.$meal_level.'</button> '; 
				echo anchor_popup('meal/meal_info/'. $meal_level, $meal_level) . ' - ';
      }
    }
    else{
      echo 'no meal level provided !';
    }
    ?>

      </div>
    </section> 
	<!-- .section -->

	    
    <!-- END slider -->





   
<div id="id01" class="modal">
  
  <div class=" animate" >
          <div id ='id01' class="col-md-12" style="margin-top:15% ;padding-left:10%; padding-right: 10%; padding-bottom 10%;">
            <div class="form-wrap overlap primary element-animate">
              <h2 class="h2">BMI Planner</h2>
             <?php echo form_open('plan/create_plan') ?> 
			  
			     <input type="hidden" name="age" value="<?php echo $age; ?>">
				<input type="hidden" name="sex" value="<?php echo $sex; ?>">
				<input type="hidden" name="height" value="<?php echo $height; ?>">
				<input type="hidden" name="weight" value="<?php echo $weight; ?>">
				<input type="hidden" name="good_weight" value="<?php echo $good_weight; ?>">
				<input type="hidden" name="calories" value="<?php echo $calories; ?>">
				<input type="hidden" name="ctype" id="ctype" value="standard">
			  
                <div class="form-group">
				  <label for="fname">What is Your target weight?</label>
                  <input type="text" class="form-control" name="pweight" id="pweight" placeholder="Your target weight (Kg)..">
                </div>
                <div class="form-group">
				 <label for="lname">How many long you want to achieve?(week)</label>
                  <input type="text" class="form-control" name="ptime" id="ptime" placeholder="Put a number here..">
                </div>
                <div class="form-group">
                  <div class="select-wrap">
                  <span class="ion-ios-arrow-down select-arrow-icon"></span>
				  
    <label for="meal">Choose calories level each meal  </label>
                  <select name="meal_level" id="meal" class="form-control">
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
                
                <div class="form-group">
                  <input type="submit" class="btn btn-warning btn-block py-3" onclick="document.getElementById('id01').style.display='none'" value="Create Plan">
                </div>
              </form>
            </div>
          </div>
		  </div>
		  </div>
  

<!-- Pop up window start-->

<div id="id05" class="modal" >
  
  <div class=" animate" >
      <div id ='id01' class="col-md-12" style="margin-top:15% ;padding-left:10%; padding-right: 10%; padding-bottom 10%;">
            <div class="form-wrap overlap primary element-animate">
            <?php
switch ($valid) {
	case 'found':
// 		var_dump($details);
		echo $level. '<br />';
		foreach ($details as $detail)
		{
			
			echo 'Name: ' . $detail->name . '<br />';
			echo 'Title: ' . $detail->title . '<br />';
			echo 'Quantity: ' . $detail->quantity . ' ' . $detail->metric .'<br />';
			echo 'Description: ' . $detail->description . '<br />';
			echo 'Image: ' . $detail->image . '<br /><br /><br /><br />';
			
		}
		break;
	case 'no plan':
		echo $level. '<br />';
		echo 'no plan';
		break;

	default:
		echo 'not found';
		break;
}

?>



         </div>
       </div>
  </div>
 </div>
    

    <!-- Pop up window End-->


    <footer >
      
    </footer>
    <!-- END footer -->

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="<?php echo base_url('assests/js/jquery-3.2.1.min.js')?>"></script>             
    <script src="<?php echo base_url('assests/js/popper.min.js')?>"></script>	
	<script src="<?php echo base_url('assests/js/bootstrap.min.js')?>"></script>     
	<script src="<?php echo base_url('assests/js/owl.carousel.min.js')?>"></script>
	<script src="<?php echo base_url('assests/js/jquery.waypoints.min.js')?>"></script>
	<script src="<?php echo base_url('assests/js/jquery.magnific-popup.min.js')?>"></script>
	<script src="<?php echo base_url('assests/js/magnific-popup-options.js')?>"></script>
	<script src="<?php echo base_url('assests/js/main.js')?>"></script>
    
	
	<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}




function myFunction(x) {
  y = x;
  document.getElementById("demo").innerHTML = "Hello World";
}

</script>
	</div>
  </body>
</html>



