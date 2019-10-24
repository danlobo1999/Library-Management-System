<?php

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

        .container {
            position: absolute;
            float: left;
            width: 30%;
            margin: 1%;
        }

        .image {
            display: block;
            width: 100%;
            height: auto;
        }

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .5s ease;
            background-color: #080a12;
        }

        .container:hover .overlay {
            opacity: 0.85;
        }

        .text {
            color: #f1f1f1;
            font-size: 20px;
            padding: 2%;
            text-align: center;
        }
        .card{
            background-color: rgba(16, 16, 16, 0.95);
            font-size: 25px;
            color: #f1f1f1;
            margin: 2%;
            padding: 1%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SFIT Online Library</h1>
        <p>Your link to the past & gateway to the future.</p>
    </div>
    <div class="card" id="about">
        <p style="text-align: center; font-size: 40px">About Us</p>
        <p style="letter-spacing: 0.7px; padding-right: 2%; padding-left: 2%; color: #dec391">We are the team from SFIT TE CMPN A, who has created the SFIT Online Library, the portal that helps make borrowing and managing books easier.</p>
        <p style="letter-spacing: 0.7px; padding-right: 2%; padding-left: 2%; color: #dec391">Our goal is to encourage more students to make use of the library and the vast amount of knowledge it provides, by making the website very user-friendly.</p>
        <p style="text-align: center; font-size: 40px">Meet the Team:</p>
    </div>
    <div  id="us">
        <div class="container" id="sahil" style="margin-left: 2%">
            <img src="images/sahil.jpeg" alt="Avatar" class="image">
            <div class="overlay">
                <div class="text" style="font-size: 30px; margin-top: 35%">SAHIL KOTIAN</div><br>
                <div class="text">TE CMPN A</div>
                <div class="text">BATCH 4</div>
                <div class="text">ROLL NO. 62</div>
            </div>
        </div>
        <div class="container" id="danny" style="margin-left: 34%">
            <img src="images/danny.jpg" alt="Avatar" class="image">
            <div class="overlay">
                <div class="text" style="font-size: 30px; margin-top: 35%">DANIEL LOBO</div><br>
                <div class="text">TE CMPN A</div>
                <div class="text">BATCH 4</div>
                <div class="text">ROLL NO. 63</div>
            </div>
        </div>
        <div class="container" id="aston" style="margin-left: 66%">
            <img src="images/aston.jpeg" alt="Avatar" class="image">
            <div class="overlay">
                <div class="text" style="font-size: 30px; margin-top: 35%">ASTON LOPES</div><br>
                <div class="text">TE CMPN A</div>
                <div class="text">BATCH 4</div>
                <div class="text">ROLL NO. 65</div>
            </div>
        </div>
    </div>
</body>
</html>
