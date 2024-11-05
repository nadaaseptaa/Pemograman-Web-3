<?php

require_once "Model/ListBuku.php";

class BukuController{

    public function jalankan(){

        // menggunakan model
        $daftar_buku_model = new ListBuku();
        $daftar_buku = $daftar_buku_model->getData();

        //mengirim dan menampilkan data ke View
        include_once "View/BukuView.php";

    }

    public function edit(){
        echo "edit";
    }

    public function update(){
        echo "update";
    }

    public function simpan(){
        
       $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];


        // buat objek buku dari class buku
        $buku = new Buku($judul, $pengarang, $penerbit, $tahun);

        // menyimpan buku dengan method simpan di class ListBuku
        $daftar_buku = new ListBuku();
        $status = $daftar_buku ->simpan($buku);

        if($status){
            session_start();
            $_SESSION['messege'] = "Data buku dengan judul" . $buku->getjudul() . 
            "Berhasil disimpan";
        }else{
            $_SESSION['error'] = "Data gagal disimpan!";
        }
        // redirect ke index.php
        header('Location: http://localhost/index.php');
        exit;
    }
    public function hapus(){
        echo "hapus";
    }

    
}