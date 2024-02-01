<?php
//      server        username          password              database
$db = @mysqli_connect(
    getenv("MYSQL_HOST"),
    getenv("MYSQL_USER"),
    getenv("MYSQL_PASSWORD"),
    getenv("MYSQL_DATABASE"))
or die('unable to connect to the database.');
