<?php

    include("DB_Connect/connect.php");
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if ($_POST["button"]=='slogin'){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = test_input($_POST["usrnm"]);
                $password = test_input($_POST["psw"]);
            }
            $sql = "SELECT UID, acc_type FROM `member` WHERE `username`= '$username' AND `password`='$password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];
            $count = mysqli_num_rows($result);
            $type = $row['acc_type'];

            if($count and $type == 'student') {
                $_SESSION['login_user'] = $username;
                $_SESSION['login_type'] = $type;
                header("location: user/user-home.php");
                exit();
            }else {
                echo '<script language="javascript">';
                echo 'alert("Your Login Name or Password is invalid")';
                echo '</script>';
            }
        }
        elseif ($_POST["button"]=='flogin'){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = test_input($_POST["usrnm"]);
                $password = test_input($_POST["psw"]);
            }
            $sql = "SELECT UID, acc_type FROM `member` WHERE `username`= '$username' AND `password`='$password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];
            $count = mysqli_num_rows($result);
            $type = $row['acc_type'];

            if($count and $type == 'faculty') {
                $_SESSION['login_user'] = $username;
                $_SESSION['login_type'] = $type;
                header("location: user/user-home.php");
                exit();
            }else {
                echo '<script language="javascript">';
                echo 'alert("Your Login Name or Password is invalid")';
                echo '</script>';        }
        }
        elseif ($_POST["button"]=='alogin'){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = test_input($_POST["usrnm"]);
                $password = test_input($_POST["psw"]);
            }
            $sql = "SELECT UID, acc_type FROM `member` WHERE `username`= '$username' AND `password`='$password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];
            $count = mysqli_num_rows($result);
            $type = $row['acc_type'];

            if($count and $type == 'admin') {
                $_SESSION['login_user'] = $username;
                $_SESSION['login_type'] = $type;
                header("location: admin/admin-home.php");
                exit();
            }else {
                echo '<script language="javascript">';
                echo 'alert("Your Login Name or Password is invalid")';
                echo '</script>';
            }
        }
        elseif ($_POST["button"]=='sregister'){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $fname = test_input($_POST["fname"]);
                $lname = test_input($_POST["lname"]);
                $email = test_input($_POST["email"]);
                $phone = test_input($_POST["phone"]);
                $username = test_input($_POST["usrnm"]);
                $password = test_input($_POST["psw"]);
                $confirmpass = test_input($_POST["cpsw"]);
                $type = "student";
            }
            $sql = "INSERT INTO `member` (`UID`, `f_name`, `l_name`, `email`, `phone`, `username`, `password`, `acc_type`) VALUES (NULL, '$fname', '$lname', '$email', '$phone', '$username', '$password', '$type')";
            if ($conn->query($sql) === TRUE) {
                echo '<script language="javascript">';
                echo 'alert("Registration Successful. You will now be redirected to the Login page.")';
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo "Error: " . $sql . "<br>" . $conn->error;
                echo '</script>';
            }
        }
        elseif ($_POST["button"]=='fregister') {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $fname = test_input($_POST["fname"]);
                $lname = test_input($_POST["lname"]);
                $email = test_input($_POST["email"]);
                $phone = test_input($_POST["phone"]);
                $username = test_input($_POST["usrnm"]);
                $password = test_input($_POST["psw"]);
                $confirmpass = test_input($_POST["cpsw"]);
                $type = "faculty";
            }
            $sql = "INSERT INTO `member` (`UID`, `f_name`, `l_name`, `email`, `phone`, `username`, `password`, `acc_type`) VALUES (NULL, '$fname', '$lname', '$email', '$phone', '$username', '$password', '$type')";
            if ($conn->query($sql) === TRUE) {
                echo '<script language="javascript">';
                echo 'alert("Registration Successful. You will now be redirected to the Login page.")';
                echo '</script>';
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
                echo '<script language="javascript">';
                echo 'alert("'.$error.'")';
                echo '</script>';
            }
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Library</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .header {
            padding: 10px;
            text-align: center;
            background: #101010;
            color: #d83f07;
            line-height: 0.4cm;
        }

        .header h1 {
            font-size: 47px;
        }

        .tab {
            width:25%;
            float: right;
            margin-top: -3.5%;
        }

        .tablink {
            background-color: #101010;
            color: #d83f07;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 15px;
            width: 25%;
            margin-left: 3px;
            text-align: center;
        }

        .tablink:hover {
            background-color: #252828;
        }

        .tabcontent {
            color: white;
            display: none;
            padding: 100px 20px;
            height: 100%;
        }

        .login {
            text-align: center;
            padding-right: 6%;
            padding-left: 6%;
            padding-bottom: 3%;
            padding-top: 2%;
            margin-left: 33%;
            margin-right: 33%;
            margin-top: 5%;
            background-color: #101010f4;
            box-shadow: 0 2px 4px 0 rgba(216, 63, 7, 0.3);
            transition: 0.3s;
        }

        .login:hover {
            box-shadow: 0 8px 16px 0 rgba(216, 63, 7, 0.3)
        }

        .register {
            text-align: center;
            padding-right: 5%;
            padding-left: 5%;
            padding-bottom: 3%;
            padding-top: 2%;
            margin-left: 33%;
            margin-right: 33%;
            margin-top: 5%;
            margin-bottom: 5%;
            background-color: #101010f4;
            box-shadow: 0 2px 4px 0 rgba(216, 63, 7, 0.3);
            transition: 0.3s;
        }

        .register:hover {
            box-shadow: 0 8px 16px 0 rgba(216, 63, 7, 0.3)
        }

        .input-field {
            font-size: 16px;
            width: 100%;
            padding: 12px;
            outline: none;
        }

        .input-field:focus {
            border: 2px solid #d83f07;
        }

        .input-container {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            width: 100%;
            margin-bottom: 15px;
        }

        .input-field-r {
            font-size: 16px;
            width: 100%;
            padding: 12px;
            outline: none;
        }

        .input-field-r:focus {
            border: 2px solid #d83f07;
        }

        .input-container-r {
            display: inline-block;
            width: 49%;
            margin-bottom: 15px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url("images/header-background.jpg");
            background-position:top;
            background-repeat: no-repeat;
            background-size: cover;
        }

        * {box-sizing: border-box;}

        .btn {
            background-color: #d83f07;
            color: rgb(0, 0, 0);
            padding: 13px 10px;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
        }

        .btn:hover {
            opacity: 1;
        }

        .txt2 {
            font-family: Arial, Poppins-Regular;
            font-size: 16px;
            line-height: 1;
            color: #d83f07;
            text-decoration: none;
            opacity: 0.9;
        }

        .txt2:hover {
            opacity: 1;
        }
    </style>
    <script type="text/javascript">
        var validate;
        validate = function () {
            var registration_form = document.forms['registration_form'];
            var fname = registration_form.fname.value;
            var lname = registration_form.lname.value;
            var email = registration_form.email.value;
            var phone = parseInt(registration_form.phone.value);
            var username = registration_form.usrnm.value;
            var password = registration_form.psw.value;
            var confpassword = registration_form.cpsw.value;

            var userregex = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
            var nameregex = new RegExp("^[A-Za-z]+");
            var emailregex = new RegExp("[a-zA-Z0-9]{2,}@[a-zA-Z0-9]{2,}\.[a-zA-Z]{2,}");
            var passregex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
            var phoneregex = new RegExp("^[0-9]{10}$");

            if (!userregex.test(username)) {
                alert('Username should only contain A-Z, a-z, 0-9, -, _.');
                return false;
            } else if (!nameregex.test(fname)) {
                alert('Name should only contain A-Z, a-z');
                return false;
            } else if (!nameregex.test(lname)) {
                alert('Name should only contain A-Z, a-z');
                return false;
            }
            else if (!phoneregex.test(phone)) {
            alert('Invalid phone number.');
            return false;
            }
            else if (!passregex.test(password)) {
                alert('Invalid password.');
                return false;
            }
            else if (confpassword != password) {
                alert('Passwords do not match.');
                return false;
            }
            else if (!emailregex.test(email)) {
                alert('Invalid email.');
                return false;
            }
            else {
                return true;
            }
        };
    </script>
