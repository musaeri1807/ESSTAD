<?php

function mailforgot($email, $token)
{
    return
        '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Email</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f0f0f0;
            }
            .container {
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                border-radius: 10px;
                overflow: hidden;
            }
            .header {
                padding: 20px;
                text-align: center;
            }
            .logo {
                display: block;
                margin: 0 auto;
                width: 70px;
                height: auto;
            }
            .content {
                padding: 20px;
                background-color: #ffffff;
                border-bottom: 1px solid #ccc;
            }
            .message {
                margin-bottom: 20px;
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #1404ff;
                color: #fff;
                text-decoration: none;
                border-radius: 10px;
            }
    
            .center-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                border: none;
                border-radius: 5px;
    
            }
            .footer {
                padding: 10px;
                text-align: center;
                background-color: #000000;
                color: #ffffff;
            }
        </style>
    </head>
    <body>
    
        <div class="container">
            <div class="header">
                <img class="logo" src="https://musaeri.my.id/assets/images/signin.png" alt="Logo ESSTAD">
            </div>
            <div class="content">
                <h4>Kepada YTH</h4>
                <h3>' . $email . '</h3>
                <div class="message">
                    
                    <p>Berikut kami sampaikan bahwa <i>RESET PASSWORD</i> yang Anda lakukan telah berhasil, Silkan Klik tombol dibawah ini :</p>
    
                </div>
                <div class="text-align:center" style="text-align: center;">
                    <a class="button" href="' . base_url() . 'authorization/reset?email=' . $email . '&token=' . urlencode($token) . '" >Change Password</a>
                </div>
                
                <div>
                    <p>Selalu jaga kerahasiaan username dan password anda.</p>
                    <p>Demikian, Terimakasih.</p>
                </div>
            </div>
            <div class="footer">
                <p>By MSI. All rights reserved.</p>
                <p>E-mail ini dibuat secara otomatis, mohon tidak membalas. Jika butuh bantuan, dapat menyampikan melalui</p><a href="#" class="center-button"> Chat
                    Whatsapp</a>
            </div>
        </div>
    
    </body>
    </html>
    ';
}

// verifikasi

// function mailvery($email, $token)
// {

//     return '';
// }
