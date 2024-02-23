<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "vvc";

$conn = mysqli_connect($server_name, $username, $password, $db_name);

if(!$conn){
    echo "Neuspesna konekcija na bazu" . mysqli_connect_error();
    exit();
}