</head>
<body>
<div class="header">
    <h1>SFIT Online Library</h1>
    <p>Your link to the past & gateway to the future.</p>
    <div class="tab">
        <button class="tablink" onclick="openPage('StudentLogin', this)" id="defaultOpen">Student</button>
        <button class="tablink" onclick="openPage('FacultyLogin', this)" id="faculty1">Faculty</button>
        <button class="tablink" onclick="openPage('AdminLogin', this)">Admin</button>
    </div>
</div>

<div id="StudentLogin" class="login">
    <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 style="color: #d83f07; font-size: 30px;">Student Login</h2>
        <div class="input-container">
            <input class="input-field" type="text" placeholder="Username" name="usrnm" required>
        </div>

        <div class="input-container">
            <input class="input-field" type="password" placeholder="Password" name="psw" required>
        </div>

        <button type="submit" class="btn" style="font-size: 16px; letter-spacing: 0.02cm; font-weight: bold" value="slogin" name='button' id="slogin">Login</button>
        <br><br>
        <a class="txt2" id="sregister" href="#" onclick="openPage('StudentRegister', 1)">
            Create your Account
        </a>
    </form>
</div>

<div id="FacultyLogin" class="login">
    <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 style="color: #d83f07; font-size: 30px;">Faculty Login</h2>
        <div class="input-container">
            <input class="input-field" type="text" placeholder="Username" name="usrnm">
        </div>

        <div class="input-container">
            <input class="input-field" type="password" placeholder="Password" name="psw">
        </div>

        <button type="submit" class="btn" style="font-size: 16px; letter-spacing: 0.02cm; font-weight: bold" value="flogin" name='button'>Login</button>
        <br><br>
        <a class="txt2" href="#" onclick="openPage('FacultyRegister', 2)">
            Create your Account
        </a>
    </form>
