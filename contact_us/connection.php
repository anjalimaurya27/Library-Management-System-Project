<?php
$host="localhost";
$user="root";
$password="";
$database="library_db";

$conn= new mysqli($host,$user,$password,$database);

if(!$conn)
{
    echo "database not Connected";
}
else
{
    echo "database connected";
}
?>