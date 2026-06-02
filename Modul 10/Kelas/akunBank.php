<?php

class akunBank
{
    protected $accountNumber;
    protected $jmlUang;
    protected $nama;

    public function __construct($nomorAkun, $nominal)
    {
        $this->accountNumber = $nomorAkun;
        $this->jmlUang = $nominal;
    }

    // Getter dan Setter untuk $nama
    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    // Getter dan Setter untuk accountNumber
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    // Menambahkan jumlah uang
    public function tambahUang($jumlah)
    {
        if ($jumlah > 0) {
            $this->jmlUang += $jumlah;
            return "Berhasil menambah uang sebesar Rp " . number_format($jumlah, 0, ',', '.') . ". Saldo sekarang: Rp " . number_format($this->jmlUang, 0, ',', '.');
        }
        return "Jumlah yang ditambahkan harus lebih dari 0.";
    }

    // Mengurangi jumlah uang
    public function kurangUang($jumlah)
    {
        if ($jumlah > 0 && $jumlah <= $this->jmlUang) {
            $this->jmlUang -= $jumlah;
            return "Berhasil mengurangi uang sebesar Rp " . number_format($jumlah, 0, ',', '.') . ". Saldo sekarang: Rp " . number_format($this->jmlUang, 0, ',', '.');
        } elseif ($jumlah > $this->jmlUang) {
            return "Saldo tidak mencukupi!";
        }
        return "Jumlah yang dikurangi harus lebih dari 0.";
    }

    // Menampilkan jumlah uang
    public function tampilUang()
    {
        return "Saldo akun [" . $this->accountNumber . "] a.n. " . $this->nama . " : Rp " . number_format($this->jmlUang, 0, ',', '.');
    }

    // Menghitung pajak 11%
    public function hitungPajak()
    {
        $pajak = $this->jmlUang * 0.11;
        return "Pajak (11%) dari saldo Rp " . number_format($this->jmlUang, 0, ',', '.') . " = Rp " . number_format($pajak, 0, ',', '.');
    }
}
