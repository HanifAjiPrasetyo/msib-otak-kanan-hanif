<?php

// Kelas LingkunganKampus
class LingkunganKampus
{
    private $kampus;

    public function __construct($kampus)
    {
        $this->kampus = $kampus;
    }

    public function getKampus()
    {
        return $this->kampus;
    }
}

// Kelas Mahasiswa yang mewarisi LingkunganKampus
class Mahasiswa extends LingkunganKampus
{
    private $nama;
    private $nim;

    public function __construct($nama, $nim, $kampus)
    {
        parent::__construct($kampus);
        $this->nama = $nama;
        $this->nim = $nim;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getNIM()
    {
        return $this->nim;
    }

    public function konsultasi()
    {
        return "Mahasiswa {$this->nama}, dengan nim {$this->nim} sedang berkonsultasi dengan dosen wali terkait KRS.";
    }
}

// Kelas DosenWali yang mewarisi LingkunganKampus
class DosenWali extends LingkunganKampus
{
    private $nama;

    public function __construct($nama, $kampus)
    {
        parent::__construct($kampus);
        $this->nama = $nama;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function urusKRS()
    {
        return "Dosen wali {$this->nama} sedang mengurus KRS ";
    }
}

// Mengambil inputan form
$mhs = isset($_POST['nama_mhs']) ? $_POST['nama_mhs'] : ''; // Nama Mahasiswa
$nim = isset($_POST['nim']) ? $_POST['nim'] : ''; // NIM
$dosen_wali = isset($_POST['dosen_wali']) ? $_POST['dosen_wali'] : ''; // Nama Dosen Wali
$kampus = isset($_POST['kampus']) ? $_POST['kampus'] : ''; // Nama Kampus


// Membuat objek dari semua class
$lingkunganKampus = new LingkunganKampus($kampus);
$mahasiswa = new Mahasiswa($mhs, $nim, $lingkunganKampus->getKampus());
$dosenWali = new DosenWali($dosen_wali, $lingkunganKampus->getKampus());



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urus KRS</title>
    <style>
        .input {
            margin: 5px 0;
        }

        .input input {
            display: block;
        }

        form {
            width: 300px;
            margin: auto;
            display: flex;
            align-items: center;
            flex-direction: column;
            background-color: lightblue;
            padding: 10px;
            border-radius: 10px;
        }

        button {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <br><br>
    <form action="index.php" method="post">
        <h3>Form Urus KRS</h3>
        <div class="input">
            <label for="nama_mhs">Nama Mahasiswa : </label>
            <input type="text" name="nama_mhs" id="nama_mhs">
        </div>
        <div class="input">
            <label for="nim">NIM : </label>
            <input type="text" name="nim" id="nim">
        </div>
        <div class="input">
            <label for="dosen_wali">Nama Dosen Wali : </label>
            <input type="text" name="dosen_wali" id="dosen_wali">
        </div>
        <div class="input">
            <label for="kampus">Nama Kampus : </label>
            <input type="text" name="kampus" id="kampus">
        </div>
        <button type="submit">Submit</button>
    </form>

    <h4 style="text-align:center">
        <?php if (isset($_POST['nama_mhs']) && isset($_POST['nim']) && isset($_POST['dosen_wali']) && isset($_POST['kampus'])) : ?>
            <?= $mahasiswa->konsultasi() . " </br>" . $dosenWali->urusKRS() . " di Kampus " . $lingkunganKampus->getKampus() . "." ?>
        <?php else : ?>
            Form belum diisi semua
        <?php endif; ?>
    </h4>
</body>

</html>