<?php
session_start();
if(isset($_SESSION['errors']))
{
    foreach($_SESSION['errors'] as $error)
    {
        echo $error;
    }
}
unset($_SESSION['errors']);


?>

<form action='handle-upload-json.php' method='post' enctype="multipart/form-data"> <!-- (enctype) => de lazem a7otha fe 7alet lw fe el form input type file "very important note"-->

<!-- <input type="file" name="json" > -->
<input type="file" name="json" >

<br>

<input type="submit" value="upload" name="submit">
<br>




</form>