<?php

function hashPass($pass){

    return password_hash($pass, PASSWORD_DEFAULT);
}

function verify($pass, $hashedPass){

    $com = password_verify($pass , $hashedPass);

    if($com == 1){
        return true;
    }else{
        return false;
    }
}