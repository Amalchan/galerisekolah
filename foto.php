<?php 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Post</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/j.png">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
    <?php
    include 'sidebar.php'
    ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include 'navbar.php'
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 font-weight-bold mb-0 text-gray-800">foto</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <a href="add_foto.php" class="btn btn-primary mb-3">+ foto</a>
                            
                            <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>galeri</th>
                                    <th>file</th>
                                    <th>judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                                
                                <?php 
                            include 'koneksi.php';
                            $no = 1;
                            $data = mysqli_query($conn, "SELECT foto.*, galeri.judul AS nama_galeri, petugas.username AS nama_petugas FROM posts JOIN kategori ON posts.foto_id = foto.id JOIN petugas ON posts.petugas_id = petugas.id");
                                        while($d = mysqli_fetch_array($data)){
                                
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['judul']; ?></td>
                                    <td><?php echo $d['nama_kategori'] ?></td>
                                    <td><?php echo $d['nama_petugas']; ?></td>
                                    <td>
                                    <?php
                                    $status = $d['status'];
                                    if ($status == 'publish') {
                                    echo '<span class="p-2 badge bg-success text-light" >Publish</span>';
                                    } elseif ($status == 'draft') {
                                    echo '<span class="p-2 badge bg-primary text-light">Draft</span>';
                                    }
                                    ?>
                                    </td>

                                    <td class="d-flex">
                                    <a href="hapus_foto.php?id=<?php echo $d['id']; ?>" class="btn btn-danger btn-md mr-3" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><H8>Hapus</H8></a>

                                    <a href="edit_foto.php?id=<?php echo $d['id']; ?>" class="btn btn-warning btn-md mr-3"><H8>Edit</H8></a>
                                    
                                </a>
                            <!-- Modal detail post-->
                                    <div class="modal fade" id="modalView<?php echo $d['id'];?>" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div>
                                                <?php
include 'koneksi.php';
session_start()
?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kategori</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/j.png">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
    <?php
    include 'sidebar.php'
    ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include 'navbar.php'
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 font-weight-bold mb-0 text-gray-800">Kategori</h1>
                    </div>
                    
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                
                              
                                <!-- Card Body -->
                                
                                <div class="card-body">
                                    <a href="add_kategori.php" class="btn btn-primary btn-md mb-3">+ Kategori</a> 
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <?php
                                        $q = $conn->query("SELECT * FROM kategori");
                                        $no = 1;
                                        while ($d = $q->fetch_assoc()) :
                                        ?>
                                        
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['judul']?></td>
                                            <td>
                                            
                                            <a href="hapus_kat.php?id=<?php echo $d['id']; ?>"class="btn btn-danger btn-md mr-3" onclick="return confirm('Yakin untuk menghapus data ini?')">
                                                <H8>Hapus</H8>
                                                </a>

                                            <a href="edit_kat.php?id=<?php echo $d['id']; ?>"class="btn btn-warning btn-md mr-3">
                                                <H8>Edit</H8>
                                                </a>
                                            </td>
                                            <?php endwhile;?>
                                        </tr>
                                        
                                </tbody>
                            </table>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SYIFA RASYIDAH 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html> class="modal-header">
                                                <h5 class="modal-title" id="modalViewLabel"> <i data-feather="info"></i> Detail Post</h5>
                                            </div>
                                            <div class="modal-body">
                                            <table class="table text-sm">
                                                    <tr>
                                                        <td>Judul</td>
                                                        <td>:</td>
                                                        <td> <?php echo $d['judul']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal dibuat</td>
                                                        <td>:</td>
                                                        <td> <?php echo $d['created_at']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>dibuat oleh</td>
                                                        <td>:</td>
                                                        <td><?php echo $d['nama_petugas']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>:</td>
                                                        <td>
                                                        <?php
                                                        $status = $d['status'];
                                                        if ($status == 'publish') {
                                                        echo '<span>Publish</span>';
                                                        } elseif ($status == 'draft') {
                                                        echo '<span>Draft</span>';
                                                        }
                                                        ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kategori</td>
                                                        <td>:</td>
                                                        <td> <?php echo $d['nama_kategori'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Isi</td>
                                                        <td>:</td>
                                                        <td><?php echo $d['isi']; ?></td>
                                                    </tr>
                                            </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">Close</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    </td>
                               </tr>
                                <?php 
                            }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SYIFA RASYIDAH 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>