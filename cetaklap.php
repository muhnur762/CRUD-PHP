<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");
?>
<table border="1">
    <tr>
        <td colspan="6" align="center" style="height: 50px;">LAPORAN DATA MAHASISWA</td>
    </tr>
    <tr>
        <td>No</td>
        <td>NIM</td>
        <td>NAMA</td>
        <td>JENIS KELAMIN</td>
        <td>JURUSAN</td>
        <td>ALAMAT</td>
    </tr>
    <?php
    $no = 1;
    include("koneksi.php");
    $sql = "SELECT * FROM mahasiswa;";
    $query = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($query)) {
    ?>
        <tr>
            <td><?php echo $no  ?></td>
            <td><?php echo $data['nim']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php if ($data['jenis_kelamin'] == "l") {
                    echo "Laki-Laki";
                } elseif ($data['jenis_kelamin'] == "p") {
                    echo "Perempuan";
                }
                ?></td>
            <td><?php
                if ($data['jurusan'] == "ti") {
                    echo "Teknik Informatika";
                } elseif ($data['jurusan'] == "si") {
                    echo "Sistem Informasi";
                } elseif ($data['jurusan'] == "mi") {
                    echo "Manajemen Informatika";
                } elseif ($data['jurusan'] == "ka") {
                    echo "Komputerisasi Akuntansi";
                } elseif ($data['jurusan'] == "tk") {
                    echo "Teknik Komputer";
                }
                ?></td>
            <td><?php echo $data['alamat']; ?></td>

        </tr>
    <?php
        $no++;
    }
    ?>
</table>