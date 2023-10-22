<?php
// include ('../error_handling.php');
// include "../functions.php";

// Membuat objek database
$dbConfig = array(
    'host' => DB_HOST,
    'username' => DB_USER,
    'password' => DB_PASS,
    'database' => DB_NAME
);

class SearchEngine
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $db;

    public function __construct()
    {
        $this->host = DB_HOST;      // Replace with your database configuration
        $this->username = DB_USER;  // Replace with your database configuration
        $this->password = DB_PASS;  // Replace with your database configuration
        $this->database = DB_NAME;  // Replace with your database configuration

        try {
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function searchNama($query) {
        $query = '%' . $query . '%';
        $sql = "SELECT * FROM warga WHERE nama LIKE ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$query]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchNik($query) {
        $query = '%' . $query . '%';
        $sql = "SELECT * FROM warga WHERE nik LIKE ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$query]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchEmail($query) {
        $query = '%' . $query . '%';
        $sql = "SELECT * FROM warga WHERE email LIKE ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$query]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function close() {
        $this->db = null;
    }
}


?>
<!-- 
<form action="" method="post">
    <input type="text" name="search">
    <input type="submit" name="submit" value="Cari">
</form>

<?php
if (isset($_POST['submit'])) {
    $searchQuery = $_POST['search'];
    $searchEngine = new SearchEngine();
    $namaResults = $searchEngine->searchNama($searchQuery);
    $nikResults = $searchEngine->searchNik($searchQuery);
    $emailResults = $searchEngine->searchEmail($searchQuery);
}
if (isset($namaResults)) {
    // Display search results for Nama
    echo "Nama Results:<br>";
    foreach ($namaResults as $result) {
        echo "Nama: " . $result['nama'] . "<br>";
    }

    // Display search results for NIK
    echo "<br>NIK Results:<br>";
    foreach ($nikResults as $result) {
        echo "NIK: " . $result['nik'] . "<br>";
    }

    // Display search results for NIK
    echo "<br>Email Results:<br>";
    foreach ($emailResults as $result) {
        echo "Email: " . $result['email'] . "<br>";
    }


    // Close the database connection
    $searchEngine->close();
}
?>
 -->