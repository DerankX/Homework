<?php
require_once("connection.php");
if(isset($_POST['update']))
{
    $ID = $_GET['id'];
    $name = $_POST['name'];
    $gps = $_POST['gps'];

    $query = " update place set name = '".$name."', gps='".$gps."' where id='".$ID."'";
    $result = mysqli_query($con,$query);
    if($result)
    {
        header("location:view.php");
    }
    else
    {
        echo 'Zkontrolujte query';
    }
}

else
{
    header("location:view.php");
}
?>