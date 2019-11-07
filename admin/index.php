<?php
   include("../data/db/db.php");
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
	$image_name = $_FILES['image']['name'];
    // convert into blob 
	$image_bolob = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	// Query for executions  
	$sql = "INSERT INTO `product`(`mime`, `data`, `url`) VALUES ('$image_name', '$image_bolob','demo')";
  	// execute query
	$result = mysqli_query($link, $sql);
	if($result){
		echo "Your Data is Inserted SuccessFully";
		header("Location: index.php");
	}else{
		echo "<script>alert('Your Data is Not Inserted SuccessFully')</script>";
	 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   .row {
  	display: flex;
	}

/* Create three equal columns that sits next to each other */
.column {
  flex: 33.33%;
  padding: 5px;
}
</style>
</head>
<body>
<div id="content">
  <?php
   $result = mysqli_query($link, "SELECT * FROM `product`");
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
  	  <input type="file" name="image">
  	</div>
  	<div>
      <input  id="text" name="image_url"  placeholder="Enter Url Data"></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">Submit Product Image</button>
  	</div>
  </form>
</div>
</body>
</html>