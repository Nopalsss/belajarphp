<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        h2 { color: #333; text-align: center; }
        .add-button-container { text-align: center; margin-bottom: 20px; }
        .add-button { padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; font-weight: bold; border-radius: 4px; }
        .add-button:hover { background-color: #45a049; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; font-size: 16px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 12px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #ddd; }
        .actions a { display: inline-block; margin: 0 5px; padding: 8px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; }
        .actions a:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<h2>Data Buku</h2>

<!-- Tombol Tambah Buku -->
<div class="add-button-container">
    <a href="add.php" class="add-button">Tambah Buku</a>
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

$sql = "SELECT `id`, `Judul_Buku`, `Penulis`, `Tahun_Terbit`, `Genre` FROM buku";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Genre</th>
                <th>Aksi</th>
            </tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['Judul_Buku'] . '</td>';
        echo '<td>' . $row['Penulis'] . '</td>';
        echo '<td>' . $row['Tahun_Terbit'] . '</td>';
        echo '<td>' . $row['Genre'] . '</td>';
        echo '<td class="actions">
                <a href="edit.php?id=' . $row['id'] . '">Edit</a> 
                <a href="delete.php?id=' . $row['id'] . '" onclick="return confirm(\'Yakin ingin menghapus?\')">Delete</a>
              </td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "<p>Belum ada data buku.</p>";
}

$conn->close();
?>

</body>
</html>
