
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <br>
<div class="row">
    <div class="col" ></div>
    <div class="col" >
  <div class="card">
  <div class="card-header bg-primary"><h4>INPUT GAMBAR</h4></div>
  <div class="card-body">
    <form action="proses.galeri.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <div>
    <label for="email">PILIH GAMBAR</label>
    </div>
    
    <input type="file" name="fotogbr[]" multiple>
  </div>
  <button type="submit" class="btn btn-primary">UPLOAD</button>
  
</form >
</div>
  <div class="card-footer bg-primary">Footer</div>
  </div>
    </div>
  <div class="col" ></div>
</div>


<?php
// Sertakan file koneksi
include 'koneksi.php';

// Pastikan tombol submit ditekan
if(isset($_POST['submit'])) {
    // Ambil data dari form
    $galery_id = $_POST['galery_id'];
    $judul = $_POST['title'];

    // Proses unggah gambar
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    // Tentukan folder penyimpanan
    $upload_dir = "uploads/";

    // Pindahkan file yang diunggah ke folder tujuan
    move_uploaded_file($file_tmp, $upload_dir.$file);

    // Simpan data ke database
    $query = "INSERT INTO foto (galery_id, file, judul) VALUES ('$galery_id', '$file', '$judul')";
    if(mysqli_query($conn, $query)) {
        echo "Foto berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
    header("location: foto.php");
}
?>
</body>
</html>