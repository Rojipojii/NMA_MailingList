<!-- <?php
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];
    $organization = $_POST['organization'];

    //Database connection

$conn = new mysqli('localhost','root','','register');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into register(phone, name, email, designation, organization) values(?,?,?,?,?)");
$stmt ->bind_param("issss",$phone, $name, $email, $designation, $organization);
$stmt-> exeute();
echo"Success";
$stmt-> close();
$conn-> close();
}
?> -->

<?php
$phone = $_POST['phone'];
$name = $_POST['name'];
$email = $_POST['email'];
$designation = $_POST['designation'];
$organization = $_POST['organization'];

try {
    // Database connection using PDO for PostgreSQL
    $conn = new PDO("pgsql:host=localhost;dbname=register", "rojina", "#Checkshirt1");
    
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO register(phone, name, email, designation, organization) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$phone, $name, $email, $designation, $organization]);
    
    echo "Success";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>
