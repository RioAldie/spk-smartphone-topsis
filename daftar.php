<?php 
 include('koneksi.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReqHP - Data Smartphone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-color: #242424;">
    <nav class="navbar navbar-expand-lg  navbar-dark bg-danger ">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">ReqHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./rekomendasi.php">Rekomendasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./daftar.php">Daftar HP</a>
            </li>
            
            </ul>
        </div>
        </div>
    </nav>
    <div class="w-100 d-flex justify-content-center align-items-center mt-5">
    <table class="w-75 table table-dark table-striped">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col">RAM</th>
            <th scope="col">Memori</th>
            <th scope="col">Prosesor</th>
            <th scope="col">Kamera</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = mysqli_query($selectdb, "SELECT * FROM data_hp"); 
                $no = 1;
              while( $data = mysqli_fetch_array($query)){
            ?>
            <tr>
            <th scope="row"><?php echo $no ?></th>
            <td><?php echo $data['nama_hp'] ?></td>
            <td><?php echo $data['harga_hp'] ?></td>
            <td><?php echo $data['ram_hp'] ?></td>
            <td><?php echo $data['memori_hp'] ?></td>
            <td><?php echo $data['processor_hp'] ?></td>
            <td><?php echo $data['kamera_hp'] ?></td>
            
            </tr>
            <?php
              };
              $no++;
            ?>
        </tbody>
    </table>
    </div>
    <div class="w-100 d-flex justify-content-center align-items-center bg-danger" style="height: 200px;">
    <p class="text-light">Copyrights All Reserved</p>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>