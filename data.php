<?php
session_start();

// Inisialisasi Data Dummy jika belum ada di Session
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        ['id' => 1, 'nama' => 'Bu Rina (Guru BK)', 'username' => 'bk', 'password' => '123', 'role' => 'guru BK'],
        ['id' => 2, 'nama' => 'Pak Joko (Wali Kelas)', 'username' => 'walikelas', 'password' => '123', 'role' => 'walikelas'],
        ['id' => 3, 'nama' => 'Andi Pratama', 'username' => 'andi', 'password' => '123', 'role' => 'siswa'],
    ];
}

if (!isset($_SESSION['siswa'])) {
    $_SESSION['siswa'] = [
        ['id_siswa' => 1, 'nis' => '231001', 'nama_siswa' => 'Andi Pratama', 'kelas' => 'XII RPL 1'],
        ['id_siswa' => 2, 'nis' => '231002', 'nama_siswa' => 'Siti Aisyah', 'kelas' => 'XII RPL 1'],
    ];
}

if (!isset($_SESSION['pelanggaran_siswa'])) {
    $_SESSION['pelanggaran_siswa'] = [
        ['id_catatan' => 1, 'nama_siswa' => 'Andi Pratama', 'pelanggaran' => 'Terlambat', 'poin' => 5, 'tanggal' => '2026-05-02'],
        ['id_catatan' => 2, 'nama_siswa' => 'Siti Aisyah', 'pelanggaran' => 'Tidak Pakai Seragam', 'poin' => 10, 'tanggal' => '2026-04-28'],
    ];
}
?>
