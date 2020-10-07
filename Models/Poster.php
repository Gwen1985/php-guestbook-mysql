<?php

declare(strict_types=1);



class Poster
{

    public static function openConnection(): PDO
   {
        // Try to figure out what these should be for you
        $dbhost = "localhost"; // probably "localhost"
        $dbuser = "root"; // probably "becode"
        $dbpass = ""; // the password you chose
        $db = "guestbook"; // You probably have to use a database manager to create a new database for this exercise

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        // Try to understand what happens here
        $pdo = new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);

        // Why we do this here
        return $pdo;
    }

    public static function save(Guestbook $guestbookItem): void
    {
        try {
            $pdo = self::openConnection();
            $sql = "INSERT INTO msgpost (`FirstName`, `LastName`, `Title`, `Message`, `Date`) VALUES ('" . $guestbookItem->getAuthorFn() . "', '" . $guestbookItem->getAuthorLn() . "', '" . $guestbookItem->getTitle() . "', '" . $guestbookItem->getContent() . "', '" . $guestbookItem->getPostdate() . "')";
            $handle = $pdo->prepare($sql);
            $handle->execute();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    public static function get()
    {
        $data = [];
        try {
            $pdo = self::openConnection();
            $sql = "SELECT * FROM msgpost";
            $handle = $pdo->prepare($sql);
            $handle->execute();
            $data = $handle->fetchAll();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        return $data;

    }


}

