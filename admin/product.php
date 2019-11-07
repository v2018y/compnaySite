<?php
   include("../data/db/db.php");
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
	// Get Client Name
	$client_name=$_POST['person_name'];
	// Get Client Name
	$compnay_name=$_POST['compnay_name'];
	// Get Product Discrptions
	$prod_disc=$_POST['product_disp'];
	// Get image name
	$image_name = $_FILES['image']['name'];
    // convert into blob 
	$image_bolob = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	// Query for executions  
	$sql = "INSERT INTO `product`( `mime`, `data`, `client_name`, `compnay_name`,`prodDisc`) VALUES ('$image_name', '$image_bolob','$client_name','$compnay_name','$prod_disc')";
  	// execute query
	$result = mysqli_query($link, $sql);
	if($result){
		echo "Your Data is Inserted SuccessFully";
		header("Location: product.php");
	}else{
		echo "<script>alert('Your Data is Not Inserted SuccessFully')</script>";
	 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Product Informations Upload</title>
<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
<script src="../js/jquery-2.2.3.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
</head>
<script>
$(document).ready(function() {
    $('#example').DataTable(
		{"columns": [
            { "data": "id" },
            { "data": "image_name" },
            { "data": "image" },
			{ "data": "" }
		],
		"lengthMenu": [[2,5,10, 25, 50, -1], [2,5,10, 25, 50, "All"]],
		"pagingType": "full_numbers",
		"iDisplayLength": 2
	}
	);
} );
</script>
<body>
<div id="content">
<form method="POST" enctype="multipart/form-data">
  	<div>
  	  <input type="file" name="image" ><br>
      <input type="text" id="text" name="person_name"  placeholder="Enter Project Client Name" /><br>
	  <input type="text" id="text" name="compnay_name"  placeholder="Enter Compnay Name" /><br>
	  <textArea id="text" name="product_disp"  placeholder="Enter Product Discription" ></textArea>
	  <input type="submit" name="upload" value="Submit Product Details">
  	</div>
</form>
<hr>
<table id="example" class="display" style="width:100%">
      <thead>
        <tr>
          <th>id</th>
          <th>Image name</th>
          <th>Image</th>
		  <th></th> 
		</tr>
      </thead>
	  <tbody>
		 <?php 
		 $result = mysqli_query($link, "SELECT * FROM `product`");
		 echo "<div class='row'>";	
		 while ($row = mysqli_fetch_array($result)) {
		 ?>
			<tr>
			  <td><?php echo $row['id']  ?></td>
			  <td><?php echo $row['mime']  ?></td>
			  <td> <img src='data:image/jpeg;base64,<?php echo base64_encode($row['data']) ?>' alt='<?php echo $row['mime'] ?>'  class="img-thumbnail" width="307" height="240"/> </td>
			  <td><button class="button1">Edit </button> <button class="button2">Delete</button></td>
			</tr>
		 <?php }?>
	  </tbody>
</table>
</div>
</body>
</html>