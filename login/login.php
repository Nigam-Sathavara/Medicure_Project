<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <div class="Container">
        <h2>Login</h2><br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="input-email">
                <label for="email">Email</label><br>
                <input type="Email" placeholder="abc123@gmail.com" id="email" name="email" required><br><br>
            </div>
            <div class="input-pass">
               <label for="Password"> Password</label><br>
               <input type="password" placeholder="password" id="password" name="password" required><br><br>
            </div>
            
            <button type="submit" name="login">Login</button>

        </form>
    </div>
    <?php
// Establishing a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['login'])){
    $email  = $_POST['email'];
    $password = $_POST['password'];
    
    if($password == $password){
        $stmt = $conn->prepare("INSERT INTO login ( email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);

        if ($stmt->execute()) {
            echo "Data Inserted into Database";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Passwords do not match.";
    }
}

// Close the database connection
$conn->close();
?>
</body>
</html>

