<?php

    include ("connect.php");
    session_start();

    if ($_POST["button"]=='slogin'){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = test_input($_POST["usrnm"]);
            $password = test_input($_POST["psw"]);
        }
        $sql = "SELECT UID FROM `users` WHERE `Username`='$username' AND `Password`='$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
        $count = mysqli_num_rows($result);

        if($count == 1) {
            $_SESSION['login_user'] = $username;
            header("location: http://localhost/LMS/StudentHomepage.php");
            exit();
        }else {
            $error = "Your Login Name or Password is invalid";
        }
    }
    elseif ($_POST["button"]=='flogin'){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = test_input($_POST["usrnm"]);
            $password = test_input($_POST["psw"]);
        }
        $sql = "SELECT UID FROM `users` WHERE `Username`='$username' AND `Password`='$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
        $count = mysqli_num_rows($result);

        if($count == 1) {
            $_SESSION['login_user'] = $username;
            header("location: http://localhost/LMS/StudentHomepage.php");
            exit();
        }else {
            $error = "Your Login Name or Password is invalid";
        }
    }
    elseif ($_POST["button"]=='alogin'){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = test_input($_POST["usrnm"]);
            $password = test_input($_POST["psw"]);
        }
        $sql = "SELECT UID FROM `users` WHERE `Username`='$username' AND `Password`='$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
        $count = mysqli_num_rows($result);

        if($count == 1) {
            $_SESSION['login_user'] = $username;
            header("location: http://localhost/LMS/StudentHomepage.php");
            exit();
        }else {
            $error = "Your Login Name or Password is invalid";
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
        }
        
    }
    elseif ($_POST["button"]=='fregister') {

    }
   
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Library</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .header {
            padding: 10px;
            text-align: center; /* center the text */
            background: #050606; /* blue background */
            color: rgb(204, 129, 18); /* white text color */
            border-radius: 25px;
            line-height: 0.4cm;
        }

        .header h1 {
            font-size: 47px;
        }

        .tab {
            width:25%;
            float: right;
            margin-top: -3.5%;
            /* position: fixed;
            top: 80px;
            right: 10px; */
        }

        .tablink {
            background-color: #050606;
            color: rgb(204, 129, 18);
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 15px;
            width: 25%;
            border-radius: 10px;
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
            background-color: #050606f4;
            border-radius: 25px;
            box-shadow: 0 2px 4px 0 rgba(204, 129, 18, 0.3);
            transition: 0.3s;
        }
        .login:hover {
            box-shadow: 0 8px 16px 0 rgba(204, 129, 18, 0.3)
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
            background-color: #050606f4;
            border-radius: 25px;
            box-shadow: 0 2px 4px 0 rgba(204, 129, 18, 0.3);
            transition: 0.3s;
        }
        .register:hover {
            box-shadow: 0 8px 16px 0 rgba(204, 129, 18, 0.3)
        }
        .input-field {
            font-size: 16px;
            width: 100%;
            padding: 12px;
            outline: none;
            border-radius: 8px;
        }
        .input-field:focus {
            border: 2px solid rgb(204, 129, 18);
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
            border-radius: 8px;
        }
        .input-field-r:focus {
            border: 2px solid rgb(204, 129, 18);
        }
        .input-container-r {
            /* display: -ms-flexbox; IE10 */
            /* display: flex; */
            display: inline-block;
            width: 49%;
            margin-bottom: 15px;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            /* background-color: #2d3030; */
            background-image: url("header-background.jpg");
            background-position:top;
            background-repeat: no-repeat;
            background-size: cover;
        }
        * {box-sizing: border-box;}

        .btn {
            background-color: rgb(204, 129, 18);
            color: rgb(0, 0, 0);
            padding: 15px 20px;
            border: none;
            cursor: pointer;
            width: 60%;
            opacity: 0.9;
            border-radius: 30px;
        }

        .btn:hover {
            opacity: 1;
        }
        .txt2 {
            font-family: Arial, Poppins-Regular;
            font-size: 16px;
            line-height: 1;
            color: rgb(204, 129, 18);
            text-decoration: none;
            opacity: 0.9;
        }
        .txt2:hover {
            opacity: 1;
        }
    </style>
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
        <h2 style="color: rgb(204, 129, 18); font-size: 30px;">Student Login</h2>
        <div class="input-container">
            <input class="input-field" type="text" placeholder="Username" name="usrnm" required>
        </div>

        <div class="input-container">
            <input class="input-field" type="password" placeholder="Password" name="psw" required>
        </div>

        <button type="submit" class="btn" style="font-size: 16px; letter-spacing: 0.02cm; font-weight: bold" value="slogin" name='button'>Login</button>
        <br><br>
        <a class="txt2" href="#" onclick="openPage('StudentRegister', 1)">
            Create your Account
        </a>
    </form>
    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
