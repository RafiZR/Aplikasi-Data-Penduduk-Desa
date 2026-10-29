<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_kk WHERE id_kk='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
        
        $karkel=$data_cek['id_kk'];
    }
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fas fa-users"></i> Anggota KK
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<input type='hidden' class="form-control" id="id_kk" name="id_kk" 
                value="<?php echo $data_cek['id_kk']; ?>" readonly/>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No KK | KPl Keluarga</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" 
                        value="<?php echo $data_cek['no_kk']; ?>" readonly/>
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" 
                        value="<?php echo $data_cek['kepala']; ?>" readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" 
                        value="<?php echo $data_cek['desa']; ?>, RT <?php echo $data_cek['rt']; ?> RW <?php echo $data_cek['rw']; ?> (<?php echo $data_cek['kec']; ?> - <?php echo $data_cek['kab']; ?> - <?php echo $data_cek['prov']; ?>)"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Anggota</label>
				<div class="col-sm-4">
					<select name="id_pend" id="id_pend" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Penduduk -</option>
						<?php
                        // hanya tampilkan penduduk yg belum masuk tb_anggota
                        $query = "SELECT * FROM tb_pdd p 
                                  WHERE p.status='Ada' 
                                  AND p.id_pend NOT IN (SELECT id_pend FROM tb_anggota)";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_pend'] ?>">
							<?php echo $row['nik'] ?> - <?php echo $row['nama'] ?>
						</option>
						<?php } ?>
					</select>
				</div>
				<div class="col-sm-3">
					<select name="hubungan" id="hubungan" class="form-control" required>
						<option value="" disabled selected>- Pilih Hub Keluarga -</option>
						<option value="Kepala Keluarga">Kepala Keluarga</option>
						<option value="Istri">Istri</option>
						<option value="Anak">Anak</option>
						<option value="Orang Tua">Orang Tua</option>
						<option value="Mertua">Mertua</option>
						<option value="Menantu">Menantu</option>
						<option value="Cucu">Cucu</option>
						<option value="Famili Lain">Famili Lain</option>
					</select>
				</div>
				<input type="submit" name="Simpan" value="Tambah" class="btn btn-success">
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>NIK</th>
								<th>Nama</th>
								<th>Jekel</th>
								<th>Hub Keluarga</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
                            $sql = $koneksi->query("SELECT p.nik, p.nama, p.jekel, a.hubungan, a.id_anggota 
                                FROM tb_pdd p 
                                INNER JOIN tb_anggota a ON p.id_pend=a.id_pend 
                                WHERE status='Ada' AND id_kk=$karkel");
                            while ($data= $sql->fetch_assoc()) {
                            ?>
							<tr>
								<td><?php echo $data['nik']; ?></td>
								<td><?php echo $data['nama']; ?></td>
								<td><?php echo $data['jekel']; ?></td>
								<td><?php echo $data['hubungan']; ?></td>
								<td>
									<a href="?page=del-anggota&kode=<?php echo $data['id_anggota']; ?>" 
                                        onclick="return confirm('Apakah anda yakin hapus data ini ?')" 
                                        title="Hapus" class="btn btn-danger btn-sm">
										<i class="fas fa-trash"></i>
									</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<a href="?page=data-kartu" title="Kembali" class="btn btn-warning">Kembali</a>
		</div>
	</form>
</div>

<?php
    if (isset ($_POST['Simpan'])){
        $id_kk = $_POST['id_kk'];
        $id_pend = $_POST['id_pend'];
        $hubungan = $_POST['hubungan'];

        // Validasi kosong
        if (empty($id_pend) || empty($hubungan)) {
            echo "<script>
            Swal.fire({
                title: 'Data belum lengkap!',
                text: 'Silakan pilih Penduduk dan Hubungan Keluarga',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=anggota&kode=".$id_kk."';
                }
            })
            </script>";
        } else {
            // Cek apakah penduduk sudah terdaftar di KK lain
            $cek_pend = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE id_pend='$id_pend'");
            if (mysqli_num_rows($cek_pend) > 0) {
                echo "<script>
                Swal.fire({
                    title: 'Penduduk sudah terdaftar!',
                    text: 'Penduduk ini sudah masuk dalam KK lain',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=anggota&kode=".$id_kk."';
                    }
                })
                </script>";
            } else {
                // Jika aman, simpan data
                $sql_simpan = "INSERT INTO tb_anggota (id_kk, id_pend, hubungan) VALUES (
                    '".$id_kk."',
                    '".$id_pend."',
                    '".$hubungan."')";
                $query_simpan = mysqli_query($koneksi, $sql_simpan);

                if ($query_simpan) {
                    echo "<script>
                    Swal.fire({
                        title: 'Tambah Data Berhasil',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value){
                            window.location = 'index.php?page=anggota&kode=".$id_kk."';
                        }
                    })</script>";
                } else {
                    echo "<script>
                    Swal.fire({
                        title: 'Tambah Data Gagal',
                        text: '',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value){
                            window.location = 'index.php?page=anggota&kode=".$id_kk."';
                        }
                    })</script>";
                }
            }
        }
    }
?>
