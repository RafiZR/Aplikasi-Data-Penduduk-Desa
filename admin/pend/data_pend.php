<style>
/* Modern Table Styling */
.data-table-container {
    padding: 30px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.table-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.table-title {
    font-size: 1.8rem;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin: 0;
}

.add-btn {
    background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    border: none;
    border-radius: 50px;
    padding: 10px 20px;
    color: white;
    font-weight: 600;
    box-shadow: 0 4px 15px rgba(67, 233, 123, 0.3);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
}

.add-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(67, 233, 123, 0.4);
    color: white;
    text-decoration: none;
}

/* Export Button Styling */
.export-btn {
    background: linear-gradient(135deg, #ff9a00 0%, #ffcd02 100%);
    border: none;
    border-radius: 50px;
    padding: 8px 16px;
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
    box-shadow: 0 4px 15px rgba(255, 154, 0, 0.3);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 6px;
    text-decoration: none;
    margin-left: 10px;
}

.export-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 154, 0, 0.4);
    color: white;
    text-decoration: none;
}

/* Custom DataTable Controls */
.dataTables_wrapper .dataTables_filter {
    float: right;
    text-align: right;
    display: flex;
    align-items: center;
    gap: 10px;
}

.dataTables_wrapper .dataTables_filter label {
    font-weight: 600;
    color: #667eea;
    display: flex;
    align-items: center;
    gap: 8px;
}

.dataTables_wrapper .dataTables_filter input {
    border: 2px solid #e1e8ed;
    border-radius: 25px;
    padding: 8px 15px;
    outline: none;
    transition: all 0.3s ease;
    background: white;
}

.dataTables_wrapper .dataTables_filter input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.table-responsive {
    border-radius: 15px;
    overflow: hidden;
}

.table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 0.95rem;
}

.table thead th {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    font-weight: 600;
    padding: 15px;
    border: none;
    position: sticky;
    top: 0;
}

.table tbody tr {
    transition: all 0.2s ease;
}

.table tbody tr:nth-child(even) {
    background-color: rgba(102, 126, 234, 0.05);
}

.table tbody tr:hover {
    background-color: rgba(102, 126, 234, 0.1);
    transform: translateX(5px);
}

.table td {
    padding: 12px 15px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    vertical-align: middle;
}

.action-btns {
    display: flex;
    gap: 8px;
}

.btn-sm {
    padding: 5px 10px;
    border-radius: 50px;
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: all 0.2s ease;
    text-decoration: none;
}

.btn-sm:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    text-decoration: none;
}

.btn-info {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    border: none;
    color: white;
}

.btn-success {
    background: linear-gradient(135deg, #3fefb9 0%, #1cb5e0 100%);
    border: none;
    color: white;
}

.btn-danger {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    border: none;
    color: white;
}

.jekel-badge {
    padding: 3px 10px;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.jekel-badge.lk {
    background: rgba(79, 172, 254, 0.2);
    color: #4facfe;
}

.jekel-badge.pr {
    background: rgba(240, 147, 251, 0.2);
    color: #f093fb;
}

/* Responsive Design */
@media (max-width: 768px) {
    .table-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .dataTables_wrapper .dataTables_filter {
        float: none;
        text-align: left;
        margin-bottom: 15px;
    }
    
    .table td, .table th {
        padding: 8px 10px;
    }
    
    .action-btns {
        flex-direction: column;
        gap: 5px;
    }
    
    .btn-sm {
        width: 100%;
    }
}
</style>

<div class="data-table-container">
    <div class="table-header">
        <h2 class="table-title">
            <i class="fas fa-users"></i> Data Penduduk
        </h2>
        <a href="?page=add-pend" class="add-btn">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>
    
    <div class="table-responsive">
        <table id="dataTable" class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>JK</th>
					<th>Alamat</th>
					<th>No KK</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, p.jekel, p.desa, p.rt, p.rw, a.id_kk, k.no_kk, k.kepala 
										FROM tb_pdd p 
										LEFT JOIN tb_anggota a ON p.id_pend=a.id_pend 
										LEFT JOIN tb_kk k ON a.id_kk=k.id_kk 
										WHERE status='Ada'");
				while ($data = $sql->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo htmlspecialchars($data['nik'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
					<td><?php echo htmlspecialchars($data['nama'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
					<td>
						<span class="jekel-badge <?php echo strtolower($data['jekel']) == 'lk' ? 'lk' : 'pr'; ?>">
							<?php echo htmlspecialchars($data['jekel'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
						</span>
					</td>
					<td>
						<?php echo htmlspecialchars($data['desa'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
						RT <?php echo htmlspecialchars($data['rt'] ?? '', ENT_QUOTES, 'UTF-8'); ?>/
						RW <?php echo htmlspecialchars($data['rw'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
					</td>
					<td>
						<?php 
						if (!empty($data['no_kk'])) {
							echo htmlspecialchars($data['no_kk'], ENT_QUOTES, 'UTF-8');
							if (!empty($data['kepala'])) {
								echo ' - ' . htmlspecialchars($data['kepala'], ENT_QUOTES, 'UTF-8');
							}
						} else {
							echo '-';
						}
						?>
					</td>
					<td>
						<div class="action-btns">
							<a href="?page=view-pend&kode=<?php echo $data['id_pend']; ?>" 
							title="Detail" class="btn btn-info btn-sm">
								<i class="fas fa-user"></i>
							</a>
							<a href="?page=edit-pend&kode=<?php echo $data['id_pend']; ?>" 
							title="Ubah" class="btn btn-success btn-sm">
								<i class="fas fa-edit"></i>
							</a>
							<a href="?page=del-pend&kode=<?php echo $data['id_pend']; ?>" 
							onclick="return confirm('Apakah anda yakin hapus data ini?')"
							title="Hapus" class="btn btn-danger btn-sm">
								<i class="fas fa-trash"></i>
							</a>
						</div>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
    </div>
</div>

<script>
// Inisialisasi DataTable dengan konfigurasi modern
document.addEventListener('DOMContentLoaded', function() {
    $('#dataTable').DataTable({
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data tersedia",
            "infoFiltered": "(disaring dari _MAX_ total data)",
            "search": "Cari:",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        },
        "dom": '<"top"<"left-col"l><"center-col"f><"right-col">>rt<"bottom"ip><"clear">',
        "responsive": true,
        "initComplete": function() {
            // Tambahkan tombol export di sebelah search
            $('.dataTables_filter').append(
                '<a href="admin/pend/export_excel.php" class="export-btn" title="Export ke Excel">' +
                '<i class="fas fa-file-excel"></i> Export Excel</a>'
            );
            
            // Animasi untuk munculnya tabel
            $('table tbody tr').each(function(i) {
                $(this).css('opacity', 0).delay(i * 100).animate({
                    opacity: 1
                }, 200);
            });
        }
    });
    
    // Efek hover yang lebih halus
    $('table tbody tr').hover(
        function() {
            $(this).css('transform', 'translateX(5px)');
        },
        function() {
            $(this).css('transform', 'translateX(0)');
        }
    );
});
</script>