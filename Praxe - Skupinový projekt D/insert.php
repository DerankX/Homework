<?php

require_once("connection.php");

if(isset($_POST['submit']))
{
    if(empty($_POST['name']) || empty($_POST['gps']))
    {
        echo 'Doplňte prázdná pole';
    }
    else
    {
        $userloc = $_POST['name'];
        $usergps = $_POST['gps'];

        $query = " insert into place (name, gps) values('$userloc', '$usergps')";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:index.php");
        }
        else
        {
            echo 'Zkontrolujte query';
        }
    }
}
else
{
    header("location:index.php");
}
?>