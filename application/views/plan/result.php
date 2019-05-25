<!doctype html>



<link rel="stylesheet" href="<?php echo base_url('assests/styles/result.css')?>">   


  <body>
		<title>Diabetes Monitoring App</title>
  <div class="content">
    
   
    

 

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



