<?php
$servername = "localhost";
$username ="root";
$password="";
$dbname="guvii";
$connect=mysqli_connect($servername,$username,$password,$dbname);
if(mysqli_connect_errno())
{
    echo "falied to connect";
}
