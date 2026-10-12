<?php
require_once 'data.php';
if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
    exit();
}
$user = $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistem Informasi Konseling</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f9; }
        .sidebar { width: 250px; background: #343a40; color: white; position: fixed; height: 100%; padding: 20px; box-sizing: border-box; }
        .sidebar h3 { font-size: 18px; margin-bottom: 20px; }
        .sidebar a { display: block; color: #c2c7d0; text-decoration: none; padding: 10px 0; border-bottom: 1px solid #4f5962; }
        .sidebar a:hover { color: white; }
        .content { margin-left: 250px; padding: 30px; }
        .card { background: white; padding: 20px; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        th { background: #f8f9fa; }
        .logout { color: #ff6b6b !important; margin-top: 30px; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h3>SIM Konseling</h3>
        <p>Halo, <b><?php echo $user['nama']; ?></b></p>
        <p style="font-size: 12px; color: #adb5bd;">Role: <?php echo $user['role']; ?></p>
        <hr style="border-color: #4f5962;">
        <a href="dashboard.php">Dashboard</a>
        <?php if ($user['role'] == 'guru BK'): ?>
            <a href="tambah_pelanggaran.php">Input Pelanggaran</a>
        <?php endif; ?>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <div class="content">
        <div class="card">
            <h2>Dashboard Utama</h2>
            <p>Selamat datang di Sistem Informasi Pengelolaan Pelanggaran dan Konseling Siswa. Anda masuk sebagai <b><?php echo $user['role']; ?></b>[cite: 1].</p>
        </div>

        <div class="card">
            <h3>Riwayat Pelanggaran Siswa</h3>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Pelanggaran</th>
                        <th>Poin</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($_SESSION['pelanggaran_siswa'])): ?>
                        <tr><td colspan="5" style="text-align: center;">Belum ada data pelanggaran.</td></tr>
                    <?php else: ?>
                        <?php foreach ($_SESSION['pelanggaran_siswa'] as $index => $row): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo htmlspecialchars($row['nama_siswa']); ?></td>
                                <td><?php echo htmlspecialchars($row['pelanggaran']); ?></td>
                                <td><?php echo htmlspecialchars($row['poin']); ?></td>
                                <td><?php echo htmlspecialchars($row['tanggal']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
