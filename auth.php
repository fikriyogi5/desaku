<?php
if (!isset($_SESSION['user_id'])) {
header('Location: search_homepage.php');
exit;
}