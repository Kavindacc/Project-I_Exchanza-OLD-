<?php
class Admin {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getTotalUsers() {
        $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM usern");
        return $stmt->fetch()['total'];
    }

    public function getTotalSales() {
        // Implement logic
        return 10; // Placeholder
    }

    public function getTotalFeedbacks() {
        $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM messages");
        return $stmt->fetch()['total'];
    }

    public function getTotalEarnings() {
        $stmt = $this->pdo->query("SELECT SUM(amount) as total FROM payments");
        return $stmt->fetch()['total'];
    }

    public function getCustomers() {
        $stmt = $this->pdo->query("SELECT * FROM users WHERE role = 'customer'");
        return $stmt->fetchAll();
    }

    public function getSellers() {
        $stmt = $this->pdo->query("SELECT sellers.id, usern.name AS username, usern.email, sellers.variant 
                                   FROM usern 
                                   JOIN sellers ON usern.userid = sellers.user_id");
        return $stmt->fetchAll();
    }
    

    public function getMessages() {
        $stmt = $this->pdo->query("SELECT messages.id, usern.name AS username, messages.message, messages.reply 
                                   FROM messages 
                                   JOIN usern ON messages.user_id = usern.userid");
        return $stmt->fetchAll();
    }
    

    public function replyMessage($message_id, $reply) {
        $stmt = $this->pdo->prepare("UPDATE messages SET reply = :reply WHERE id = :id");
        $stmt->execute(['reply' => $reply, 'id' => $message_id]);
    }

    public function getSettings() {
        $stmt = $this->pdo->query("SELECT * FROM settings WHERE id = 1");
        return $stmt->fetch();
    }

    public function updateSettings($contact_details, $social_media_links) {
        $stmt = $this->pdo->prepare("UPDATE settings SET contact_details = :contact_details, social_media_links = :social_media_links WHERE id = 1");
        $stmt->execute(['contact_details' => $contact_details, 'social_media_links' => $social_media_links]);
    }

    public function getPayments() {
        $stmt = $this->pdo->query("SELECT * FROM payments");
        return $stmt->fetchAll();
    }
}
?>
