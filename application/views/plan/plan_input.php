<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>
<?php echo "Hello";?>
<div id="container">
<?php echo validation_errors(); ?>
<?php echo form_open('plan/create') ?>
	<h2>Input your details</h2>

<input type="hidden" name="ctype" id="ctype" value="standard">
<tr>
	<td width="50">Age</td>
	<td width="370"><input type="text" name="cage" id="cage" class="innormal"></td>
</tr>
<tr>
	<td>Gender</td>
	<td><label for="csex1"><input type="radio" name="csex" id="csex1" value="male"  /> male</label> &nbsp; <label for="csex2"><input type="radio" name="csex" id="csex2" value="female"  /> female</label></td>
</tr>
</table>

<table width="420" id="metricheightweight">
<tr>
	<td width="50">Height</td>
	<td width="370"><input type="text" name="cheightmeter" id="cheightmeter"  class="innormal"> centimeters</td>
</tr>
<tr id="metricweight">
	<td>Weight</td>
	<td><input type="text" name="ckg" id="ckg" class="innormal"> kilograms</td>
</tr>
</table>
<table width="500">
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
	<td width="450"><input name="printit" value="0" type="hidden"><input type="image" src="//d26tpo4cm8sb6k.cloudfront.net/img/svg/calculate.svg" value="Calculate" alt="Calculate"></td>
</tr>
</form>





</body>
</html>