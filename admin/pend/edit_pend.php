<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pdd WHERE id_pend='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Sistem</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_pend" name="id_pend" value="<?php echo $data_cek['id_pend']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" value="<?php echo $data_cek['tempat_lh']; ?>"
					/>
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" value="<?php echo $data_cek['tgl_lh']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option value="">-- Pilih jekel --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['jekel'] == "LK") echo "<option value='LK' selected>LK</option>";
                else echo "<option value='LK'>LK</option>";

                if ($data_cek['jekel'] == "PR") echo "<option value='PR' selected>PR</option>";
                else echo "<option value='PR'>PR</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan Darah</label>
				<div class="col-sm-3">
					<select name="goldarah" id="goldarah" class="form-control">
						<option value="">-- Pilih Golongan Darah --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['goldarah'] == "A") echo "<option value='A' selected>A</option>";
                else echo "<option value='A'>A</option>";

                if ($data_cek['goldarah'] == "B") echo "<option value='B' selected>B</option>";
                else echo "<option value='B'>B</option>";

				if ($data_cek['goldarah'] == "AB") echo "<option value='AB' selected>AB</option>";
                else echo "<option value='AB'>AB</option>";

                if ($data_cek['goldarah'] == "O") echo "<option value='O' selected>O</option>";
                else echo "<option value='O'>O</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Desa</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="desa" name="desa" value="<?php echo $data_cek['desa']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">	
				<label class="col-sm-2 col-form-label">Dusun</label>
				<div class="col-sm-3">
					<select name="dusun" id="dusun" class="form-control">
						<option value="">-- Pilih Dusun --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['dusun'] == "01") echo "<option value='01' selected>01</option>";
                else echo "<option value='01'>01</option>";

                if ($data_cek['dusun'] == "02") echo "<option value='02' selected>02</option>";
                else echo "<option value='02'>02</option>";

				if ($data_cek['dusun'] == "03") echo "<option value='03' selected>03</option>";
                else echo "<option value='03'>03</option>";
				
				
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">RT/RW</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rt" name="rt" value="<?php echo $data_cek['rt']; ?>"
					/>
				</div>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rw" name="rw" value="<?php echo $data_cek['rw']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="agama" name="agama" value="<?php echo $data_cek['agama']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perkawinan</label>
				<div class="col-sm-3">
					<select name="kawin" id="kawin" class="form-control">
						<option value="">-- Pilih Status --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['kawin'] == "Sudah") echo "<option value='Sudah' selected>Sudah</option>";
                else echo "<option value='Sudah'>Sudah</option>";

                if ($data_cek['kawin'] == "Belum") echo "<option value='Belum' selected>Belum</option>";
				else echo "<option value='Belum'>Belum</option>";
				
				if ($data_cek['kawin'] == "Cerai Mati") echo "<option value='Cerai Mati' selected>Cerai Mati</option>";
                else echo "<option value='Cerai Mati'>Cerai Mati</option>";

                if ($data_cek['kawin'] == "Cerai Hidup") echo "<option value='Cerai Hidup' selected>Cerai Hidup</option>";
                else echo "<option value='Cerai Hidup'>Cerai Hidup</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pendidikan</label>
				<div class="col-sm-3">
					<select name="pendidikan" id="pendidikan" class="form-control">
						<option value="">-- Pilih Status --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['pendidikan'] == "Tidak Sekolah") echo "<option value='Tidak Sekolah' selected>Tidak Sekolah</option>";
                else echo "<option value='Tidak Sekolah'>Tidak Sekolah</option>";

                if ($data_cek['pendidikan'] == "SD") echo "<option value='SD' selected>SD</option>";
				else echo "<option value='SD'>SD</option>";
				
				if ($data_cek['pendidikan'] == "SMP") echo "<option value='SMP' selected>SMP</option>";
                else echo "<option value='SMP'>SMP</option>";

                if ($data_cek['pendidikan'] == "SMA/SMK") echo "<option value='SMA/SMK' selected>SMA/SMK</option>";
                else echo "<option value='SMA/SMK'>SMA/SMK</option>";

				if ($data_cek['pendidikan'] == "D1-D3") echo "<option value='D1-D3' selected>D1-D3</option>";
                else echo "<option value='D1-D3'>D1-D3</option>";

				if ($data_cek['pendidikan'] == "S1/D4") echo "<option value='S1/D4' selected>S1/D4</option>";
                else echo "<option value='S1/D4'>S1/D4</option>";

				if ($data_cek['pendidikan'] == "S2") echo "<option value='S2' selected>S2</option>";
                else echo "<option value='S2'>S2</option>";

				if ($data_cek['pendidikan'] == "S3") echo "<option value='S3' selected>S3</option>";
                else echo "<option value='S3'>S3</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $data_cek['pekerjaan']; ?>"
					/>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pend" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_pdd SET 
		nik='".$_POST['nik']."',
		nama='".$_POST['nama']."',	
		tempat_lh='".$_POST['tempat_lh']."',
		tgl_lh='".$_POST['tgl_lh']."',
		jekel='".$_POST['jekel']."',
		goldarah='".$_POST['goldarah']."',
		desa='".$_POST['desa']."',
		rt='".$_POST['rt']."',
		rw='".$_POST['rw']."',
		agama='".$_POST['agama']."',
		kawin='".$_POST['kawin']."',
		pendidikan='".$_POST['pendidikan']."',
		pekerjaan='".$_POST['pekerjaan']."'
		WHERE id_pend='".$_POST['id_pend']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pend';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pend';
        }
      })</script>";
    }}
