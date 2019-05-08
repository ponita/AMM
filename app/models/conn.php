<?php

$conn = odbc_connect("Access", "","");
 if($conn){
	 echo 'Connected';
 }else{
	 
	 echo 'Failed';
 }