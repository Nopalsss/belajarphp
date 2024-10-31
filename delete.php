<!DOCTYPE html>
<html>
<head>
    <title>Hapus Data Buku</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        .message { text-align: center; margin-top: 50px; font-size: 18px; }
        .back-button { display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; text-align: center; }
        .back-button:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<div class="message">

<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test_crud';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM buku WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Data berhasil dihapus!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<a href="index.php" class="back-button">Back to Home</a>

</div>

</body>
</html>
