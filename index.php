<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


    <title>Data Mahasiswa</title>
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Data Mahasiswa</span>
                <a href="cetaklap.php"><button class="btn btn-warning me-2" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                        </svg> Cetak Laporan</button></a>
            </div>
        </nav>
        <!-- end navbar -->
        <br>
        <!-- card -->

        <div class="card">
            <div class="card-body" style="background-color:#0001">

                <!-- button -->
                <div class="d-grid gap-2 d-md-flex mb-3 justify-content-md-str">
                    <a href="tambahmhs.php"><button class="btn btn-outline-primary me-md-2" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg> Tambah Mahasiswa</button></a>
                </div>
                <!-- end button -->

                <!-- table -->

                <table class="table table-striped">

                    <tr>
                        <td>No</td>
                        <td>NIM</td>
                        <td>NAMA</td>
                        <td>JENIS KELAMIN</td>
                        <td>JURUSAN</td>
                        <td>ALAMAT</td>
                        <td>ACTION</td>
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
                            <td><a href="edit_mhs.php?nim=<?php echo $data['nim']; ?>"><button class="btn btn-warning">Edit</button></a> <a href="hapus_mhs.php?nim=<?php echo $data['nim']; ?>" onclick="confirm('Apakah Ingin Menghapus Mahasiswa Ini?');"><button class="btn btn-danger">Delete</button></a></td>
                        </tr>

                    <?php
                        $no++;
                    };
                    ?>
                </table>
                <!-- end table -->
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>