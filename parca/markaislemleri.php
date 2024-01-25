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
	<title>Markalar</title>
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
	</style>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
	<?php
	include 'mysql.php';

	// MARKA tablosundaki tüm markaları al
	$sql = "SELECT * FROM MARKA";
	$result = mysqli_query($baglan, $sql);
	$markalar = mysqli_fetch_all($result, MYSQLI_ASSOC);
	?>

	<div>
		<h3>Markalar</h3>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Marka Adı</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($markalar as $index => $marka) : ?>
					<tr>
						<td><?php echo $index + 1; ?></td>
						<td id="markaAdi-<?php echo $index; ?>" onclick="duzenle('<?php echo $marka['MARKA_ADI']; ?>', <?php echo $index; ?>)"><?php echo $marka['MARKA_ADI']; ?></td>
						<td>
							<button class="genric-btn danger" onclick="sil('<?php echo $marka['MARKA_ADI']; ?>')">Sil</button>
						</td>
						<td>
							<button class="genric-btn success" onclick="guncelle('<?php echo $marka['MARKA_ADI']; ?>')">Güncelle</button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

<script>
    function sil(markaAdi) {
        if (confirm("Markayı silmek istediğinizden emin misiniz?")) {
            $.ajax({
                url: 'markasil.php',
                method: 'POST',
                data: {
                    markaAdi: markaAdi
                },
                success: function(response) {
                    location.reload();
                },
                error: function() {
                    alert("Silme işlemi sırasında bir hata oluştu.");
                }
            });
        }
    }

    function guncelle(eskiMarkaAdi, yeniMarkaAdi) {
        $.ajax({
            url: 'markaguncelle.php',
            method: 'POST',
            data: {
                eskiMarkaAdi: eskiMarkaAdi,
                markaAdi: yeniMarkaAdi
            },
            success: function(response) {
                location.reload();
            },
            error: function() {
                alert("Güncelleme işlemi sırasında bir hata oluştu.");
            }
        });
    }

    function duzenle(markaAdi, index) {
        var markaAdiElement = document.getElementById("markaAdi-" + index);
        var inputElement = document.createElement("input");
        inputElement.type = "text";
        inputElement.value = markaAdi;
        inputElement.addEventListener("blur", function() {
            guncelle(markaAdi, inputElement.value);
        });
        markaAdiElement.innerHTML = "";
        markaAdiElement.appendChild(inputElement);
        inputElement.focus();
    }
</script>

</body>
</html>
