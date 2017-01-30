<?php	include("sources.php"); ?>
<html>
<head>
	<title>Track Shipment</title>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
</head>
 <script type = "text/javascript" language = "javascript">
 $(document).ready(function() {
	$("#trackNav").attr("class", "disabled");
	$( ".trackNav" ).append( "<div class='down' style='left: 70;'></div>" );
 $("#validate-form").validate({
	//specify the validation rules
	rules: {
	Orderid: {
		  required: true,
		//  number: true,
	}
		},
		 
		 submitHandler: function(form){
			form.submit();
		}
	 
	});
});
</script>
	<body>
	
	<div id="content-shipment"></br>
			<div class="panel panel-default">
			<div class="panel-heading"><h2>Track Shipment</h2>
			<p>Check the status of your shipment with our online track. It gives you real-time and detailed progress of your shipment. </p></div>
			<div class="panel-body">
				<form name = "Track" method = "post" action = "" id = "validate-form">
				<div class="row" id="col" >
					<div class="col-lg-3 col-md-3 col-xs-12">
						<label>Enter Order ID &nbsp; : &nbsp;</label>
						<input type="text" name = "Orderid" class= "inputbox" placeholder="Enter Order ID " style="position:relative;width:100%;">
						<p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
						<input type = "submit" name="submit" value ="Submit"  id ="Submit" class = "btn"  />
					</div>
					<div class="col-lg-9 col-md-9 col-xs-12">
						<table class="table table-bordered" style="display:none" id="myTable">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Date</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>	
					</div>
				</div>
				</form>
			</div>
			</div>
	</div>

	</body>
	
</html>
<?php  
if(isset($_POST['submit'])){
		$Orderid = $_POST['Orderid'];
		$check_id = "SELECT OrderID,OrderDate,status FROM Shipment 
		WHERE OrderID=$Orderid ORDER BY OrderDate ";
		
		if ($result = mysqli_query($conn, $check_id))
		{ 
		while($row=mysqli_fetch_row($result)):
		echo '<script> $(".table").show();</script>';
		echo '<script>
				    var table = document.getElementById("myTable");
					var row = table.insertRow();
					var cell1 = row.insertCell(0);
					var cell2 = row.insertCell(1);
					var cell3 = row.insertCell(2);
					cell1.innerHTML = "  '.$row[0].' ";
					cell2.innerHTML = " '.$row[1],' ";
					cell3.innerHTML = " '.$row[2].' ";
				</script>';	
		endwhile;
		}
		else{
		echo "Not found";
		}
		
		
	
}
?>

