<?php include_once 'kalender.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Belajar PHP</title>

	<style type="text/css">
		.tengah {
			text-align: center;
		}

		.judul {
			width: 200px;
		}

		.field {
			text-align: left;
		}

		.tombol {
			width: 100px;
			background-color: #f2f2f2;
		}
	</style>

</head>
<body>

	<div>
		<center>
			<h1>FORM FILE TANGGAL <?php echo date('Y - m - d H:i:s'); ?></h1>
			<form action="proses.php" method="POST"> <!-- METODE -->
				<table class="tengah">
					<tr>
						<td class="judul">NIM</td>
						<td class="field"><input required type="number" name="nimTxt" placeholder="Masukan nim anda"></td>
					</tr>

					<tr>
						<td class="judul">Nama</td>
						<td class="field"><input required type="text" name="namaTxt" placeholder="Masukan nama anda"></td>
					</tr>

					<tr>
						<td class="judul">Alamat</td>
						<td class="field"><input required type="text" name="alamatTxt" placeholder="Masukan alamat anda"></td>
					</tr>

					<tr>
						<td class="judul">Tanggal Lahir</td>
						<td class="field">
							<select name="tanggal" required>
								<option>-Pilih Tanggal-</option>

								<?php for($tgl = 1; $tgl <= 31; $tgl++) { ?>

									<!-- DISINI MAU TARUH SCRIPT HTML -->
									<option value="<?php echo $tgl; ?>"><?php echo $tgl; ?></option>

								<?php } ?>
							</select>
						</td>
					</tr>

					<tr>
						<td class="judul">.</td>
						<td class="field">
							<select name="bulan" required>
								<option>-Pilih Bulan-</option>

								<?php foreach($bulan as $namaBulan) { ?>

									<!-- DISINI MAU TARUH SCRIPT HTML -->
									<option value="<?php echo $namaBulan; ?>"><?php echo $namaBulan; ?></option>

								<?php } ?>
							</select>
						</td>
					</tr>

					<tr>
						<td class="judul">.</td>
						<td class="field">
							<select name="tahun" required>
								<option>-Pilih Tahun-</option>

								<?php for($thn = 1970; $thn <= date('Y'); $thn++) { ?>

									<!-- DISINI MAU TARUH SCRIPT HTML -->
									<option value="<?php echo $thn; ?>"><?php echo $thn; ?></option>

								<?php } ?>
							</select>
						</td>
					</tr>

					<tr>
						<td class="judul">.</td>
						<td class="field">
							<input class="tombol" type="submit" value="Kirim">
						</td>
					</tr>
				</table>
			</form>

			<br>
			<br>
			<table border="1">
				<tr>
					<th>NO</th>
					<th>NAMA FILE / NIM</th>
				</tr>

				<!-- scandir = scan / baca folder -->
				<?php 
					$nomor = 1;
					// ./ << root folder/ 1 folder dengan project
					$list_file = array_diff(scandir('./data'), array('.', '..'));

					foreach ($list_file as $namaFile) {
						
						echo '<tr>
						<td>'.$nomor.'</td>
						<td><a href=baca_file.php?nim='.$namaFile.'>'.$namaFile.'</a> | Edit | Hapus</td>
						</tr>';

						$nomor++;
					}
				?>
			</table>
		</center>
	</div>

</body>
</html>