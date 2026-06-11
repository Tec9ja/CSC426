<?php
// Author: Lawrence Emmanuel
// CSC426 Web Assignment

$message = "";
$messageType = "";

// Checks if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Input 
    if (empty($username) || empty($password)) {
        $message = "Please fill in all fields.";
        $messageType = "error";
    } else {
        //  authentication
        if ($username === "Tec9ja" && $password === "Bosstech@1124u1") {
            $message = "Login successful! Welcome to the dashboard.";
            $messageType = "success";
        } else {
            $message = "Invalid username or password. Please try again.";
            $messageType = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSC426 Login</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background-color: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { text-align: center; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #666; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
        .btn-group { display: flex; justify-content: space-between; margin-top: 20px; }
        button { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; color: white; font-weight: bold; width: 48%; }
        .btn-submit { background-color: #002135; } /* Using a preferred dark navy */
        .btn-reset { background-color: #dc3545; }
        .message { padding: 10px; margin-bottom: 15px; border-radius: 4px; text-align: center; }
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>System Login</h2>
    
    <?php if (!empty($message)): ?>
        <div class="message <?php echo $messageType; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter 'Tec9ja'">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter 'Bosstech@1124u1'">
        </div>
        <div class="btn-group">
            <button type="reset" class="btn-reset">Cancel</button>
            <button type="submit" class="btn-submit">Login</button>
        </div>
    </form>
</div>

</body>
</html>