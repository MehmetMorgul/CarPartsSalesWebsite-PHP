<?php 
$servername="localhost"; //MySQL sunucu adımızı tanımlıyoruz.
$username="root"; //MySQL sunucu kullanıcı adımızı tanımlıyoruz.
$password=""; //MySQL sunucu şifremizi tanımlıyoruz.
$dbname="yedekparca";//MySQL database adımızı tanımlıyoruz.
$baglan= new mysqli($servername,$username,$password,$dbname); //Yeni bir MySQL nesnesi tanımlayıp bağlantı bilgilerini ekleyip bağlan isimli bağlantı nesnesi oluşturuyoruz.
mysqli_set_charset($baglan, "utf8");//UTF8 karakter kodlaması ile mysql veri tabanına bağlanıyoruz.
?>