<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Buku</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        h2 { color: #333; text-align: center; }
        form { width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        label { font-weight: bold; display: block; margin-bottom: 5px; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; }
        input[type="submit"], .back-button { display: inline-block; padding: 10px 20px; font-weight: bold; color: white; border: none; border-radius: 4px; cursor: pointer; text-align: center; }
        input[type="submit"] { background-color: #4CAF50; }
        input[type="submit"]:hover { background-color: #45a049; }
        .back-button { background-color: #007bff; text-decoration: none; }
        .back-button:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<h2>Tambah Data Buku</h2>

<form method="post" action="">
    <label for="judul_buku">Judul Buku:</label>
    <input type="text" id="judul_buku" name="judul_buku" required>

    <label for="penulis">Penulis:</label>
    <input type="text" id="penulis" name="penulis" required>

    <label for="tahun_terbit">Tahun Terbit:</label>
    <input type="number" id="tahun_terbit" name="tahun_terbit" required>

    <label for="genre">Genre:</label>
    <input type="text" id="genre" name="genre" required>

    <input type="submit" name="submit" value="Tambah Buku">
</form>

<!-- Tombol Back -->
<div style="text-align: center; margin-top: 20px;">
    <a href="index.php" class="back-button">Back</a>
</div>

<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test_crud';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mendapatkan ID terakhir dan menambahkannya dengan 1
$sql = "SELECT MAX(id) AS max_id FROM buku";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$new_id = $row['max_id'] + 1;

// Proses penyimpanan data ketika form disubmit
if (isset($_POST['submit'])) {
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];

    $sql = "INSERT INTO buku (id, Judul_Buku, Penulis, Tahun_Terbit, Genre) VALUES ('$new_id', '$judul_buku', '$penulis', $tahun_terbit, '$genre')";
    if ($conn->query($sql) === TRUE) {
        echo "<p style='text-align: center; color: green;'>Data berhasil ditambahkan!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

</body>
</html>
