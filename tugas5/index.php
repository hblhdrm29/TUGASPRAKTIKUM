<?php

$bandara_asal = array(
    
    "Soekarno-Hatta (CGK)" => 0 ,
    
    "Husein Sastranegara (BDO)" => 0 ,
    
    "Abdul Rahman Saleh (MLG)" => 0,
    
    "Juanda (SUB)" => - 0
);

$bandara_tujuan = array(
   
    "Ngurai Rai (DPS)" => 0 ,
    
    "Hasanuddin (UPG)" => 0 ,
    
    "Inanwatan (INX)" => 0 ,
    
    "Sultan Iskandar Muda (BTJ)" => - 0
);


function getPajakAsal($bandara_asal, $tujuan)
{
    $pajak = $bandara_asal[$tujuan];
    return $pajak;
}
function getPajakTujuan($bandara_tujuan, $tujuan)
{
    $pajak = $bandara_tujuan[$tujuan];
    return $pajak;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>hdhmmz airport</title>
</head>

<body>
<div class="container">
<div class="row mt-5">
<nav class="navbar navbar-expand-lg navbar- bg-danger">
    <div class="container-fluid">
    <a> <h1 class="navbar-bg-black" href="">hdhmmz Flight </a></h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
  </div>
</nav>
        <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Pendaftaran Rute Penerbangan</h1>
            </div>
</div>
    <div class="container">
        <br>

        </div>
        </div>
         <div class="row">
            <div class="col-rg-7 text-right">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="maskapai" class="form-label">Maskapai</label>
                        <input type="text" class="form-control" id="maskapai" name="maskapai">
                    </div>
                    <label for="asal" class="form-label">Bandara Asal</label>
                    <select class="form-select mb-3" name="asal" id="asal">
                        <option selected>Pilih Bandara</option>
                        <?php foreach ($bandara_asal as $bandara => $pajak) : ?>
                            <option value="<?= $bandara ?>"><?= $bandara; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="tujuan" class="form-label">Bandara Tujuan</label>
                    <select class="form-select mb-3" name="tujuan" id="tujuan">
                        <option selected>Pilih Bandara</option>
                        <?php foreach ($bandara_tujuan as $bandara => $pajak) : ?>
                            <option value="<?= $bandara ?>"><?= $bandara; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Tiket</label>
                        <input type="text" class="form-control" name="harga" id="harga">
                    </div>
                    <button class="btn btn-success" name="submit">Simpan</button>
                </form>
                <div class="row">
            <div class="col-rg-7 text-right">
            </div>
        </div>
        <?php
        $file = 'data./maskapai.json';
        $data_maskapai = array();

        $file_json = file_get_contents($file);

        $data_maskapai = json_decode($file_json, true);

        if (isset($_POST['submit'])) {
            $pajak = getPajakAsal($bandara_asal, $_POST['asal']) + getPajakTujuan($bandara_tujuan, $_POST['tujuan']);
            $total = $pajak + $_POST['harga'];

            $inputUser = array(
                "Maskapai" => $_POST['maskapai'],
                "Asal_penerbangan" => $_POST['asal'],
                "tujuan_penerbangan" => $_POST['tujuan'],
                "Harga_tiket" => $_POST['harga'],
                "Pajak" => $pajak,
                "Total_harga" => $total
            );

            array_push($data_maskapai, $inputUser);

            $data_json = json_encode($data_maskapai, JSON_PRETTY_PRINT);
            file_put_contents($file, $data_json);
        }

        ?>
         <div class="row">
            <div class="col-md-12 text-center">
                <h1>Data Rute Tersedia</h1>
            </div>
            <div class="row">
            <div class="col-md-12 text-left">
        <div class="row">
            <table class="table">
                <thead>
                    <div class="bg primary-green">
                    <tr style= "background-color: black; color: white; ">
                        <th scope="col">Maskapai</th>
                        <th scope="col">Asal Penerbangan</th>
                        <th scope="col">Tujuan Penerbangan</th>
                        <th scope="col">Harga Tiket</th>
                        <th scope="col">Pajak</th>
                        <th scope="col">Total Harga Tiket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_maskapai as $data => $value) : ?>
                        <tr>
                            <td><?= $data_maskapai[$data]['Maskapai']; ?></td>
                            <td><?= $data_maskapai[$data]['Asal_penerbangan']; ?></td>
                            <td><?= $data_maskapai[$data]['tujuan_penerbangan']; ?></td>
                            <td><?= $data_maskapai[$data]['Harga_tiket']; ?></td>
                            <td><?= $data_maskapai[$data]['Pajak']; ?></td>
                            <td><?= $data_maskapai[$data]['Total_harga']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
            </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>