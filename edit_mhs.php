<?php
$nim = $_GET['nim'];

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <title>Edit Mahasiwa!</title>
</head>

<body>
    <!-- card -->
    <div class="card mx-auto mt-5" style="width: 40rem; box-shadow: 15px 15px 30px -10px grey;">
        <div class="card-body">
            <h3>Form Edit Mahasiswa</h3>
            <hr>
            <!-- form -->
            <?php
            include("koneksi.php");
            $sql = "SELECT * FROM mahasiswa WHERE nim = '$nim';";
            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($query)
            ?>
            <form class="form-horizontal" method="POST">
                <div class="row mb-3">
                    <label for="npm" class="col-sm-2 col-form-label">NIM :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nim" placeholder="NIM" name="nim" value="<?php echo $data['nim'] ?> " readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="<?php echo $data['nama'] ?>">
                    </div>
                </div>
                <?php
                if ($data['jenis_kelamin'] == "p") {
                ?>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin : </legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="gridRadios1" value="l">
                                <label class="form-check-label" for="gridRadios1">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="gridRadios2" value="p" checked>
                                <label class="form-check-label" for="gridRadios2">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </fieldset>
                <?php

                } else {
                ?>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin : </legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="gridRadios1" value="l" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="gridRadios2" value="p">
                                <label class="form-check-label" for="gridRadios2">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </fieldset>
                <?php
                }
                ?>

                <div class="row mb-3">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan :</label>
                    <div class="col-sm-10">
                        <?php
                        if ($data["jurusan"] == "ti") {
                        ?>
                            <select class="form-select" id="jurusan" name="jurusan">
                                <option value="ti" selected>Teknik Informatika</option>
                                <option value="si">Sistem Informasi</option>
                                <option value="mi">Manajemen Informatika</option>
                                <option value="tk">Teknik Komputer</option>
                                <option value="ka">Komputerisasi Akutansi</option>
                            </select>
                        <?php } elseif ($data["jurusan"] == "si") {  ?>
                            <select class="form-select" id="jurusan" name="jurusan">
                                <option value="ti">Teknik Informatika</option>
                                <option value="si" selected>Sistem Informasi</option>
                                <option value="mi">Manajemen Informatika</option>
                                <option value="tk">Teknik Komputer</option>
                                <option value="ka">Komputerisasi Akutansi</option>
                            </select>
                        <?php } elseif ($data["jurusan"] == "mi") {  ?>
                            <select class="form-select" id="jurusan" name="jurusan">
                                <option value="ti">Teknik Informatika</option>
                                <option value="si">Sistem Informasi</option>
                                <option value="mi" selected>Manajemen Informatika</option>
                                <option value="tk">Teknik Komputer</option>
                                <option value="ka">Komputerisasi Akutansi</option>
                            </select>
                        <?php } elseif ($data["jurusan"] == "tk") {  ?>
                            <select class="form-select" id="jurusan" name="jurusan">
                                <option value="ti">Teknik Informatika</option>
                                <option value="si">Sistem Informasi</option>
                                <option value="mi">Manajemen Informatika</option>
                                <option value="tk" selected>Teknik Komputer</option>
                                <option value="ka">Komputerisasi Akutansi</option>
                            </select>
                        <?php } elseif ($data["jurusan"] == "ka") {  ?>
                            <select class="form-select" id="jurusan" name="jurusan">
                                <option value="ti">Teknik Informatika</option>
                                <option value="si">Sistem Informasi</option>
                                <option value="mi">Manajemen Informatika</option>
                                <option value="tk">Teknik Komputer</option>
                                <option value="ka" selected>Komputerisasi Akutansi</option>
                            </select>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="<?php echo $data['alamat'] ?>">
                    </div>
                </div>
                <input class="btn btn-primary" type="submit" name="simpan" value="Update"></input>
                <div class="row mb-3">
                    <a href="index.php" class="mt-2">Kembali</a>
                </div>
            </form>
            <!-- end form -->
        </div>
    </div>
    <!-- and card -->

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
<?php
if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    include("koneksi.php");
    $sql = "UPDATE mahasiswa SET `nama`='$nama',`jenis_kelamin`='$jk',`jurusan`='$jurusan',`alamat`='$alamat' WHERE `nim` = '$nim'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
?>
        <script>
            window.open("index.php", "_self");
            alert("Mahasiswa Berhasil di Update");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Mahasiswa Gagagl di Update");
        </script>
<?php
    }
}
?>