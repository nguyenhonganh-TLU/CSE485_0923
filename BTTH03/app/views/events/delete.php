<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlybaihat";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến CSDL thất bại: " . $conn->connect_error);
}


function delete($conn, $id) {
    $sql = "DELETE FROM baihat WHERE id = $id";
    return $conn->query($sql);
}


if (isset($_POST['delete_song'])) {
    $songIdToDelete = $_POST['song_id_to_delete'];
    if (delete($conn, $songIdToDelete)) {
        echo "Bài hát đã được xóa thành công.";
    } else {
        echo "Xóa bài hát thất bại.";
    }
}
?>

<!-- Form để xóa bài hát -->
<!-- <form method="post" action="">
    <label for="song_id_to_delete">ID bài hát cần xóa:</label>
    <input type="text" name="song_id_to_delete" id="song_id_to_delete">
    <input type="submit" name="delete_song" value="Xóa bài hát">
</form> -->
