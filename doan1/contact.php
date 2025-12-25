<?php
// 1. Kết nối cơ sở dữ liệu
$host = 'localhost';
$dbname = 'snowell_electric';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// 2. Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // 3. Chèn vào bảng contact
    $sql = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$name, $email, $message])) {
        echo " Tin nhắn của bạn đã được gửi. Cảm ơn!";
    } else {
        echo " Lỗi: " . implode(", ", $stmt->errorInfo());
    }
}
?>
<html>
    <form action="contact.php" method="POST">
        <label>Họ tên:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Message:</label><br>
        <textarea name="message" rows="5" required></textarea><br><br>

        <button type="submit">Send message</button>
    </form>
</html>
