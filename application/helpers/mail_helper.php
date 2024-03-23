<?php
function auth_mail($name, $link, $subject)
{
    return
        '
        <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>auth</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #ffffff;
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
                border-bottom: 1px solid #ffffff;
            }
            .message {
                margin-bottom: 20px;
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #1404ff;
                color: #eef600;
                text-decoration: none;
                border-radius: 10px;
            }
    
            .center-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #11c417;
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
            <div class="content" style="color: #000000;">
                <h4>Kepada YTH</h4>
                <h3>' . $name . '</h3>
                <div class="message">
                    
                    <p>Berikut kami sampaikan bahwa <b><i>' . $subject . '</i></b> yang Anda lakukan telah berhasil, Silakan Klik tombol dibawah ini :</p>
    
                </div>
                <div class="text-align:center" style="text-align: center;">
                    <a class="button" style="color: #ffffff;" href="' . $link . '" >' . $subject . '</a>
                </div>
                
                <div>
                    <p>Selalu jaga kerahasiaan username dan password anda.</p>
                    <p>Demikian, Terimakasih.</p>
                </div>
            </div>
            <div class="footer">
                <p>By MSI. All rights reserved.</p>
                <p style="font-size: small;">E-mail ini dibuat secara otomatis, mohon tidak membalas. Jika butuh bantuan, </p><a href="#" style="color: #ffffff;" class="center-button"> Chat
                    Whatsapp</a>
            </div>
        </div>
    
    </body>
    </html>
    ';
}

// info

function info_mail($name, $subject)
{

    return
        '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>auth</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #ffffff;
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
                border-bottom: 1px solid #ffffff;
            }
            .message {
                margin-bottom: 20px;
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #1404ff;
                color: #eef600;
                text-decoration: none;
                border-radius: 10px;
            }
    
            .center-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #11c417;
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
            <div class="content" style="color: #000000;">
                <h4>Kepada YTH</h4>
                <h3>' . $name . '</h3>
                <div class="message">                    
                    <p>Berikut kami sampaikan bahwa <b><i>' . $subject . '</i></b> yang Anda lakukan telah berhasil</p>    
                </div>          
                
                <div>
                    <p>Selalu jaga kerahasiaan username dan password anda.</p>
                    <p>Demikian, Terimakasih.</p>
                </div>
            </div>
            <div class="footer">
                <p>By MSI. All rights reserved.</p>
                <p style="font-size: small;">E-mail ini dibuat secara otomatis, mohon tidak membalas. Jika butuh bantuan, </p><a href="#" style="color: #ffffff;" class="center-button"> Chat
                    Whatsapp</a>
            </div>
        </div>
    
    </body>
    </html>
    
    
    ';
}
