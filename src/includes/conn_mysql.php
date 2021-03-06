<?php

/*
    docker inspect -f '{{.Name}} - {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $(docker ps -aq)
    Skapa databaskoppling
*/
function dbConnect(){
    $connection = mysqli_connect("172.18.0.2", "root", "example", "bookstoreDB") or die("Could not connect to database");
    mysqli_select_db($connection, "bookstoreDB") or die("Could not select database");
    return $connection;
}

/*
    Stänger databaskopplingen
*/
function dbDisconnect($connection){
    mysqli_close($connection);
}