<?php
include_once "../path.php";
//Example 1:
// include_once Path::match(this, $_SERVER['DOCUMENT_ROOT']."/EZ-Include-Path/to/connecting_class.php");

//Example 2:
include_once Path::match(this, connecting_class);

connecting_class::test();
?>
