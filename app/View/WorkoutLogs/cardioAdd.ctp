

<?php echo $this->Html->css('view');  ?>

	<?php echo $this->Html->image('top.png'); ?>
	<!-- HOW DO YOU INCLUDE PICTURES IN CAKEPHP???????
	<img id="top" src="top.png" alt="">
	
	-->
	<div id="form_container">
	
		<h1><a>Cardio Log</a></h1>
		<form id="form_807399" class="appnitro"  method="POST" action="">
					<div class="form_description">
			<h2>Cardio Log</h2>
			<p>Add your Cardio exercise</p>
		</div>						
			<ul >
			
					<li id="li_5" >
		<label class="description" for="element_5">Type of Cardiovascular Exercise: </label>
		<span>
			<input id="element_5_1" name="element_5" class="element radio" type="radio" value="1" />
<label class="choice" for="element_5_1">Running</label>
<input id="element_5_2" name="element_5" class="element radio" type="radio" value="2" />
<label class="choice" for="element_5_2">Walking</label>
<input id="element_5_3" name="element_5" class="element radio" type="radio" value="3" />
<label class="choice" for="element_5_3">Swimming</label>
<input id="element_5_4" name="element_5" class="element radio" type="radio" value="4" />
<label class="choice" for="element_5_4">Elliptical</label>
<input id="element_5_5" name="element_5" class="element radio" type="radio" value="5" />
<label class="choice" for="element_5_5">Cycling</label>
<input id="element_5_6" name="element_5" class="element radio" type="radio" value="6" />
<label class="choice" for="element_5_6">Other</label>

		</span><p class="guidelines" id="guide_5"><small>Which Cardio exercise are you creating a log for? You may only choose one! Please create additional log entries for multiple workouts.</small></p> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Distance </label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_4"><small>How far did you go?</small></p> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Duration (in minutes): </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_3"><small>How long did your workout last? Must be in number format. IE: 30</small></p> 
		</li>		<li id="li_1" >
		<label class="description" for="element_1">Location </label>
		<div>
			<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_1"><small>Where did you complete this workout?</small></p> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Date Of Workout </label>
		<span>
			<input id="element_2_1" name="element_2_1" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_2_1">DD</label>
		</span>
		<span>
			<input id="element_2_2" name="element_2_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_2_2">MM</label>
		</span>
		<span>
	 		<input id="element_2_3" name="element_2_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_2_3">YYYY</label>
		</span>
	
		<span id="calendar_2">
			<img id="cal_img_2" class="datepicker" src="images/calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_2_3",
			baseField    : "element_2",
			displayArea  : "calendar_2",
			button		 : "cal_img_2",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectEuropeDate
			});
		</script>
		<p class="guidelines" id="guide_2"><small>Date you completed this workout.</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="807399" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Add Workout" />
		</li>
			</ul>
		</form>	
		
		<?php echo $this->Html->script(array('view','calendar')); ?>
