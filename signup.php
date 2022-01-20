<?php

include("db.php");
include("hash.php");

$user = $_POST["user"];
$password = $_POST["pass"];
$password = hashPass($password);
$users = [];

$result = mysqli_query($conn, "SELECT * FROM users");


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        array_push($users, $row["user"]);
    }
}

for ($i = 0; $i < count($users); $i++) {

    if ($users[$i] == $user) {
        echo "Username already in use";
        die;
    }
}

$sql = "INSERT INTO users " . "(user, password) " . "VALUES('$user','$password')";
if (mysqli_query($conn, $sql)) {
    echo "Sign up succesfull";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
