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
                <img class="logo" src="https://bspid.id/assets_frontend/img/icon_bspid.png" alt="Logo">
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
                <img class="logo" src="https://bspid.id/assets_frontend/img/icon_bspid.png" alt="Logo">
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tagihan BSP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #2ecc71;
        }
        .logo {
            color: #2ecc71;
            font-size: 24px;
            font-weight: bold;
        }
        .invoice-details {
            margin: 20px 0;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 5px;
        }
        .billing-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .table th, .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #f5f5f5;
        }
        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
        .status-paid {
            background-color: #2ecc71;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }
        .status-unpaid {
            background-color: #e74c3c;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }
        .qr-code {
            text-align: center;
            margin: 20px 0;
        }
        @media print {
            body {
                background: white;
                padding: 0;
            }
            .container {
                box-shadow: none;
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <i class="bi bi-recycle"></i> 
            </div>
            <p></p>
        </div>

        <div class="invoice-details">
            <div class="billing-info">
                <div>
                    <h3>Ditagihkan kepada:</h3>
                    <p>Ibu Farina dan Ibu Yuliani<br>
                    CSR PT ANTAM Logammulia<br>
                    Gedung Graha Dipta. Jalan Pemuda, No.1 Jatinegara Kaum, <br>
                    Pulo Gadung, Jakarta 13250</p>
                </div>
                <div>
                    <h3>Detail Tagihan:</h3>
                    <p>Nomor Invoice: INV-01801258910<br>
                    Tanggal: 31/01/2025<br>
                    Jatuh Tempo: 29/02/2025<br>
                    Status: <span class="status-unpaid">Belum Dibayar</span></p>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Keterangan</th>
                  <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Domain Renewal - bspid.id - 2 Year/s (24/1/2025 - 23/01/2027)</td>
                <td>Rp 1,011,600</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Server/Hosting Cloud Premium Renewal - 2 Year/s (24/1/2025 - 23/01/2027)</td>
                <td> Rp 31,851,600 
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Panel Control Renewal - 2 Year/s (24/1/2025 - 23/01/2027)</td>
                <td> Rp 13,200,000 
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>Backup Data Server - 2 Year/s (24/1/2025 - 23/01/2027)</td>  
                <td> Rp 40,000,000 
                </td>                    
              </tr>
            </tbody>
        </table>

        <div class="total">
            <!-- <p>Subtotal: Rp 100.000</p>             -->
            <p>Total Tagihan: Rp 86,063,200</p>
        </div>

        <div class="invoice-details">
            <!-- <img src="/api/placeholder/150/150" alt="QR Code Pembayaran"> -->
            <div class="billing-info">
              <div>
                  <h3>Silahkan Melakukan Pembayaran Ke</h3>
                  <p>PT MIGA SOFTWARE ABADI<br>
                    Bank Account  : BNI  1515163373<br>
                    NPWP             : 60.766.970.2-427.000<br>
                    Email              : info@miga.co.id</p>
              </div>
              <div>  
                -                
              </div>
          </div>
        </div>

        <div class="footer">
            <p>Terima kasih atas partisipasi Anda dalam program Bank Sampah Pintar</p>
            <p>Untuk pertanyaan, hubungi kami di WA 081290908321 atau email: info@miga.co.id</p>
        </div>
    </div>
</body>
</html>';
}
