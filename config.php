<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "lms-db";


// Create connection
$conn = new mysqli($servername,$username,$password,$database);