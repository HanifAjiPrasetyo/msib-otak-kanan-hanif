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
        return "Mahasiswa {$this->nama} sedang berkonsultasi dengan Dosen Wali.";
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
        return "Dosen Wali {$this->nama} sedang mengurus KRS.";
    }
}

// Membuat objek mahasiswa dan dosen wali
$lingkunganKampus = new LingkunganKampus("Politeknik Negeri Malang");
$mahasiswa = new Mahasiswa("Hanif Aji Prasetyo", "123456789", $lingkunganKampus->getKampus());
$dosenWali = new DosenWali("Pak Dosen Wali", $lingkunganKampus->getKampus());

// Menampilkan ilustrasi di browser
echo $mahasiswa->konsultasi() . " </br>" . $dosenWali->urusKRS() . " di lingkungan Kampus " . $lingkunganKampus->getKampus();
