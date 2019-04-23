<?php
$servername="localhost";
$username="root";
$password="";
$dbname="applicant";
$connDb=mysqli_connect($servername,$username,$password,$dbname);
if(!$connDb){
    die("Connection field".mysqli_connect_error());
}
?>