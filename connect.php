<?php
$host = 'localhost';
$databasename = 'footkit';
$username = 'root';
$password = '';

$conn = new mysqli($host,$username,$password,$databasename);

if($conn) {
 } else {
     mysqli_error($conn);
 }