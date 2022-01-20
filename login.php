<?php

include("db.php");
include("hash.php");


$user = $_POST["user"];
$password = $_POST["pass"];
$info  = [];
$result = mysqli_query($conn, "SELECT * FROM users");


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $rowInfo = [$row["user"], $row["password"]];
            array_push($info, $rowInfo);
        }
    }

    for ($i = 0; $i < count($info); $i++) {
        if($info[$i][0] == $user && verify($password, $info[$i][1]) == true){
            header("Location: loginAccepted.html");
            die;
        }
    }
    
    header("Location: loginFail.html");