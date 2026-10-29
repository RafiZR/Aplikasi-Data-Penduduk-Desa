<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data" id="formTambah">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penduduk" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" placeholder="Tempat Lahir" required>
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" placeholder="Tanggal Lahir" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control" required>
						<option value="">- Pilih -</option>
						<option value="LK">LK</option>
						<option value="PR">PR</option>
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan Darah</label>
				<div class="col-sm-3">
					<select name="goldarah" id="goldarah" class="form-control" required>
						<option value="">- Pilih Golongan Darah -</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="AB">AB</option>
						<option value="O">O</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Desa</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="desa" name="desa" placeholder="Desa" required value="Lemahabang">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Dusun</label>
				<div class="col-sm-3">
					<select name="dusun" id="dusun" class="form-control" required>
						<option value="">- Pilih -</option>
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">RT/RW</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rt" name="rt" placeholder="RT" required>
				</div>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rw" name="rw" placeholder="RW" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-6">
					<select name="agama" id="agama" class="form-control" required>
						<option value="">- Pilih -</option>
						<option value="Islam">Islam</option>
						<option value="Kristen">Kristen</option>
						<option value="Protestan">Protestan</option>
						<option value="Konghuchu">Konghuchu</option>
						<option value="Buddha">Buddha</option>
						<option value="Hindu">Hindu</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perkawinan</label>
				<div class="col-sm-3">
					<select name="kawin" id="kawin" class="form-control" required>
						<option value="">- Pilih -</option>
						<option value="Sudah">Sudah</option>
						<option value="Belum">Belum</option>
						<option value="Cerai Mati">Cerai Mati</option>
						<option value="Cerai Hidup">Cerai Hidup</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pendidikan</label>
				<div class="col-sm-3">
					<select name="pendidikan" id="pendidikan" class="form-control" required>
						<option value="">- Pilih -</option>
						<option value="Tidak Sekolah">Tidak Sekolah</option>
						<option value="SD">SD</option>
						<option value="SMP">SMP</option>
						<option value="SMA/SMK">SMA/SMK</option>
						<option value="D1-D3">D1-D3</option>
						<option value="S1/D4">S1/D4</option>
						<option value="S2">S2</option>
						<option value="S3">S3</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pend" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
    // Validasi server-side untuk memastikan semua field required terisi
    $errors = array();
    
    if (empty($_POST['nik'])) $errors[] = "NIK harus diisi";
    if (empty($_POST['nama'])) $errors[] = "Nama harus diisi";
    if (empty($_POST['tempat_lh'])) $errors[] = "Tempat lahir harus diisi";
    if (empty($_POST['tgl_lh'])) $errors[] = "Tanggal lahir harus diisi";
    if (empty($_POST['jekel']) || $_POST['jekel'] == '') $errors[] = "Jenis kelamin harus dipilih";
    if (empty($_POST['goldarah']) || $_POST['goldarah'] == '') $errors[] = "Golongan darah harus dipilih";
    if (empty($_POST['desa'])) $errors[] = "Desa harus diisi";
    if (empty($_POST['dusun']) || $_POST['dusun'] == '') $errors[] = "Dusun harus dipilih";
    if (empty($_POST['rt'])) $errors[] = "RT harus diisi";
    if (empty($_POST['rw'])) $errors[] = "RW harus diisi";
    if (empty($_POST['agama']) || $_POST['agama'] == '') $errors[] = "Agama harus dipilih";
    if (empty($_POST['kawin']) || $_POST['kawin'] == '') $errors[] = "Status perkawinan harus dipilih";
    if (empty($_POST['pendidikan']) || $_POST['pendidikan'] == '') $errors[] = "Pendidikan harus dipilih";
    if (empty($_POST['pekerjaan'])) $errors[] = "Pekerjaan harus diisi";
    
    if (!empty($errors)) {
        // Jika ada error, tampilkan pesan error
        $error_message = implode("\\n", $errors);
        echo "<script>
        Swal.fire({
            title: 'Data Tidak Lengkap',
            text: '$error_message',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        </script>";
    } else {
        // Jika semua validasi lolos, lakukan insert data
        // Escape data untuk mencegah SQL injection
        $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $tempat_lh = mysqli_real_escape_string($koneksi, $_POST['tempat_lh']);
        $tgl_lh = mysqli_real_escape_string($koneksi, $_POST['tgl_lh']);
        $jekel = mysqli_real_escape_string($koneksi, $_POST['jekel']);
        $goldarah = mysqli_real_escape_string($koneksi, $_POST['goldarah']);
        $desa = mysqli_real_escape_string($koneksi, $_POST['desa']);
        $dusun = mysqli_real_escape_string($koneksi, $_POST['dusun']);
        $rt = mysqli_real_escape_string($koneksi, $_POST['rt']);
        $rw = mysqli_real_escape_string($koneksi, $_POST['rw']);
        $agama = mysqli_real_escape_string($koneksi, $_POST['agama']);
        $kawin = mysqli_real_escape_string($koneksi, $_POST['kawin']);
        $pendidikan = mysqli_real_escape_string($koneksi, $_POST['pendidikan']);
        $pekerjaan = mysqli_real_escape_string($koneksi, $_POST['pekerjaan']);
        
        $sql_simpan = "INSERT INTO tb_pdd (nik, nama, tempat_lh, tgl_lh, jekel, goldarah, desa, dusun, rt, rw, agama, kawin, pendidikan, pekerjaan, status) VALUES (
            '$nik',
            '$nama',
            '$tempat_lh',
            '$tgl_lh',
            '$jekel',
            '$goldarah',
            '$desa',
            '$dusun',
            '$rt',
            '$rw',
            '$agama',
            '$kawin',
            '$pendidikan',
            '$pekerjaan',
            'Ada')";
        
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        
        if ($query_simpan) {
            echo "<script>
            Swal.fire({
                title: 'Tambah Data Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-pend';
                }
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                title: 'Tambah Data Gagal',
                text: 'Error: " . mysqli_error($koneksi) . "',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=add-pend';
                }
            });
            </script>";
        }
        
        mysqli_close($koneksi);
    }
}

?>