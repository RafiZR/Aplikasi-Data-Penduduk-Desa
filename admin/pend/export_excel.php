<?php
require_once("../../inc/koneksi.php");

// Header agar browser mengenali sebagai file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data_penduduk.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Query sama dengan data_pend.php
$sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, p.jekel, p.desa, p.rt, p.rw, 
                               a.id_kk, k.no_kk, k.kepala 
                        FROM tb_pdd p 
                        LEFT JOIN tb_anggota a ON p.id_pend=a.id_pend 
                        LEFT JOIN tb_kk k ON a.id_kk=k.id_kk 
                        WHERE status='Ada' 
                        ORDER BY p.nama ASC");
?>

<table border="1">
    <thead>
        <tr style="background:#cfd8dc;">
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>JK</th>
            <th>Alamat</th>
            <th>No KK</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        while($data = $sql->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($data['nik']); ?></td>
                <td><?php echo htmlspecialchars($data['nama']); ?></td>
                <td><?php echo htmlspecialchars($data['jekel']); ?></td>
                <td>
                    <?php echo htmlspecialchars($data['desa']); ?>
                    RT <?php echo htmlspecialchars($data['rt']); ?>/RW <?php echo htmlspecialchars($data['rw']); ?>
                </td>
                <td>
                    <?php 
                    if (!empty($data['no_kk'])) {
                        echo htmlspecialchars($data['no_kk']);
                        if (!empty($data['kepala'])) {
                            echo ' - ' . htmlspecialchars($data['kepala']);
                        }
                    } else {
                        echo '-';
                    }
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
