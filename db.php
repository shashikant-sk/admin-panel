<?php
$con= new mysqli('localhost','root','','shashikant');
if(!$con){
    die("error ".$con->error);
}