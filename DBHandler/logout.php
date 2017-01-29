<?php
/**
 * Created by PhpStorm.
 * User: mdjul
 * Date: 29/01/2017
 * Time: 00:12
 */
session_start();
session_destroy();
session_regenerate_id(true);
header("location:../index.php");
?>