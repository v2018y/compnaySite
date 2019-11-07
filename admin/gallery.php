<?php
   include("../data/db/db.php");
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
	// Get Client Name
	$client_name=$_POST['person_name'];
	// Get Client Name
	$compnay_name=$_POST['compnay_name'];
	// Get image name
	$image_name = $_FILES['image']['name'];
    // convert into blob 
	$image_bolob = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	// Query for executions  
	$sql = "INSERT INTO `gallery`( `mime`, `data`, `clientName`, `clientCompnay`) VALUES ('$image_name', '$image_bolob','$client_name','$compnay_name')";
  	// execute query
	$result = mysqli_query($link, $sql);
	if($result){
		echo "Your Data is Inserted SuccessFully";
		header("Location: gallery.php");
	}else{
		echo "<script>alert('Your Data is Not Inserted SuccessFully')</script>";
	 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Gallery Image Upload</title>
<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<div id="content">
  <?php
   $result = mysqli_query($link, "SELECT * FROM `gallery`");
   echo "<div class='row'>";	
   while ($row = mysqli_fetch_array($result)) {
	   echo "<div class='column'>";
      	echo "<img  style='width:100%' src='data:image/jpeg;base64,".base64_encode($row['data'])."'>";
		  echo "<p>".$row['mime']."</p>";
		  echo "</div>";
	}
	echo "</div>";
  ?>
  <form method="POST" enctype="multipart/form-data">
  	<div>
  	  <input type="file" name="image" ><br>
      <input type="text"  id="text" name="person_name"  placeholder="Enter Project Client Name" /><br>
	  <input type="text" id="text" name="compnay_name"  placeholder="Enter Compnay Name" /><br>
	  <input type="submit" name="upload" value="Submit Iamge Details">
  	</div>
  </form>
</div>
</body>
</html>