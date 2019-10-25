<?php
include('DB_Connect/session.php');

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_POST["submit"])){
        $q1 = test_input($_POST["q1"]);
        $q2 = test_input($_POST["q2"]);
        $q3 = test_input($_POST["q3"]);
        $q4 = test_input($_POST["q4"]);
        $username = $_SESSION["login_user"];
        $sql = "SELECT UID FROM member WHERE `username` = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $uid = $row["UID"];
        $sql = "INSERT INTO  feedback (`uid`, `q1`, `q2`, `q3`, `q4`) VALUES ('$uid','$q1','$q2','$q3','$q4')";
        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript">';
            echo 'alert("Feedback submitted")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo '</script>';
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

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url("images/header-background.jpg");
            background-position:top;
            background-repeat: repeat;
            background-size: cover;
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
            /*display: -ms-flexbox; !* IE10 *!*/
            /*display: flex;*/
            width: 100%;
            margin-bottom: 15px;
        }
        .register {
            text-align: center;
            padding-right: 5%;
            padding-left: 5%;
            padding-bottom: 3%;
            padding-top: 2%;
            margin-left: 20%;
            margin-right: 20%;
            margin-top: 5%;
            margin-bottom: 5%;
            background-color: #101010f4;
            box-shadow: 0 2px 4px 0 rgba(216, 63, 7, 0.3);
            transition: 0.3s;
        }

        .register:hover {
            box-shadow: 0 8px 16px 0 rgba(216, 63, 7, 0.3)
        }

    </style>
</head>
<body>
<div class="header">
    <button class="openbtn" onclick="history.back()" style="float: left; background-color: #101010; color: #f1f1f1; border: none; font-size: 40px">&#x2190;</button>
    <h1>SFIT Online Library</h1>
    <p>Your link to the past & gateway to the future.</p>
</div>
<div class="register">
    <form class="register-form" method="post" action="" name="register">
        <h2 style="color: #d83f07; font-size: 30px;">Feedback</h2>
        <div class="input-container">
            <p style="font-size: 25px; color: #f1f1f1">What was you first impression when you entered the website?</p><br>
            <input class="input-field" style="margin-right: 1%" type="text" name="q1" required>
        </div>
        <div class="input-container">
            <p style="font-size: 25px; color: #f1f1f1">How did you first hear about us?</p>
            <input class="input-field" style="margin-left: 1%" type="text" name="q2" required>
        </div>
        <div class="input-container">
            <p style="font-size: 25px; color: #f1f1f1">Is there anything missing on this website?</p>
            <input class="input-field" style="margin-left: 1%" type="text" name="q3" required>
        </div>
        <div class="input-container">
            <p style="font-size: 25px; color: #f1f1f1">Would you recommend this website?</p>
            <input class="input-field" style="margin-left: 1%" type="text" name="q4" required>
        </div>
        <button type="submit" class="btn" style="font-size: 20px; letter-spacing: 0.02cm; font-weight: bold" value="fregister" name='submit'>Submit</button>
    </form>
</div>
<div class="footer" style="padding: 15px;
    text-align: left;
    background: #101010;
    color: #d83f07;
    position:relative;
    bottom:0;
    width:98%;
    height: 20%;font-size: 25px">
    <a style="padding: 10px; color: #d83f07; text-decoration: none" href="about.php" >About The creators</a>
    <br>
    <br>
    <br>

</div>
</body>
</html>


