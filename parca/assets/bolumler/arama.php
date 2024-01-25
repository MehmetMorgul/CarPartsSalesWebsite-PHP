<br><br><br><br><br><br>
<div class="search-area" id="ara">
    <div class="search-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Lütfen aramak istediğiniz parça detaylarını seçiniz...</h3>
                    <form action="aramasonuc.php" method="POST" class="d-md-flex justify-content-between">
                        <?php
                        include 'mysql.php';
                        $sorgu = "SELECT * FROM marka";
                        $sonuclar = mysqli_query($baglan, $sorgu);
                        if (mysqli_num_rows($sonuclar) > 0) {
                            echo "<select id='marka' name='marka' required>";
                            echo "<option value=''>Marka Seç</option>";
                            while ($row = mysqli_fetch_assoc($sonuclar)) {
                                echo "<option value='".$row["MARKA_ADI"]."'>".$row["MARKA_ADI"]."</option>";
                            }
                            echo "</select>";
                        }
                        ?>
                        <select id="model" name="model" required>
                            <option value="">Model Seç</option>
                        </select>
                        <input type="text" name="yil" placeholder="Yıl" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Yıl'" required>
                        <button type="submit" class="template-btn">parça bul</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Area End -->
<br><br><br><br><br><br><br>

<!-- AJAX kullanarak seçilen markaya göre modelleri getirme -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#marka').change(function () {
            var marka = $(this).val();
            
            $.ajax({
                url: 'get_modeller.php',
                type: 'POST',
                data: {marka: marka},
                success: function (response) {
                    var options = JSON.parse(response); // JSON verisini JavaScript nesnesine dönüştür
                    var modelSelect = $('#model'); // Model select elementini seç

                    modelSelect.empty(); // Önceki seçenekleri temizle

                    if (options.length > 0) {
                        $.each(options, function (index, option) {
                            modelSelect.append('<option value="' + option.MODEL_ADI + '">' + option.MODEL_ADI + '</option>'); // Seçenekleri ekle
                        });
                        modelSelect.find('option[value=""]').remove(); // "Model Seç" yazısını sil
                    } else {
                        modelSelect.append('<option value="">Model Bulunamadı</option>'); // Model bulunamadı mesajını ekle
                    }

                    modelSelect.niceSelect('update'); // nice-select eklentisini güncelle
                }
            });
        });
    });
</script>
