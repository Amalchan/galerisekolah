<!-- Admin Modal -->
<div class="modal fade" id="maModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Admin</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST">
                    <label>Username</label><br>
                    <input type="text" class="form-control bg-light border-1 small"placeholder="Masukan data" name="username" required><br>
                    <label>Password</label><br>
                    <input type="password" class="form-control bg-light border-1 small"placeholder="Masukan data" name="password" required><br>
                    <label>Confirm Password</label><br>
                    <input type="password" class="form-control bg-light border-1 small"placeholder="Masukan data" name="cpassword" required><br>
                    <button name="submit" class="btn btn-primary btn-md mb-3 mt-3">Register</button>
                </form>
                </div>
            </div>
        </div>
    </div>

<!-- Edit Post Modal #gadipake -->

<div class="modal fade" id="poModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Edit Post</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST">
                <h5 class="m-2 font-weight-bold text-primary">Judul</h5>
                    <input type="text" class="form-control bg-light border-1 small"placeholder="Masukan data" name="judul" required>

                    <label class="m-2 font-weight-bold text-primary">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori" required>
                            <option value="">Pilih Kategori</option>
                                <?php 
                                include 'koneksi.php';
                                $sql = mysqli_query($conn, "SELECT * FROM kategori") or die (mysqli_error($conn));
                                 while ($data = mysqli_fetch_array($sql)) {
                                        echo '<option value="'.$data['judul'].'">'.$data['judul'].'</option>';
                                } 
                                ?>
                        </select><br>

                        <label class="m-2 font-weight-bold text-primary" name = "isi">Isi</label>
                            <textarea name="isi" class="form-control" required></textarea><br>

                        <label class="m-2 font-weight-bold text-primary">Petugas</label>
                            <select class="form-control" name="petugas" id="petugas">
                                <option value="">Pilih petugas</option>
                                <?php 
                                include 'koneksi.php';
                                $sql = mysqli_query($conn, "SELECT * FROM petugas") or die (mysqli_error($conn));
                                while ($data = mysqli_fetch_array($sql)) {
                                    echo '<option value="'.$data['id'].'">'.$data['username'].'</option>';
                                } 
                                ?>
                            </select> <br>
                        
                        <label class="m-2 font-weight-bold text-primary" for="status">status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">Pilih status</option>
                                    <option value="publish">Publish</option>
                                    <option value="draft">draft</option>
                                </select> <br>
                        <button name="submit" id="submit" class="btn btn-primary btn-md mb-3 mt-3">Tambah data</button>
                            <a href="post.php" class="btn btn-secondary">
                                <span class="text">Kembali</span></a>
                </form>
                </div>
            </div>
        </div>
    </div>
<!-- Edit Post Modal #gadipake -->