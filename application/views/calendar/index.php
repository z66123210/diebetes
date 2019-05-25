<!DOCTYPE html>
<html>
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

	
		<link href='../scripts/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
		<link href='../scripts/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<script src='../scripts/fullcalendar/lib/jquery.min.js'></script>
		<script src='../scripts/fullcalendar/lib/moment.min.js'></script>
		<script src='../scripts/fullcalendar/fullcalendar.min.js'></script>
		<script>

			$(document).ready(function() {

				$('#calendar').fullCalendar({
					defaultDate: '2018-03-12',
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					events: [
						{
							title: 'My Event',
							start: '2018-03-12',
							description: 'This is a cool event'
						}
						// more events here
					],
// 					eventRender: function(event, element, view) {
// 						element.qtip({
// 							content: event.description
// 						});
// 					}
				});

			});

		</script>


		<style>

			body {
				margin: 40px 10px;
				padding: 0;
				font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
				font-size: 14px;
			}

			#calendar {
				max-width: 900px;
				margin: 0 auto;
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
                <a class="nav-link active" href="<?php echo base_url('')?>">Home</a>
              </li>
              <li class="nav-item cta-btn" style="border:solid black 2px;">
                <a class="nav-link" href="<?php echo base_url('plan')?>">Plan</a>
              </li>
             
              <li class="nav-item cta-btn" style="border:solid black 2px;">
                <a class="nav-link" href="<?php echo base_url('Report')?>">Calendar</a>
              </li>
 
            </ul>


            
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->
    <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Calendar</h2>
              <span class="back-text-dark"></span>
            </div>
          </div>
        </div>
      </div>
  

		<div id='calendar'></div>
		Plan weight : 68 kg <br />
		Time to complete: 12 weeks <br />
		2kg remaining need to be reduced <br />

	
	</body>
</html>
