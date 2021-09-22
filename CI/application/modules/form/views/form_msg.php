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
		 <!-- External CSS link -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/index.css');?>">
	</head>
	<body>	
		<div class="right">
			<!-- LINK TO VIEW PAGE  -->
			<a style="border: 1px solid red; background-color: red;" href="<?php echo site_url('Form/view'); ?>">Show Data</a> 
			<form name="myForm" id="myform" method="post">
				<pre>
					<fieldset>
						<legend>Form Details</legend>
						<!-- FIRST NAME -->
						First Name<span>*</span>		:	<input type="text" name="fname" id="fname_error">
						<!-- LAST NAME -->
						Last Name<span>*</span>		:	<input type="text" name="lname" id="lname_error">
						<!-- DATE OF BIRTH -->
						DOB<span>*</span>			:	<input type="date" name="dob" id="dob_error" style="width: 170px;">
						<!-- MOBILE NUMBER -->
						Mobile<span>*</span>			:	<input type="tel" name="mob" id="mob_error" onkeypress="return isNumber(event)">
						<!-- EMAIL -->
						Email<span>*</span>			:	<input type="mail" name="mail" id="mail_error">
						<!-- GENDER -->
						Gender<span>*</span>			:	<input type="radio" name="gender" value="Male">Male<input type="radio" name="gender" value="Female">Female<span id="gender_error"></span>
						<!-- SKILLS -->
						Key Skills<span>*</span>		:	<select class="dropdown" name="dropdown" id="skills_error" style="width: 175px;">
							<option value="">Select Skills</option>
							<option>Html</option>
							<option>Css</option>
							<option>Js</option>
							<option>PHP</option>
						</select>
						<!-- COMMENTS -->
						Comments<span>*</span>		:	<textarea name="text" id="Comments_error" style="width: 170px;"></textarea>
						
						<!-- TABLE FOR GETTING EDUCATIONAL DETAILS -->
						<table border="1" style="margin-left: 150px;">
							<h4>Educational Details:</h4>
							<tr>
								<th>Course</th>
								<th>Name Of Institution</th>
								<th>Year Of Passing</th>
								<th>Percentage Secured</th>
								<th><input type="button" name="addRow" id="addRow" value="+"></th> <!-- BUTTON FOR ADDING NEW ROW -->
							</tr>
							<tr>
								<td><input type="text" name="Course[]"></td>
								<td><input type="text" name="Institution[]" ></td>
								<td><input type="text" name="YearOfPassing[]" ></td>
								<td><input type="text" name="Percentage[]"></td>
								<td><input type="button" name="remove" class="remove" value="-"></td>
							</tr>
						</table><span id="edu_error"></span><span id="edu1_error"></span><span id="edu2_error"></span><span id="edu3_error"></span>
						<!-- CHECKBOX -->
								<input type="checkbox" name="tick">I accept the <a class="terms" href="#href">Terms and Conditions</a><p id="checkbox_error"></p>
								<button id="myfun" class="submit" >Submit</button>
					</fieldset>
				</pre>
			</form>
		</div>
		
		<script>
			/* VALIDATION USING AJAX */
			$(document).ready(function(){
				$('#myform').on('submit',function(e){
					e.preventDefault();
					$.ajax({
						type : 'post',
						url:"<?php echo base_url('Form/insert');?>",
						data : $(this).serialize(),
						dataType: "json",
						beforeSend: function(){
							$('.error').remove();
						},
						success:function(msg){
							if (msg.status == "success") {
								alert(msg.message);
								$("#myform")[0].reset();
							}else{
								alert(msg.message);
								Object.keys(msg).forEach(function(value){
									if (msg[value] == "")
									{
										$('#' + value).after(msg[value]);
										$('#' + value).css('border-color','green');
									}else{
									$('#' + value).after(msg[value]);
									$('#' + value).css('border-color','red');
								}
								});
							}
						}
					});
				});
			});

			// ADD NEWROW SCRIPT FOR EDUCATIONAL DETAILS TABLE //
			$(document).ready(function (){
			  $('#addRow').click(function(){
			    var newRow = "<tr>";
			    newRow+="<td><input type='text' name='Course[]'></td>";
			    newRow+="<td><input type='text' name='Institution[]'></td>";
			    newRow+="<td><input type='text' name='YearOfPassing[]'></td>";
			    newRow+="<td><input type='text' name='Percentage[]'></td>";
			    newRow+="<td><button class='remove' >-</button></td>";
			    newRow+="</tr>";
			    $("tbody").append(newRow);	//APPENDING VARIABLE NEWROW IN TABLE BODY //
			  });
			});
			// REMOVE ROW //
			$(document).on('click','.remove',function(){	// CLICK FUNVTION FOR ".remove" //
			  $(this).parents('tr').remove();	// REMOVE THE CLICKED 'td' AND THEIR PARENT 'tr' //
			});
		</script>
	</body>
</html>