<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 27/01/17
 * Time: 7:15 PM
 */
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'midp';
$dbconfig = mysqli_connect($host,$username,$password,$database) or die("Database Error");
?>