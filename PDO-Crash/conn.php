<?php

    // host, dbname, user, password

    try {
        $host = "localhost";
        $dbname = "test_oop";
        $user = "root";
        $password = "johnson10";

        $conn = new PDO ("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOExcaption $e) {
        echo $e->getMessage();
        die("db Error");
    }

    $row = $conn->query("SELECT title FROM posts");

    while ($row = $rows->fetch()) {
        echo $row['title'] . "<br />";
    }