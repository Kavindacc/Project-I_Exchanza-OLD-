<?php
class AdminLogin {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM admins WHERE username = :username AND password = :password");
        $stmt->execute(['username' => $username, 'password' => ($password)]);
        $admin = $stmt->fetch();

        if ($admin) {
            $_SESSION['admin_id'] = $admin['id'];
            return true;
        } else {
            return false;
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
    }
}
?>
