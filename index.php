

<?php
 $username = $_POST['username'];
 $password = $_POST['password'];

try {
    // Database connection using PDO for PostgreSQL
    $conn = new PDO("pgsql:host=localhost;dbname=register", "rojina", "#Checkshirt1");
    
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO login(username, password,) VALUES (?,?)");
    $stmt->execute([$username, $password]);
    
    echo "Success";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>
