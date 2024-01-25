<?php
session_start();

// Oturum kontrolü yap
if (!isset($_SESSION['oturum']) || $_SESSION['oturum'] !== true) {
    // Oturum açılmamış, yönlendirme yap
    header("Location: index.php"); // Giriş sayfasının URL'sini buraya yazın
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ürünler</title>
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
		}

		table th, table td {
			padding: 10px;
			border: 1px solid #ccc;
		}

		.genric-btn {
			padding: 10px 20px;
			margin-right: 5px;
			border: none;
			border-radius: 4px;
			color: #fff;
			font-size: 14px;
			text-align: center;
			cursor: pointer;
		}

		.genric-btn.success {
			background-color: green;
		}

		.genric-btn.danger {
			background-color: red;
		}


		/* Modal */
		.modal {
			display: none;
			position: fixed;
			z-index: 9999;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0, 0, 0, 0.4);
		}

		.modal-content {
			background-color: #fefefe;
			margin: 10% auto;
			padding: 20px;
			border: 1px solid #888;
			width: 200px;
		}

		.close {
			color: #aaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.close:hover,
		.close:focus {
			color: black;
			text-decoration: none;
			cursor: pointer;
		}
		.modal-input {
			margin-bottom: 10px;
			padding: 5px;
			width: 100%;
			border: 1px solid #ccc;
			border-radius: 4px;
			width: 200px;
		}

		.modal-select {
			margin-bottom: 10px;
			padding: 5px;
			width: 100%;
			border: 1px solid #ccc;
			border-radius: 4px;
			width: 200px;
		}

		.modal-button {
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			color: #fff;
			font-size: 14px;
			text-align: center;
			cursor: pointer;
			background-color: #007bff;
		}

		.modal-button:hover {
			background-color: #0056b3;
		}
	</style>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
	<?php
	include 'mysql.php';
	// Urunler tablosundaki verileri al
	$sql = "SELECT * FROM urunler";
	$result = mysqli_query($baglan, $sql);
	$urunler = array();

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$urunler[] = $row;
		}
	}
	?>
	<div>
		<h3>Ürünler</h3>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Marka</th>
					<th>Model</th>
					<th>Kategori</th>
					<th>Ürün Adı</th>
					<th>Yıl</th>
					<th>Fiyat</th>
					<th>Resim</th>
					<th>Stok</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($urunler as $index => $urun) : ?>
					<tr>
						<td><?php echo $index + 1; ?></td>
						<td><?php echo $urun['MARKA']; ?></td>
						<td><?php echo $urun['MODEL']; ?></td>
						<td><?php echo $urun['KATEGORI']; ?></td>
						<td><?php echo $urun['URUN_ADI']; ?></td>
						<td><?php echo $urun['YIL']; ?></td>
						<td><?php echo $urun['FIYAT']; ?></td>
						<td><?php echo $urun['STOK']; ?></td>
						<td>
							<button class="genric-btn danger" onclick="sil('<?php echo $urun['MODEL']; ?>')">Sil</button>
						</td>
						<td>
							<button class="genric-btn success" onclick="duzenle('<?php echo $urun['MODEL']; ?>', <?php echo $urun['KAYIT_ID']; ?>); openModal();">Düzenle</button>

						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<!-- Modal -->
	<div id="duzenleModal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<h2>Düzenle</h2>
			<form id="duzenleForm">
				<input type="hidden" id="duzenleIndex" name="index">
				<div>
					<label for="duzenleUrunAdi">Ürün Adı:</label>
					<input type="text" id="duzenleUrunAdi" name="urunAdi" class="modal-input">
				</div>
				<div>
					<label for="duzenleYil">Yıl:</label>
					<input type="text" id="duzenleYil" name="yil" class="modal-input">
				</div>
				<div>
					<label for="duzenleFiyat">Fiyat:</label>
					<input type="text" id="duzenleFiyat" name="fiyat" class="modal-input">
				</div>
				<div>
					<label for="duzenleStok">Stok:</label>
					<input type="text" id="duzenleStok" name="stok" class="modal-input">
				</div>
				<div>
					<button type="button" id="kaydetBtn" onclick="kaydet()" class="modal-button">Güncelle</button>
				</div>
			</form>
		</div>
	</div>




	<script type="text/javascript">
		function sil(modelAdi) {
			if (confirm(modelAdi + " modelini silmek istediğinize emin misiniz?")) {
				$.ajax({
			url: 'urunsil.php', // Silme işlemini gerçekleştirecek olan PHP dosyasının adı ve yolunu buraya yazın
			method: 'POST', // Silme işlemi için HTTP yöntemi POST olarak belirlendi, gerektiğinde değiştirebilirsiniz
			data: { modelAdi: modelAdi }, // Silinecek model adını POST verileri olarak gönderiyoruz
			success: function(response) {
				// Silme işlemi başarılı olduğunda yapılacak işlemler
				alert("Model başarıyla silindi.");
				location.reload(); // Sayfayı yenile
			},
			error: function(xhr, status, error) {
				// Silme işlemi sırasında bir hata oluştuğunda yapılacak işlemler
				alert("Silme işlemi sırasında bir hata oluştu: " + error);
			}
		});
			}
		}


function duzenle(model, index) {
  // AJAX isteği yaparak verileri çek
  $.ajax({
    url: 'vericek.php',
    method: 'POST',
    data: { model: model },
    success: function(response) {
      var veri = JSON.parse(response);

      $('#duzenleModal').css('display', 'block');
      $('#duzenleIndex').val(index); // index değerini direkt olarak kullanın
      $('#duzenleUrunAdi').val(veri.urunAdi);
      $('#duzenleYil').val(veri.yil);
      $('#duzenleFiyat').val(veri.fiyat);
      $('#duzenleStok').val(veri.stok);
    },
    error: function(xhr, status, error) {
      alert("Veri çekme işlemi sırasında bir hata oluştu: " + error);
    }
  });
}






function kaydet() {
  var index = $('#duzenleIndex').val();
  var urunAdi = $('#duzenleUrunAdi').val();
  var yil = $('#duzenleYil').val();
  var fiyat = $('#duzenleFiyat').val();
  var stok = $('#duzenleStok').val();

  $.ajax({
    url: 'guncelle.php',
    method: 'POST',
    data: {
      index: index,
      urunAdi: urunAdi,
      yil: yil,
      fiyat: fiyat,
      stok: stok
    },
    success: function(response) {
      alert("Veriler başarıyla güncellendi.");
      location.reload();
    },
    error: function(xhr, status, error) {
      alert("Güncelleme işlemi sırasında bir hata oluştu: " + error);
    }
  });
}



// Modal penceresini kapat
		$('.close').click(function() {
			$('#duzenleModal').css('display', 'none');
		});
	</script>
</body>
</html>
