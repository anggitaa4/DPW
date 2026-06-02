<?php
require_once "Manusia.php";

class mahasiswa extends Manusia
{
    protected $NIM;
    protected $jurusan;
    protected $kelas;

    public function __construct($nama)
    {
        // kita bisa langsung manfaatkan fungsi dari kelas manusia.php
        $this->setNama($nama);
    }

    // Getter dan Setter untuk NIM
    public function getNim()
    {
        return $this->NIM;
    }

    public function setNIM($NIM)
    {
        $this->NIM = $NIM;
    }

    // Getter dan Setter untuk jurusan
    public function getJurusan()
    {
        return $this->jurusan;
    }

    public function setJurusan($jurusan)
    {
        $this->jurusan = $jurusan;
    }

    // Getter dan Setter untuk kelas
    public function getKelas()
    {
        return $this->kelas;
    }

    public function setKelas($kelas)
    {
        $this->kelas = $kelas;
    }
}
