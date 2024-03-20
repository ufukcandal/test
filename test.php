<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kod'])) {
    $host = "localhost"; 
    $username = "root";
    $password = "";
    $database = "pvp";
    
    // Veritabanına bağlan
    $connection = mysqli_connect($host, $username, $password, $database); 
    
    // Kullanıcı girdisini al
    $input_degeri = mysqli_real_escape_string($connection, $_POST['input_degeri']);
    
    // SQL sorgusunu oluştur
    $sql = $input_degeri;
    
    // SQL sorgusunu çalıştır
    $result = mysqli_query($connection, $sql);
    
    // Sonucu ekrana yazdır
    if ($result) {
        // Sonuç varsa, sonuçları ekrana yazdır
        echo "<table border='1'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $column) {
                echo "<td>{$column}</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Sorgu çalıştırılırken bir hata oluştu: " . mysqli_error($connection);
    }
    
    // Veritabanı bağlantısını kapat
    mysqli_close($connection);
}
?>

<form method="POST">
    <input type="text" name="input_degeri">
    <button type="submit">Gönder</button>
</form>