</div>

<div id="AdminLogin" class="login">
    <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 style="color: #d83f07; font-size: 30px;">Admin Login</h2>
            <div class="input-container">
                <input class="input-field" type="text" placeholder="Username" name="usrnm">
            </div>

            <div class="input-container">
                <input class="input-field" type="password" placeholder="Password" name="psw">
            </div>

            <button type="submit" class="btn" style="font-size: 16px; letter-spacing: 0.02cm; font-weight: bold" value="alogin" name='button'>Login</button>
    </form>
</div>

<div id="StudentRegister" class="register">
    <form class="register-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="registration_form" id="form">
        <h2 style="color: #d83f07; font-size: 30px;">Student Registration</h2>
        <div class="input-container-r">
            <input class="input-field-r" style="margin-right: 1%" type="text" placeholder="First Name" name="fname" id="first_name" required>
        </div>
        <div class="input-container-r">
            <input class="input-field-r" style="margin-left: 1%" type="text" placeholder="Last Name" name="lname" id="last_name" required>
        </div>
        <div class="input-container">
            <input class="input-field" type="text" placeholder="Email" name="email" id="email" required>
        </div>
        <div class="input-container">
            <input class="input-field" type="text" placeholder="Phone Number" name="phone" id="phone" required>
        </div>
        <div class="input-container">
            <input class="input-field" type="text" placeholder="Select a Username" name="usrnm" id="username" required>
        </div>
        <div class="input-container-r">
            <input class="input-field-r" style="margin-right: 1%" type="password" placeholder="Enter Password" name="psw" id="password" required>
        </div>
        <div class="input-container-r">
            <input class="input-field-r" style="margin-left: 1%" type="password" placeholder="Confirm Password" name="cpsw" required>
        </div>
        <button type="submit" onclick="return validate()" class="btn" style="font-size: 16px; letter-spacing: 0.02cm; font-weight: bold" value="sregister" name='button'>Register</button>
    </form>
    <h1 id="result"> </h1> 
</div>

<div id="FacultyRegister" class="register">
    <form class="register-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="register">
        <h2 style="color: #d83f07; font-size: 30px;">Faculty Registration</h2>
        <div class="input-container-r">
            <input class="input-field-r" style="margin-right: 1%" type="text" placeholder="First Name" name="fname" required>
        </div>
        <div class="input-container-r">
            <input class="input-field-r" style="margin-left: 1%" type="text" placeholder="Last Name" name="lname" required>
        </div>
        <div class="input-container">
            <input class="input-field" type="text" placeholder="Email" name="email" required>
        </div>
        <div class="input-container">
            <input class="input-field" type="text" placeholder="Phone Number" name="phone" required>
        </div>
        <div class="input-container">
            <input class="input-field" type="text" placeholder="Select a Username" name="usrnm" required>
        </div>
        <div class="input-container-r">
            <input class="input-field-r" style="margin-right: 1%" type="password" placeholder="Enter Password" name="psw" required>
        </div>
        <div class="input-container-r">
            <input class="input-field-r" style="margin-left: 1%" type="password" placeholder="Confirm Password" name="cpsw" required>
        </div>
        <button type="submit" class="btn" style="font-size: 16px; letter-spacing: 0.02cm; font-weight: bold" value="fregister" name='button'>Register</button>
    </form>
</div>
</body>
<script>
    function openPage(pageName, elmnt) {
        // Hide all elements with class="login" by default */
        var i, login, register, tablinks, color="#252828";
        login = document.getElementsByClassName("login");
        for (i = 0; i < login.length; i++) {
            login[i].style.display = "none";
        }
        register = document.getElementsByClassName("register");
        for (i = 0; i < register.length; i++) {
            register[i].style.display = "none";
        }
        // Remove the background color of all tablinks/buttons
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        // Show the specific tab content
        document.getElementById(pageName).style.display = "block";
        // Add the specific color to the button used to open the tab content
        if (elmnt==1){
            document.getElementById("defaultOpen").style.backgroundColor = color;
        }
        else if (elmnt==2){
            document.getElementById("faculty1").style.backgroundColor = color;
        }
        else{
            elmnt.style.backgroundColor = color;
        }
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
</html>
