<?php

class Manusia
{
    // Deklarasi Variabel
    protected $name;
    protected $nik = "123212131243243";
    protected $umur;

    public function getNama()
    {
        return $this->name;
    }

    public function setNama($name)
    {
        $this->name = $name;
    }

    // Getter untuk NIK - diubah ke public agar bisa diakses dari luar
    public function getNIK()
    {
        return " nik {$this->nik} ";
    }

    // Getter dan Setter untuk umur
    public function getUmur()
    {
        return $this->umur;
    }

    public function setUmur($umur)
    {
        $this->umur = $umur;
    }
}
