<?php

	class Conection{
		function Conect(){
			$conn = new mysqli("localhost", "root", "" ,"proyecto");
			if ($conn->connect_error) {
		    	die("Connection failed: " . $conn->connect_error);
			}
			return $conn;
		}
	}
		
?>