</div>

<div id="FacultyLogin" class="login">
    <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 style="color: rgb(204, 129, 18); font-size: 30px;">Faculty Login</h2>
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
    <div style = "font-size:12px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
</div>

<div id="AdminLogin" class="login">
    <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 style="color: rgb(204, 129, 18); font-size: 30px;">Admin Login</h2>
        <div class="input-container">
            <input class="input-field" type="text" placeholder="Username" name="usrnm">
        </div>

        <div class="input-container">
            <input class="input-field" type="password" placeholder="Password" name="psw">
        </div>

        <button type="submit" class="btn" style="font-size: 16px; letter-spacing: 0.02cm; font-weight: bold" value="alogin" name='button'>Login</button>

    </form>
    <div style = "font-size:12px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
</div>

<div id="StudentRegister" class="register">
    <form class="register-form" method="post" action="javascript:register()" name="register">
        <h2 style="color: rgb(204, 129, 18); font-size: 30px;">Student Registration</h2>
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
            <input class="input-field-r" tstyle="margin-right: 1%" type="password" placeholder="Enter Password" name="psw" id="password" required>
        </div>
        <div class="input-container-r">
            <input class="input-field-r" style="margin-left: 1%" type="password" placeholder="Confirm Password" name="cpsw" required>
        </div>
        <button type="submit" class="btn" style="font-size: 16px; letter-spacing: 0.02cm; font-weight: bold" value="sregister" name='button'>Register</button>
    </form>
    <h1 id="result"> </h1> 
</div>

<div id="FacultyRegister" class="register">
    <form class="register-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return Validate()" name="register">
        <h2 style="color: rgb(204, 129, 18); font-size: 30px;">Faculty Registration</h2>
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
<script type="text/javascript">
    var register = function (){
        var registration_form = document.forms['sregister'];
        var fname = registration_form.fname.value;
        var lname = registration_form.lname.value;
        var email = registration_form.email.value; 
        var phone = registration_form.phone.value;
        var username = registration_form.usrnm.value; 
        var password = registration_form.psw.value; 
        var confpassword = registration_form.cpsw.value; 

        var userregex = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$"); 
        var nameregex = new RegExp("^[A-Za-z]+");
        var emailregex = new RegExp("[a-zA-Z0-9]{2,}@[a-zA-Z0-9]{2,}\.[a-zA-Z]{2,}"); 
        var passregex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
        var phoneregex = new RegExp("^(\+\d{1,3}[- ]?)?\d{10}$");

        if(!userregex.test(username)) alert('Username should only contain A-Z, a-z, 0-9, -, _.'); 
        else if (!nameregex.test(fname)) alert('Name should only contain A-Z, a-z');
        else if (!nameregex.test(lname)) alert('Name should only contain A-Z, a-z');
        else if (!phoneregex.test(phone)) alert('Invalid phone number.');
        else if (! passregex.test(password)) alert('Invalid password.'); 
        else if(confpassword != password) alert('Passwords do not match.'); 
        else if(!emailregex.test(email)) alert('Invalid email.');
        else{ 
            var result = document.getElementById('result'); 
            txt = "Registration accepted\n"; 
            result.innerHTML = txt; 
        }  
    }
</script>
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
