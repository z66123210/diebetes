
<!doctype html>
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
	.clearfix{
	
	padding: 0px !important;
	margin: 0px  !important;
}
	</style>
	
  </head>
  <body>
    
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
      </nav>
    </header>
    <!-- END header -->
    
  <section class="section bg-light element-animate" style="padding-bottom:0px;">

      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Meal Suggestion</h2>
              <span class="back-text-dark"></span>
            </div>
          </div>
        </div>
      </div>

<?php
switch ($valid) {
	case 'found':
// 		var_dump($details);
		echo '<p><b> Meal Level: </b>'. $level. '<br /></p>';
		foreach ($details as $detail)
		{
			
			echo '<b>Name: </b>' . $detail->name . '<br />';
			echo '<b>Title: </b>' . $detail->title . '<br />';
			echo '<b>Quantity: </b>' . $detail->quantity . ' ' . $detail->metric .'<br />';
			echo '<b>Description: </b>' . $detail->description . '<br />';
			echo '<b>Note: </b>' . $detail->note . '<br />';
			echo '<b>Image: </b> <img src =../' . $detail->image . '><br /><br /><br /><br />';
// 			 "$showimage">
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

 <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

<script src="<?php echo base_url('assests/js/jquery-3.2.1.min.js')?>"></script>             
<script src="<?php echo base_url('assests/js/popper.min.js')?>"></script>	
<script src="<?php echo base_url('assests/js/bootstrap.min.js')?>"></script>     
<script src="<?php echo base_url('assests/js/owl.carousel.min.js')?>"></script>
<script src="<?php echo base_url('assests/js/jquery.waypoints.min.js')?>"></script>
<script src="<?php echo base_url('assests/js/jquery.magnific-popup.min.js')?>"></script>
<script src="<?php echo base_url('assests/js/magnific-popup-options.js')?>"></script>
<script src="<?php echo base_url('assests/js/main.js')?>"></script>

</body>
</html>