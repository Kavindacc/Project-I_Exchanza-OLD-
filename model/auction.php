<?php

require_once 'dbconnection.php';
class Auction
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Dbh::connect();
    }

    public function getOngoingAuctions()
    {
        $current_time = date("Y-m-d H:i:s");
        $sql = "SELECT * FROM products p JOIN auction a ON p.product_id = a.product_id WHERE a.start_time <= :current_time AND a.end_time >= :current_time";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['current_time' => $current_time]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUpcomingAuctions()
    {
        $current_time = gmdate("Y-m-d\TH:i:s\Z");
        $sql = "SELECT * FROM products p JOIN auction a ON p.product_id = a.product_id WHERE a.start_time > :current_time";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['current_time' => $current_time]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFinishedAuctions()
    {
        $current_time = date("Y-m-d H:i:s");
        $sql = "SELECT * FROM products p JOIN auction a ON p.product_id = a.product_id WHERE a.end_time < :current_time";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['current_time' => $current_time]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
