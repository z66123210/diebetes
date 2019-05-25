<script>
var el = document.getElementById('foo');
el.onclick = showFoo;


function showFoo() {
  alert('I am foo!');
  return false;
}
</script>
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
echo '<h2> You Details</h2>'; 

echo '<br /> <p> Your name: '.$this->session->name;
echo '<br /> <p> Your age: '. $this->session->age . 'years old';
echo '<br /> <p> Your Gender: '. $this->session->sex;
echo '<br /> <p> Your Height: '.$height.' m';
echo '<br /> <p> Your Weight: '.$this->session->weight. ' kg';
echo '<br /> <p> Your BMI: '.$bmi.'. Your classification: '.$classification;
echo '<br /> <p> Your BMI standards is: 25 . Your weight should be: '.$good_weight;

echo '<br /> <p> To maintain your weight you need: '.$calories. ' Kcal/day. <br />';
echo '<br /> <p> To lose 0.5 kg per week you need: '.$lose05 . ' Kcal/day. (not possible if you are underweight)<br />';
echo '<br /> <p> To lose 1 kg per week you need: '.$lose1 .' Kcal/day. (not possible if you are underweight) <br />';
echo '<br /> <p> To gain 0.5 kg per week you need: '.$gain05 . ' Kcal/day. <br />';
echo '<br /> <p> To gain 1 kg per week you need: '. $gain1 . ' Kcal/day. <br />';

echo '<br />The American Academy of Nutrition and Dietetics recommends that women never eat less than 1,200 calories and men never eat less than 1,800 calories per day. <br />';
echo '<br />Choose your meal plan based on your calories level here: <br />';

echo '<p> Your Plan: <br />';
// var_dump($this->session->plan);
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


<br />
<?php 

if ($this->session->meal_levels)
{
	
	foreach ($this->session->meal_levels as $meal_level)
	{
// 		echo '<br />';
		?>
		
		<a href="no-javascript.html" title="Get some foo!" id="foo">Show me some foo</a>
<?php		
	}
}
else{
	echo 'no meal level provided !';
}
?>




	<?php echo validation_errors(); ?>
<?php echo form_open('plan/create_plan') ?>
	<h2>Create your plan</h2>
	

	<td width="50">Which weight do you want to reach?</td>
	<td width="370"><input type="text" name="pweight" id="pweight" class="innormal"></td>
</div>
<div>
	

	<td width="50">How long do you want to achieve?</td>
	<td width="370"><input type="text" name="ptime" id="ptime"  class="innormal"> week</td></tr>
</div>
<div>
	

	<td width="50">Choose calories level each meal</td>
	<td width="370"><select name="meal_level">
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


<!-- <table width="500"> -->
<!-- <tr>
	<td width="50">Activity</td>
	<td width="450">
		<select id="cactivity" name="cactivity">
			<option value="1" >Basal Metabolic Rate (BMR)</option>
			<option value="1.2" >Sedentary - little or no exercise</option>
			<option value="1.375">Lightly Active - exercise/sports 1-3 times/week</option>
			<option value="1.55" >Moderatetely Active - exercise/sports 3-5 times/week</option>
			<option value="1.725" >Very Active - hard exercise/sports 6-7 times/week</option>
			<option value="1.9" >Extra Active - very hard exercise/sports or physical job</option>
		</select>
	</td>
</tr> -->
<tr>
	<td width="50">&nbsp;</td>
	<td width="450"><input name="printit" value="0" type="hidden"><input type="image" src="//d26tpo4cm8sb6k.cloudfront.net/img/svg/calculate.svg" value="Plan" alt="Calculate"></td>
</tr>
</form>

<br /><br /><br /><br /><p><a href="create">Check report</a></p>

