<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_curd']))
{
    $curd_id = mysqli_real_escape_string($con, $_POST['delete_curd']);

    $query = "DELETE FROM curd WHERE id='$curd_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "curd Deleted Successfully";
        header("Location: curd.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "curd Not Deleted";
        header("Location: curd.php");
        exit(0);
    }
}

if(isset($_POST['update_curd']))
{
    $curd_id = mysqli_real_escape_string($con, $_POST['curd_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "UPDATE curd SET name='$name', age='$age',email='$email', phone='$phone', address='$address' WHERE id='$curd_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "curd Updated Successfully";
        header("Location: curd.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "curd Not Updated";
        header("Location: curd.php");
        exit(0);
    }

}


if(isset($_POST['save_curd']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "INSERT INTO curd (name,age,email,phone,address) VALUES ('$name','$age','$email','$phone','$address')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "curd Created Successfully";
        header("Location: curd-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "curd Not Created";
        header("Location: curd-create.php");
        exit(0);
    }
}

?>