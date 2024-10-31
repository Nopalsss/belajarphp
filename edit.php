<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Buku</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        h2 { color: #333; text-align: center; }
        form { width: 400px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        label { font-weight: bold; display: block; margin-bottom: 5px; }
        input[type="text"], input[type="number"], input[type="submit"] { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; }
        input[type="submit"] { background-color: #4CAF50; color: white; font-weight: bold; cursor: pointer; border: none; }
        input[type="submit"]:hover { background-color: #45a049; }
        .back-button { display: inline-block; margin-top: 15px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; text-align: center; }
        .back-button:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<h2>Edit Data Buku</h2>

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
    $sql = "SELECT * FROM buku WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        ?>

        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="judul_buku">Judul Buku:</label>
            <input type="text" id="judul_buku" name="judul_buku" value="<?php echo $row['Judul_Buku']; ?>" required>

            <label for="penulis">Penulis:</label>
            <input type="text" id="penulis" name="penulis" value="<?php echo $row['Penulis']; ?>" required>

            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="number" id="tahun_terbit" name="tahun_terbit" value="<?php echo $row['Tahun_Terbit']; ?>" required>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" value="<?php echo $row['Genre']; ?>" required>

            <input type="submit" name="update" value="Update Buku">
        </form>
        <a href="index.php" class="back-button">Back to Home</a>

        <?php
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];

    $sql = "UPDATE buku SET Judul_Buku='$judul_buku', Penulis='$penulis', Tahun_Terbit=$tahun_terbit, Genre='$genre' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Data berhasil diupdate!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

</body>
</html>
