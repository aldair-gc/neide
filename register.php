<?php
$DB_HOST = "localhost";
$DB_USER = "u186683530_neideuser";
$DB_PASS = "G&vo~k7a";
$DB_NAME = "u186683530_neidebd";

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// make the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// check if the fields exist
if (!isset($_POST['name'], $_POST['password'], $_POST['email'])) {
    exit('Data missing.');
}

// check if the fields are not empty
if (empty($_POST['name']) || empty($_POST['password']) || empty($_POST['email'])) {
    exit('All fields must be fulfilled.');
}

// validate email
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Invalid email!');
}

// character length check
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    exit('Password must be between 5 and 20 characters long!');
}

// check if the email is already on the database

// save data directly
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO accounts (name, password, email) VALUES ($_POST['name'], $password, $_POST['email'])";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>