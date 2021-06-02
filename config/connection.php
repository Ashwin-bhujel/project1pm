<?php
 $connection = mysqli_connect('127.0.0.1', 'root', '', 'project1pm');

 if(!$connection){
     echo "database not connected";
die();
 }