<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>backend</title>
		<!-- LINKING EXTERNAL CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/index.css');?>">
		<!-- DATATABLE CDN -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
		<!-- FONT AWESOME CDN -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<!-- BOOTSTRAP CDN -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<style type="text/css">	/* INTERNAL CSS */
			.right
			{
	 			border: 1px solid black;
				height: 1200px;
				margin-left: 200px;
				margin-top: 150px;
				background: #63e5ff;
				position: absolute;
			}
		</style>
	</head>
	<body>
		<div class="right">
			<a style="border: 1px solid red; background-color: red;" href="<?php echo base_url(); ?>">Add</a>	<!--Link to form  -->
			<!-- CODE FOR DISPLAY DATA IN TABLE -->
			<center><table id="myTable" border="1">
				<thead>
					<tr>
						<th>Id</th>
						<th>FirstName</th>
						<th>LastName</th>
						<th>DOB</th>
						<th>Gender</th>
						<th>Mobile</th>
						<th>Mail</th>
						<th>Skils</th>
						<th>Comments</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($Data as $res) //$Data value from Form/insert
						{ ?>
							<tr>
							<td><?=$res->UID?></td>
							<td><?=$res->FirstName?></td>
							<td><?=$res->LastName?></td>
							<td><?=$res->DOB?></td>
							<td><?=$res->Gender?></td>
							<td><?=$res->Mobile?></td>
							<td><?=$res->Mail?></td>
							<td><?=$res->Skils?></td>
							<td><?=$res->Comments?></td>
							<td>
								<!-- * EDIT BUTTON FOR EDITING THE SUBMITED FORM * -->
								<a class="btn1" title="Edit" href="<?php echo base_url('Form/edit/'.$res->UID);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | 
								<!-- * DELETE BUTTON FOR DELETING THE SUBMITED FORM * -->	
								<button class="btn2" title="Delete" data-id="<?php echo $res->UID; ?>"><i class="fa fa-trash" aria-hidden="true"></i></button> | 
								<!-- *DETAILS BUTTON FOR DISPLAY THE DATA USING BOOTSTRAP MODALS* -->
								<button type="button" class="btn3" title="Details" data-id="<?php echo $res->UID; ?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye" aria-hidden="true"></i></button>
							</td>
							</tr>
							<?php 
						}
			 		?>
			 		<!-- Model -->
			 		<div class="modal" id="myModal">
					    <div class="modal-dialog">
					    	<div class="modal-content">
					        	<!-- Modal Header -->
					        	<div class="modal-header">
					          		<h4 class="modal-title">Modal Heading</h4>
					          		<button type="button" class="close" data-dismiss="modal">&times;</button>
					        	</div>
					        
					        	<!-- Modal body -->
					        	<div class="modal-body">
					        		<div id="mod1"></div>
					        	</div>
					        
					        	<!-- Modal footer -->
					        	<div class="modal-footer">
					          		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					        	</div>
					    	</div>
					    </div>
					</div>
				</tbody>
			</table></center>
			<br><br>
		</div>
		<!-- JQUERY CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
		<!-- DATATABLE JS CDN -->
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
		<!-- BOOTSTRAP CDN -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<script>
			
			/* Script for DataTable */
			$(document).ready(function(){
				$('#myTable').dataTable({
					dom: 'Bfrtip',
					buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print'
					]
				});
			});


			/* Script for delete data */
			$(document).ready(function ()
			{
				$(".btn2").click(function()
				{
					if (confirm('Are you want to delete'))
					{
						var del = $(this).closest('tr');
						var id = $(this).attr("data-id");
						$.ajax({
							type : 'post',
							url :"<?php echo base_url()?>Form/delete",
							data : {id:id},
							success : function()
							{
								del.remove();	//Remove data using .remove().
							}
						});
					}
				});
			});

			
			/* SCRIPT FOR MODEL */

			$(document).ready(function ()
			{
				$(".btn3").click(function()
				{
				var del = $(this).closest('tr');
			  	var id = $(this).attr("data-id");
			  	$.ajax({
			  		type : 'post',
			  		url: "<?php echo base_url()?>Form/display",
			  		datatype: 'json',
			  		data:{id:id},
			  		success: function(data)
			  		{
			  			var data1 = JSON.parse(data);
			  			var data2 = data1.Data;
			  			var data3 = data1.EduData;
			  			/* TABLE FOR MODEL */
			    		result = "<table border='1'>";
			    		
			    			result += "<tr>";
							result += "<th colspan = '2'>Personal Details </th>";
							result += "</tr>";
							result += "<tr>";
							result += "<td>FName: </td><td>" + data2.FirstName +"</td>";
							result += "</tr>";
							result += "<tr>";
							result += "<td>LName: </td><td>" + data2.LastName +"</td>";
							result += "</tr>";

							result += "<tr>";
							result += "<td>Email: </td><td>" + data2.Mail +"</td>";
							result += "</tr>";

							result += "<tr>";
							result += "<td>DOB: </td><td>" + data2.DOB +"</td>";
							result += "</tr>";

							result += "<tr>";
							result += "<td>Mobile: </td><td>" + data2.Mobile +"</td>";
							result += "</tr>";

							result += "<tr>";
							result += "<td>Gender: </td><td>" + data2.Gender +"</td>";
							result += "</tr>";

							result += "<tr>";
							result += "<td>Skills: </td><td>"+ data2.Skils +"</td>";
							result += "</tr>";

							result += "<tr>";
							result += "<td>Comments: </td><td>"+ data2.Comments +"</td>";
							result += "</tr>";
					
						result += "</table>";

						result += "<table border='1'>";
							result += "<th>Course</th>";
							result += "<th>NameOfInstitution</th>";
							result += "<th>YearOfPassing</th>";
							result += "<th>PercentageSecured</th>";

							for (var i = 0; i<data3.length; i++) 
							{
								result += "<tr>"
								result += "<td>"+data3[i].Course+"</td>";
								result += "<td>"+data3[i].NameOfInstitution+"</td>";
								result += "<td>"+data3[i].YearOfPassing+"</td>";
								result += "<td>"+data3[i].PercentageSecured+"</td>";
								result += "</tr>";
							}
							result += "</table>";
							$('#mod1').html(result);
						}
					});
				});
			});
		</script>
	</body>
</html>