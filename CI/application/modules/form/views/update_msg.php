<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- JQUERY CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">	
		<title>form</title>
		<!-- EXTERNAL CSS LINK -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/index.css');?>">	
	</head>
	<body>	
		<div class="right">
			<!-- LINK TO VIEW PAGE -->
			<a style="border: 1px solid red; background-color: red;" href="<?php echo site_url('Form/view'); ?>">Cancel</a>	
			<form name="myForm" id="myform">
				<pre>
					<fieldset>
						<legend>Form Details</legend>
						<!-- /* VARIABLE '$Data' FROM 'FORM/EDIT' */
							 /* Get the value from '$Data->Table_column_name' */
						 -->
						
						<input type="hidden" name="id" value="<?php echo $Data->UID?>">
						
						First Name<span>*</span>		:	<input type="text" name="fname" value="<?php echo $Data->FirstName?>"><p id="ans1"></p>
						
						Last Name<span>*</span>		:	<input type="text" name="lname" value="<?php echo $Data->LastName?>"><p id="ans2"></p>
						
						DOB<span>*</span>			:	<input type="date" name="dob" style="width:160px;" value="<?php echo $Data->DOB?>"> <p id="ans3"></p>
						
						Mobile<span>*</span>			:	<input type="tel" name="mob" onkeypress="return isNumber(event)" value="<?php echo $Data->Mobile?>"><p id="ans4"></p>
						
						Email<span>*</span>			:	<input type="mail" name="mail" value="<?php echo $Data->Mail?>"><p id="ans5"></p>
						
						Gender<span>*</span>			:	<input type="radio" name="gender" value="Male" <?php echo $Data->Gender== "Male" ? "checked='checked'" : "" ; ?>>Male<input type="radio" name="gender" value="Female" <?php echo $Data->Gender== "Female" ? "checked='checked'" : "" ;?>>Female<p id="ans6"></p>
						
						Key Skills<span>*</span>		:	<select class="dropdown" name="dropdown" style="width: 170px;">
																<option value="">Select Skills</option>
																<option value="Html" <?php echo $Data->Skils== 'Html' ? 'selected :"selected"' : '' ;?>>Html</option>
																<option value="Css" <?php echo $Data->Skils== 'Css' ? 'selected :"selected"' : '' ;?>>Css</option>
																<option value="Js" <?php echo $Data->Skils== 'Js' ? 'selected :"selected"' : '' ;?>>Js</option>
																<option value="PHP" <?php echo $Data->Skils== 'PHP' ? 'selected :"selected"' : '' ;?>>PHP</option>
															</select><p id="ans7"></p>
						
						Comments<span>*</span>		:	<textarea name="text" style="width: 165px;"><?php echo $Data->Comments; ?></textarea><p id="ans8"></p>
						<!-- TABLE FOR EDUCATION TABLE -->
						<table border="1" style="margin-left: 150px;">
							<h4>Educational Details:</h4>
							<tr>
								<th>Course</th>
								<th>Name Of Institution</th>
								<th>Year Of Passing</th>
								<th>Percentage Secured</th>
								<th><input type="button" name="addRow" id="addRow" value="+"></th>
							</tr>
							<!-- VARIABLE '$EduData' FROM 'FORM/EDIT' -->
							<?php foreach ($EduData as $key => $value) { ?>
							<tr>
								<!-- FORMAT: VARIABLE_NAME[KEY]->COLUMN_NAME -->
								<td><input type="text" name="Course[]" required value="<?php echo $EduData[$key]->Course;?>"></td>
								<td><input type="text" required name="Institution[]" value="<?php echo $EduData[$key]->NameOfInstitution;?>"></td>
								<td><input type="text" required name="YearOfPassing[]" value="<?php echo $EduData[$key]->YearOfPassing;?>"></td>
								<td><input type="text" required name="Percentage[]" value="<?php echo $EduData[$key]->PercentageSecured;?>"></td>
								<td><input type="button" name="remove" class="remove" value="-"></td>
							</tr>
						<?php } ?>
						</table>

							<input type="checkbox" name="tick">I accept the <a class="terms" href="#href">Terms and Conditions</a><p id="ans9"></p>

								<button id="myfun" type="button"  class="submit" >Update</button>
					</fieldset>
				</pre>
			</form>
		</div>
		<script type="text/javascript" src="<?php echo base_url('assets/script.js');?>"></script>	<!-- EXTERNAL JS LINK -->
		<script>

			/* UPDATE USING AJAX */
			/* SERIALIZING THE FORM VALUE AND STORE IN THE VARIABLE 'FORMDATA' */

			$('#myfun').click(function()	
			{
				if (myfunction()== false) {	// CODE FOR JS VALIDATION //
					return;
				}
				var FormData = $('#myform').serialize();
				$.ajax({
					type : 'post',
					url: '<?php echo base_url();?>Form/update',
					data: FormData,
					dataType: 'json',
					success: function($a)	
					{
						if (confirm($a)){
						window.location = "<?php echo base_url();?>Form/view";	// REDIRECT LOCATION //
					}
					}
				});
			});

			/* ADD NEWROW SCRIPT FOR EDUCATIONAL DETAILS TABLE */

			$(document).ready(function ()
			{
				$('#addRow').click(function()
				{	
					var newRow = "<tr>";
					newRow+="<td><input type='text' required name='Course[]'></td>";
					newRow+="<td><input type='text' required name='Institution[]'></td>";
					newRow+="<td><input type='text' required name='YearOfPassing[]'></td>";
					newRow+="<td><input type='text' required name='Percentage[]'></td>";
					newRow+="<td><button class='remove' >-</button></td>";
					newRow+="</tr>";
					$("tbody").append(newRow);	//APPENDING VARIABLE NEWROW IN TABLE BODY //
				});
			});

			/* REMOVE ROW */

			$(document).on('click','.remove',function()
			{
			  $(this).parents('tr').remove();
			});
		</script>
	</body>
</html>