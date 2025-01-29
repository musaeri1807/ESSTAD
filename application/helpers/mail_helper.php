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
                <img class="logo" src="https://musaeri.my.id/assets/images/signin.png" alt="Logo">
            </div>
            <div class="content" style="color: #000000;">
            <h4>Hallo, ' . $name . '</h4>  
                <div class="message">
                    
                    <p>Berikut kami sampaikan bahwa <b><i>' . $subject . '</i></b> yang anda lakukan telah berhasil, Silakan Klik tombol dibawah ini :</p>
    
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
                <img class="logo" src="https://musaeri.my.id/assets/images/signin.png" alt="Logo">
            </div>
            <div class="content" style="color: #000000;">
                <h4>Hallo, ' . $name . '</h4> 
                <div class="message">
                    
                    <p> Baru saja anda melakukan <b><i>' . $subject . '</i></b> Selalu jaga kerahasiaan username dan password anda.</p>
    
                </div>               
                
                <div>                    
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

function renewal()
{
    return
        '<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Perpanjangan Layanan</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #4CAF50; color: white; padding: 10px; text-align: center; }
        .content { padding: 20px; }
        .details { background-color: #f9f9f9; padding: 15px; border: 1px solid #e0e0e0; }
        .footer { text-align: center; color: #777; font-size: 12px; margin-top: 20px; }
    </style>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Perpanjangan Layanan Berhasil</h1>
        </div>
        
        <div class="content">
            <p>Yth. CSR & ER Manager PT ANTAM. Tbk LOGAMMULIA,</p>
            
            <p>Kami beritahukan bahwa layanan BSP (Bank Sampah Pintar) telah berhasil diperpanjang.</p>
            
            <div class="details">
                <h2>Detail Perpanjangan</h2>
                <p><strong>Nomor Konfirmasi:</strong> [#01801258910]</p>
                <p><strong>Periode Layanan Baru:</strong> [24-01-2025] - [23-01-2027]</p>
                <table>
                    <tr>
                      <th>No</th>
                      <th>Keterangan</th>                      
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Domain Renewal - bspid.id - 2 Year/s (24/01/2025 - 23/01/2027)</td>
                     
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Server/Hosting Cloud Premium Renewal - 2 Year/s (24/01/2025 - 23/01/2027)</td>
                      
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Panel Control Renewal - 2 Year/s (24/01/2025 - 23/01/2027)</td>
                      
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Backup Data Server - 2 Year/s (24/01/2025 - 23/01/2027)</td>                      
                    </tr>                    
                    
                  </table>
                <!-- <p><strong>Total Dibayarkan:</strong> Rp [Jumlah Pembayaran]</p> -->
            </div>
            
            <p>Layanan Anda akan terus aktif tanpa gangguan. Terima kasih telah mempercayakan layanan kami.</p>
        </div>
        
        <div class="footer">
            <p>&copy; 2025 PT Miga Software Abadi.</p>
        </div>
    </div>
</body>
</html>';
}
