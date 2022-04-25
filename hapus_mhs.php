<?php
$nim = $_GET['nim'];


include("koneksi.php");
$sql = "DELETE FROM mahasiswa WHERE `nim` = '$nim';";
$query = mysqli_query($conn, $sql);


if ($query) {
?>
    <script>
        window.open("index.php", "_self");
        alert("Mahasiswa Dengan NIM <?php echo $nim  ?> Berhasil dihapus");
    </script>
<?php
}
?>