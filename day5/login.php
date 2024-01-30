<?php

$nameErr = $passwordErr = "";
$name = $password = "";
$error = false;
$errorText = "";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub"])) {
    if(empty($_POST["name"])) {
        $nameErr = "Name is required!";
        $error = true; 
    }
    else {
        $name = $_POST["name"];
    }
    if(empty($_POST["password"])) {
        $passwordErr = "Password is required!";
        $error = true; 
    }
    else {
        $password = $_POST["password"];
    }
     
    if(! $error) {
        include 'db.php';
        $sql = "SELECT username, pass_hash FROM users WHERE username = \"" . $name . "\";";

    
        $ret = mysqli_query($conn, $sql);

        if(! $ret) {
            print("Connection failed: " . mysqli_connect_error());
        }
        if(mysqli_num_rows($ret) > 0) {
            $record = mysqli_fetch_assoc($ret);
            
            if( password_verify($_POST["password"], trim($record["pass_hash"])) ) {

                session_start();

                $_SESSION["username"] = $record["username"];
                header("Location: index.php");
                mysqli_close($conn);
            }
            else {
                $errorText = " password is not correct!";
                mysqli_close($conn);
            }
        }
        else {
            $errorText = "No such user please sign up !";
            mysqli_close($conn);
        }
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        #formContainer {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h2 {
            color: #007bff;
        }

    </style>
</head>

<body>
    <h2 class="text-center my-4">Log In</h2>
    <div id="formContainer" class="container py-5">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                <span style="color:red;" class="highlight">*<?php echo $nameErr ?></span>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="Password" placeholder="Password">
                <span style="color:red;">*<?php echo $passwordErr ?></span>
            </div>

            <div>
                <button type="submit" class="btn btn-primary" name="sub">Log In</button>
                <a class="mx-5" href="./Signup.php">Sign Up here</a>
            </div>
            <p style="color:red;"><?php echo $errorText ?></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofP+WiNGaFqDA8xsjE+IbbVNH3A6b6L" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
