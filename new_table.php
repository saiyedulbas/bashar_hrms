<?php

$link = mysqli_connect("localhost", "admin_hrms1", "hrms2020", "admin_hrms1");
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$sql = 'UPDATE xin_employees 
SET password = "$2y$12$HPBVzi7tQnXV1OLSzq0p8.zrVjUcG05P9hIkwc28WicMpcaHx5JP2"
WHERE username = "admin"';
if(mysqli_query($link, $sql)){
    echo "Query Done Successfully";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

mysqli_close($link);
?>