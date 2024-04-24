<?php
require 'koneksi.php';
include 'template/header.php';
include 'template/sidebar.php';

$query = "SELECT * FROM mahasiswa JOIN prodi ON mahasiswa.id_prodi = prodi.id_prodi";
$hasil = mysqli_query($conn, $query);

$data = [];
while ($baris = mysqli_fetch_assoc($hasil)) {
  $data[] = $baris;
}

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Mahasiswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Mahasiswa</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Mahasiswa</h3>

              <div class="card-tools">
              <a href="tambahmahasiswa.php" class="btn btn-primary">Tambah</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($data as $d) {
                  ?>
                    <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $d['nim'] ?></td>
                      <td><?php echo $d['nama'] ?></td>
                      <td><?php echo $d['nama_prodi'] ?></td>
                      <td><?php echo $d['no_hp'] ?></td>
                      <td><?php echo $d['alamat'] ?></td>
                      <td><img src="images/<?= $d['foto'] ?>" width="50px"></td>
                      <td><a href="editmahasiswa.php?nim=<?= $d['nim'] ?>" class="btn btn-warning">Edit</a>
                        <a href="hapusmahasiswa.php?nim=<?= $d['nim'] ?>" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include 'template/footer.php';
?>