<?php
include("../data/db/db.php")
?>


<?php
if(!isset($_FILES['userfile']))
{ echo '<p>Please select a file</p>'; }
else
{
    try {
    $msg= upload(); 
    echo $msg; 
    }
    catch(Exception $e) {
        echo $e->getMessage();
        echo 'Sorry, could not upload file';
    }
}

function upload() {
require_once('file_constants.php');
mysql_set_charset('utf8');

    $maxsize = 100000;

    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {   
                if( $_FILES['userfile']['size'] < $maxsize) { 
                      $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
                    //   mysql_connect($host, $user, $pass) OR DIE (mysql_error());
                    //   mysql_select_db ($db) OR DIE ("Unable to select db".mysql_error());
                    // our sql query
                     $sql = "INSERT INTO upload_image (img) VALUES ('{$imgData}');";
                     mysqli_query($sql) or die("Error in Query: " . mysql_error());
?>
<script>
alert('Recored Update successfully');
location.replace('index.php')</script>
<?php
}
else {
$msg='<div>File exceeds the Maximum File limit</div>
<div>Maximum File limit is '.$maxsize.' bytes</div>
<div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
' bytes</div><hr />';
}
}
else
    $msg="File not uploaded successfully.";
}
else {
 $msg= file_upload_error_message($_FILES['userfile']['error']);
}
?>
<script>
alert('File size is large');
location.replace('index.php')</script>
<?php
    return $msg;
}

function file_upload_error_message($error_code) {
    switch ($error_code) {

        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return ' ';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}
?>