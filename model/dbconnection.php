<?php


class Dbh
{

    private static $servername;
    private static $username;
    private static $password;
    private static $dbname;

    public static function connect()
    {
        self::$servername = "localhost";
        self::$username = "root"; //username add karanna
        self::$password = ""; //password add karanna
        self::$dbname = "exchanzedb";

        try {
            $dsn = "mysql:host=" . self::$servername . ";dbname=" . self::$dbname;
            $pdo = new PDO($dsn, self::$username, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //pdo class eke static attributes
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
