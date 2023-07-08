<?php 
session_start();
include('koneksi.php');

//Bobot
$W1	= $_POST['harga'];
$W2	= $_POST['ram'];
$W3	= $_POST['memori'];
$W4	= $_POST['processor'];
$W5	= $_POST['kamera'];

//Pembagi Normalisasi
function pembagiNM($matrik){
	for($i=0;$i<5;$i++){
		$pangkatdua[$i] = 0;
		for($j=0;$j<sizeof($matrik);$j++){
			$pangkatdua[$i] = $pangkatdua[$i] + pow($matrik[$j][$i],2);}
		$pembagi[$i] = sqrt($pangkatdua[$i]);
	}
	return $pembagi;
}

//Normalisasi
function Transpose($squareArray) {

    if ($squareArray == null) { return null; }
    $rotatedArray = array();
    $r = 0;

    foreach($squareArray as $row) {
        $c = 0;
        if (is_array($row)) {
            foreach($row as $cell) { 
                $rotatedArray[$c][$r] = $cell;
                ++$c;
            }
        }
        else $rotatedArray[$c][$r] = $row;
        ++$r;
    }
    return $rotatedArray;
}

function JarakIplus($aplus,$bob){
	for ($i=0;$i<sizeof($bob);$i++) {
		$dplus[$i] = 0;
		for($j=0;$j<sizeof($aplus);$j++){
			$dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]),2);
		}
		$dplus[$i] = round(sqrt($dplus[$i]),4);
	}
	return $dplus;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReqHP - Result</title>
    <link rel="stylesheet" href="./css/hasil.css">
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

        
<!-- Matrik Smartphone -->
        <?php
            $query=mysqli_query($selectdb,"SELECT * FROM data_hp");
            $no=1;
            while ($data_hp=mysqli_fetch_array($query)) {
                $Matrik[$no-1]=array($data_hp['harga_angka'],$data_hp['ram_angka'],$data_hp['memori_angka'],$data_hp['processor_angka'],$data_hp['kamera_angka'] );
                $no++;
                }
        ?>
<!-- Matriks ternormalisasi, R: -->
        <?php
            $query=mysqli_query($selectdb,"SELECT * FROM data_hp");
            $no=1;
            $pembagiNM=pembagiNM($Matrik);
            while ($data_hp=mysqli_fetch_array($query)) {

                $MatrikNormalisasi[$no-1]=array($data_hp['harga_angka']/$pembagiNM[0],
                    $data_hp['ram_angka']/$pembagiNM[1],
                    $data_hp['memori_angka']/$pembagiNM[2],
                    $data_hp['processor_angka']/$pembagiNM[3],
                    $data_hp['kamera_angka']/$pembagiNM[4]);
                    $no++;
                }
                ?>
<!-- BOBOT (W) -->
<!-- Matriks ternormalisasi terbobot, Y: -->
                <?php
                    $query=mysqli_query($selectdb,"SELECT * FROM data_hp");
                    $no=1;
                    $pembagiNM=pembagiNM($Matrik);
                    while ($data_hp=mysqli_fetch_array($query)) {
                        
                        $NormalisasiBobot[$no-1]=array(
                            $MatrikNormalisasi[$no-1][0]*$W1,
                            $MatrikNormalisasi[$no-1][1]*$W2,
                            $MatrikNormalisasi[$no-1][2]*$W3,
                            $MatrikNormalisasi[$no-1][3]*$W4,
                            $MatrikNormalisasi[$no-1][4]*$W5 );
                            $no++;
                        }
                        ?>
 <!-- Matrik Solusi ideal positif "A+" dan negatif "A-" -->
                    <?php
                        $NormalisasiBobotTrans = Transpose($NormalisasiBobot);
                    ?>
                    <?php  
                            $idealpositif=array(min($NormalisasiBobotTrans[0]),max($NormalisasiBobotTrans[1]),max($NormalisasiBobotTrans[2]),max($NormalisasiBobotTrans[3]),max($NormalisasiBobotTrans[4]));
                    ?>
                    <?php  
                        $idealnegatif=array(max($NormalisasiBobotTrans[0]),min($NormalisasiBobotTrans[1]),min($NormalisasiBobotTrans[2]),min($NormalisasiBobotTrans[3]),min($NormalisasiBobotTrans[4]));
                    ?>
<!-- jarak -->
                    <?php
                        $query=mysqli_query($selectdb,"SELECT * FROM data_hp");
                        $no=1;
                        $Dplus=JarakIplus($idealpositif,$NormalisasiBobot);
                        $Dmin=JarakIplus($idealnegatif,$NormalisasiBobot);
                        while ($data_hp=mysqli_fetch_array($query)) {
                            $no++;
                        }
                        ?>
<!-- Nilai Preferensi untuk Setiap alternatif (V) -->
        <div class="w-100 d-flex justify-content-center align-items-center flex-column">
            <h3 class="text-light mt-5">Nilai Preferensi</h3>
                <table class="responsive-table border border-danger border-3 mt-5 w-50">
                    <thead>
                        <tr>
                            <th class="text-light"><center>Nilai Preferensi "V"</center></th>
                            <th class="text-light"><center>Nilai</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query=mysqli_query($selectdb,"SELECT * FROM data_hp");
                        $no=1;
                        $nilaiV = array();
                        while ($data_hp=mysqli_fetch_array($query)) {
                            
                            array_push($nilaiV, $Dmin[$no-1]/($Dmin[$no-1]+$Dplus[$no-1]));
                            ?>
                            <tr>
                                <td class="text-light"><center><?php echo "V",$no ?></center></td>
                                <td class="text-light"><center><?php echo $Dmin[$no-1]/($Dmin[$no-1]+$Dplus[$no-1]); ?></center></td>
                            </tr>
                            <?php
                            $no++;
                        }

                        ?>
                    </tbody>
                </table>
       </div>
    <!-- hasil -->
               <div class="box-result">
               <h3 class="text-light mt-5">Nilai Preferensi</h3>
                <div class="result">
                            <?php
                            $testmax = max($nilaiV);
                            for ($i=0; $i < count($nilaiV); $i++) { 
                                if ($nilaiV[$i] == $testmax) {
                                    $query=mysqli_query($selectdb,"SELECT * FROM data_hp where id_hp = $i+1");
                                    ?>
                                    <p class="v"><?php echo "V".($i+1); ?></p>
                                    <p class="value"><?php echo $nilaiV[$i]; ?></p>
                                    <?php while ($user=mysqli_fetch_array($query)) { ?>
                                    <p class="smartphone"><?php echo $user['nama_hp']; ?></p>
                                    <?php
                                }
                            }
                        } ?>
                    </div>
                </div>
  <div class="w-100 d-flex justify-content-center align-items-center bg-danger mt-5" style="height: 200px;">
    <p class="text-light">Copyrights All Reserved</p>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>