<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReqHP - Rekomendasi</title>
    <link rel="stylesheet" href="./css/rekomendasi.css">
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
           <div class="container">
              <p class="title">Pilih Kriteria Smartphone Impianmu</p>
                <form class = "col s12" method="POST" action="hasil.php">
                    <div class="section-card">
                      <div class="item">
                        <h5>Harga : </h5>
                        <select required name="harga">
                            <option value = "" disabled selected style="color: #eceff1;"><i>Kriteria Harga</i></option>
                            <option value = "5">< Rp. 1.000.000</option>
                            <option value = "4">1.000.000 - 3.000.000</option>
                            <option value = "3">3.000.000 - 4.000.000</option>
                            <option value = "2">4.000.000 - 5.000.000</option>
                            <option value = "1">> 5.000.000</option>
                        </select>
                      </div>  
                      <div class="item">
                        <h5>RAM :</h5>
                        <select required name="ram">
                            <option value = "" disabled selected>Kriteria RAM</option> 
                            <option value = "1">0 - 1 Gb</option>
                            <option value = "2">2 Gb</option>
                            <option value = "3">3 Gb</option>
                            <option value = "4">4 Gb</option>
                            <option value = "5">> 5 Gb</option>
                        </select>
                      </div>
                      <div class="item">
                        <h5>Memori :</h5>
                        <select required name="memori">
                              <option value = "" disabled selected>Kriteria Penyimpanan</option>
                              <option value = "1">0 - 4 Gb</option>
                              <option value = "2">8 Gb</option>
                              <option value = "3">16 Gb</option>
                              <option value = "4">32 Gb</option>
                              <option value = "5">> 32 Gb</option>
                        </select>
                      </div> 
                      <div class="item">
                        <h5>Processor :</h5>
                        <select required name="processor">
                              <option value = "" disabled selected>Kriteria Processor</option>
                              <option value = "1">Dualcore</option>
                              <option value = "3">Quadcore</option>
                              <option value = "5">Octacore</option>
                        </select>
                      </div> 
                      <div class="item">
                        <h5>Kamera :</h5>
                        <select required name="kamera">
                              <option value = "" disabled selected>Kriteria Kamera</option>
                              <option value = "1">0 - 8 Mp</option>
                              <option value = "3">8 - 13 Mp</option>
                              <option value = "5">>13 Mp</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-lg btn-danger" style="margin-bottom:-46px;">Generate</button> 
                    </div>
                </form>
           </div>
           <div class="w-100 d-flex justify-content-center align-items-center bg-danger" style="height: 200px;">
              <p class="text-light">Copyrights All Reserved</p>
            </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>