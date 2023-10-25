<?php
require_once 'db.php';

class CRUD {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function create($name, $description) {
        $query = "INSERT INTO surat (name, description) VALUES (?, ?)";
        $stmt = $this->db->conn->prepare($query);
        return $stmt->execute([$name, $description]);
    }

    public function read() {
        $query = "SELECT * FROM surat";
        $stmt = $this->db->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $description) {
        $query = "UPDATE surat SET name = ?, description = ? WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        return $stmt->execute([$name, $description, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM surat WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
