<?php
require 'koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];
$fotolama = $_POST['fotolama'];

if ($_FILES['foto']['error'] === 4) {
    $foto = $fotolama;
} else {
    $namafile = $_FILES['foto']['name'];
    $tmpname = $_FILES['foto']['tmp_name'];

    $ekstensifoto = explode('.', $namafile);
    $ekstensifoto = strtolower(end($ekstensifoto));
    $ekstensiValid = ['jpg', 'png', 'jpeg'];

    if (!in_array($ekstensifoto, $ekstensiValid)) {
        echo "
    <script>
        alert('File yang anda upload bukan file gambar');
        document.location.href='tambahmahasiswa.php';
    </script>
    ";
    }

    $ukuranFile = $_FILES['foto']['size'];
    if ($ukuranFile > 1500000) {
        echo "
    <script>
        alert('File maksimal 1,5 MB');
        document.location.href='tambahmahasiswa.php';
    </script>
    ";
    }

    $namaFileBaru = $nim;
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensifoto;
    $foto = $namaFileBaru;

    move_uploaded_file($tmpname, 'images/' . $namaFileBaru);
}

//echo 'nama prodinya adalah: ' . $prodi ;
$query = "UPDATE mahasiswa SET nama = '$nama' , no_hp = '$nohp', alamat = '$alamat' , id_prodi='$prodi', foto='$foto' WHERE nim='$nim'";

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href='mahasiswa.php';
            </script>
    ";
} else {
    echo "
        <script>
        alert ('Data gagal diubah');
        document.location.href='mahasiswa.php';
        </script>
    ";
    echo mysqli_error($conn);
};
