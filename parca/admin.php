<?php
session_start();

// Veritabanı bağlantısı için gerekli bilgileri buraya girin
include 'mysql.php';

// Bağlantıyı kontrol et
if ($baglan->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Form gönderildiğinde kullanıcı adı ve şifreyi kontrol et
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kullanıcı adı ve şifreyi veritabanında kontrol et
    $sql = "SELECT * FROM yonetim WHERE KULLANICI_ADI = '$username' AND SIFRE = '$password'";
    $result = $baglan->query($sql);

    if ($result->num_rows == 1) {
        // Giriş başarılı, oturum bilgilerini sakla
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['KULLANICI_ADI'];
        $_SESSION['oturum'] = true;

        // Yönlendirme yapabilirsiniz
        header("Location: anasayfa.php");
        exit();
    } else {
        $error_message = "Hatalı kullanıcı adı veya şifre";
    }
}

$baglan->close();
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Girişi</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="password"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        button[type="submit"] {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }

        .error-message {
            color: #ff0000;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Kullanıcı Girişi</h2>
        <form id="login-form" method="POST">
            <input type="text" id="username" name="username" placeholder="Kullanıcı Adı" required>
            <input type="password" id="password" name="password" placeholder="Şifre" required>
            <button type="submit">Giriş Yap</button>
            <div id="error-message" class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
        </form>
    </div>

    <script>
        // JavaScript kodları buraya ekleyin
    </script>
</body>

</html>
