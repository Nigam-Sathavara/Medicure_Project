<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Registration Form</title>
</head>
<body>
   <div  class="container">
    <h1 class="form-title">Registration</h1>
    <form action="" method="POST">
            <div class="main-user-info">
            <div class="user-input-box">
                <i class="fa-solid fa-user"></i>
                <label for="firstName"><b>First Name:</b></label>
                <input type="text" id="firstName"  placeholder="Enter First Name" name="fname" required>
            </div>

            <div class="user-input-box">
                <i class="fa-solid fa-user"></i>
                <label for="lastName"><b>Last Name:</b></label>
                <input type="text" id="lastName"  placeholder="Enter Last Name" name="lname" required>
            </div>

            <div class="user-input-box">
                <i class="fa-solid fa-envelope"></i>
                <label for="email"><b>Email:</b></label>
                <input type="email" id="email"  placeholder="Enter your Email" name="email" required>
            </div>

            <div class="user-input-box">
                <i class="fa-solid fa-phone"></i>
                <label for="phone"><b>Phone No:</b></label>
                <input type="text" id="phone"  placeholder="Enter Phone No" name="phone" required>
            </div>

            <div class="user-input-box">
                <i class="fa-solid fa-lock"></i>
                <label for="password"><b>Password:</b></label>
                <input type="password" id="password"  placeholder="Enter Password" name="password" required>
            </div>

            <div class="user-input-box">
                <i class="fa-solid fa-lock"></i>
                <label for="confirmPassword"><b>Confirm password:</b></label>
                <input type="password" id="confirmPassword"  placeholder="Enter Confirm password" name="confirmPassword" required>
            </div>
        </div>

        <div class="gender-details-box">
            <span class="gender-title"><b>Gender:</b></span>
            <div class="gender-category">
                <input type="radio" name="gender" value="m" id="male">
                <label for="male">Male</label>
                <input type="radio" name="gender" value="f" id="female">
                <label for="female">Female</label>
                <input type="radio" name="gender" value="o" id="other">
                <label for="other">Other</label>
            </div>
        </div>

        <div class="form-submit-btn">
            <input type="submit" value="Register" name="register">
        </div>

        <div class="login-register">
            <p>Don't have an account? <a href="/login/login.php" style="color:black;  font-size: 20px;  font-weight:800; margin:65% 0px;">Login</a></p> 
        </div>
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

if(isset($_POST['register'])){
    $fname  = $_POST['fname'];
    $lname  = $_POST['lname'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $password  = $_POST['password'];
    $confirmPassword  = $_POST['confirmPassword'];
    $gender = $_POST['gender'];

    if($password == $confirmPassword){
        $stmt = $conn->prepare("INSERT INTO registration (fname, lname, email, number, password, conpassword, gender) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $fname, $lname, $email, $phone, $password, $confirmPassword, $gender);

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