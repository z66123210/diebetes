<!doctype html>
<html lang="en">
  <head>
   <title>Colorlib Fitnezz</title>
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
.text{
	
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
    
  <section class="section bg-light element-animate" style="padding-bottom:0px;">

      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>your weight-loss Plan</h2>
             <!-- <span class="back-text-dark">span</span> -->
            </div>
          </div>
        </div>
      </div>


       <div class="container" style= "padding-bottom:10%">
        
        <div class="row no-gutters">
        <div class="col-md-12">
          <div class="sched d-block d-lg-flex" >
                          <div class="text " style="border: solid black 2px;padding: 5px;">
              <h3><span class='span'><?php echo $change_weight_per_day ?> Kg</span></h3>
              <p>Weight change per day</p>
           
              
            </div>
            <div class="text order-1" style="border: solid black 2px;padding: 5px;">
              <h3><span class='span'><?php echo $change_calories_per_day ?> Kcal/day</span></h3>
              <p>Calories change per day</p>
             
              
            </div>
            
            <div class="text " style="border: solid black 2px;padding: 5px;">
              <h3><span class='span'><?php echo $change_calories_per_day_by_meal ?> Kcal/day</span></h3>
              <p>Calories change per day by meal</p>
           
              
            </div>
            <div class="text order-1" style="border: solid black 2px;padding: 5px;">
              <h3><span class='span'><?php echo $change_calories_per_day_by_activity ?> Kcal/day</span></h3>
              <p>Calories change per day by activity</p>
             
              
            </div>

            
            
          </div>
         
           
          <div class="container-fluid">
          <div class="row" >
          <div class="col">
            <a href="update_plan" class="btn btn-primary" role="button">Change Plan</a>
            </div>
            <div class="col">
            <a href="update_plan" class="btn btn-primary" role="button">Save Plan</a>
         </div>
         </div>
         </div>

      </div>




    </section>
	

     

          
        </div>
        
		        
		  
		  
          
           
             


            
       
		
		
	

      </div>
   
	
	
	
	
	
	
	
	
	
	
    


  <!--  <footer class="site-footer" role="contentinfo">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4 mb-5">
            <h3>About Us</h3>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus et dolor blanditiis consequuntur ex voluptates perspiciatis omnis unde minima expedita.</p>
            <ul class="list-unstyled footer-link d-flex footer-social">
              <li><a href="#" class="p-2"><span class="fa fa-twitter"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-linkedin"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
            </ul>

          </div>
          <div class="col-md-5 mb-5">
            <h3>Contact Info</h3>
            <ul class="list-unstyled footer-link">
              <li class="d-block">
                <span class="d-block">Address:</span>
                <span class="text-white">34 Street Name, City Name Here, United States</span></li>
              <li class="d-block"><span class="d-block">Telephone:</span><span class="text-white">+1 242 4942 290</span></li>
              <li class="d-block"><span class="d-block">Email:</span><span class="text-white">info@yourdomain.com</span></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <h3>Quick Links</h3>
            <ul class="list-unstyled footer-link">
              <li><a href="#">About</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Disclaimers</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-3">
          
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-md-center text-left">
            

          </div>
        </div>
      </div>
    </footer> -->
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
    </div>
  </body>
</html>



