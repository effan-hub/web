<?php 
require 'koneksi.php';

$nim = $_GET['nim'];
$query = "DELETE FROM mahasiswa WHERE nim='$nim'";

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
            <script>
                alert('Data berhasil dihapus');
                document.location.href='mahasiswa.php';
            </script>
    ";
}else {
    echo "
        <script>
        alert ('Data gagal dihapus');
        </script>
    ";
    echo mysqli_error($conn);
    };


?>