<?php
	function connectDB() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbName = "foodie";

        //Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbName);

        if(!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }

        return $conn;
    }
?>