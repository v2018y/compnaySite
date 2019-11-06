<?php
$host = 'sql310.epizy.com';
$user = 'epiz_22507512';
$pass = 'Vishvanath1';

$link = mysqli_connect($host, $user, $pass);
if (!$link) {
    die("Database selection failed: " . mysqli_connect_error());
}

$db_select =mysqli_select_db('epiz_22507512_hibDemo');
if (!$db_select) {
    die("Database selection failed: " . mysqli_connect_error());
}
// $upload_image=$_FILES[" myimage "][ "name" ];

// $folder="/xampp/htdocs/images/";

// move_uploaded_file($_FILES[" myimage "][" tmp_name "], "$folder".$_FILES[" myimage "][" name "]);

// $insert_path="INSERT INTO image_table VALUES('$folder','$upload_image')";

// $var=mysql_query($inser_path);
?>