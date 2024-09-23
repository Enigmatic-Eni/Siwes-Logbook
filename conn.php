<?php
const DB_SERVER = "localhost";
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'elogbook';
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

