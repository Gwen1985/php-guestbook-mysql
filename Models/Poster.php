<?php

declare(strict_types=1);

//const FILE_FOLDER = 'Data';
//const FILE_NAME = 'guestbook_data.txt';
//const FILE_PATH = DIRECTORY_SEPARATOR . FILE_FOLDER . DIRECTORY_SEPARATOR . FILE_NAME;

class Poster
{

    public static function openConnection(): PDO
    {

        $db = parse_url(getenv("postgres://gomnbrvrtamqrr:b7a1df0c0b54e715d6d189bd629e1ba6684bec4f8d113aadf65e356919473cf2@ec2-54-155-22-153.eu-west-1.compute.amazonaws.com:5432/ddv0oj5rvfqlg1
"));

        $pdo = new PDO("pgsql:" . sprintf(
                "host=%s;port=%s;user=%s;password=%s;dbname=%s",
                $db["ec2-54-155-22-153.eu-west-1.compute.amazonaws.com"],
                $db["5432"],
                $db["gomnbrvrtamqrr"],
                $db["b7a1df0c0b54e715d6d189bd629e1ba6684bec4f8d113aadf65e356919473cf2"],
                ltrim($db["path"], "/")
            ));

        return $pdo;

//        // Try to figure out what these should be for you
//        $dbhost = "localhost"; // probably "localhost"
//        $dbuser = "root"; // probably "becode"
//        $dbpass = ""; // the password you chose
//        $db = "guestbook"; // You probably have to use a database manager to create a new database for this exercise
//
//        $driverOptions = [
//            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
//            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//        ];
//
//        // Try to understand what happens here
//        $pdo = new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);
//
//        // Why we do this here
//        return $pdo;
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
//            $file = getcwd() . FILE_PATH;
//            $data = explode("\n", file_get_contents($file));
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

