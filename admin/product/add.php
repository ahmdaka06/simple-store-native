<?php
require '../../connect.php';

// check if has session admin
if (!isset($_SESSION['admin'])) {
    redirect('admin/login.php');
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $permission_ext	= array('png','jpg'); // eksitensi yg di perbolehkan
    $gambar = $_FILES['img']['name'];
    $explode_img = explode('.', $img);
    $ext = strtolower(end($explode_img)); // get eksitensi
    $file_tmp = $_FILES['img']['tmp_name'];

    // query check admin
    $check = $database->query("SELECT * FROM users WHERE `username` = '$username' LIMIT 1");

    if ($check->num_rows > 0) { // check if users exists
        $user = $check->fetch_assoc(); // fetch data user

        // check if user password not valid using bcrypt 
        if (password_verify($password, $user['password']) == false) {
            alert('Data admin tidak sesuai');
        } else {
            $_SESSION['admin'] = true;
            $_SESSION['user'] = $user;
            redirect('admin/dashboard.php');
            alert('Login berhasil!.');
            
        }
    } else {
        // set alert if user not exists
        alert('Data admin tidak tersedia');
    }
}
include '../../layouts/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-12 my-2">
        <a href="<?= $base_url . 'admin/product/list.php' ?>" class="btn btn-warning btn-md">Kembali</a>
    </div>
    <div class="col-md-8 mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"> Tambah Produk</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="form-group col-md-12 my-1">
                            <label for="">Nama Produk</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group col-md-12 my-1">
                            <label for="">Harga Produk</label>
                            <input type="number" class="form-control" name="price" id="price" required>
                        </div>
                        <div class="form-group col-md-12 my-1">
                            <label for="">Gambar Produk</label>
                            <input type="file" class="form-control" name="img" id="img" required>
                        </div>
                        <div class="form-group col-md-12 my-1">
                            <button type="submit" class="btn btn-success" name="submit">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
include '../../layouts/footer.php';
?>