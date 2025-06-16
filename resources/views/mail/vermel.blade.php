<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kode OTP Anda</title>
  <style>
    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 40px auto;
      background-color: #ffffff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .header {
      background-color: #2563eb;
      padding: 20px;
      text-align: center;
      color: white;
    }

    .content {
      padding: 30px;
    }

    .content h2 {
      color: #111827;
      margin-bottom: 10px;
    }

    .otp-code {
      font-size: 28px;
      font-weight: bold;
      color: #2563eb;
      letter-spacing: 6px;
      margin: 20px 0;
    }

    .text-muted {
      color: #6b7280;
      font-size: 14px;
    }

    .footer {
      text-align: center;
      padding: 20px;
      font-size: 13px;
      color: #9ca3af;
      background-color: #f9fafb;
    }

    @media only screen and (max-width: 600px) {
      .container {
        margin: 10px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="header">
      <h1>NGK Company</h1>
    </div>
    <div class="content">
      <h2>Kode OTP Anda</h2>
      <p>Halo <strong>{{$name}}</strong>,</p>
      <p>Gunakan kode OTP berikut untuk melanjutkan proses verifikasi akun Anda:</p>
      <div class="otp-code">{{$token}}</div>
      <p class="text-muted">Kode ini hanya berlaku selama 10 menit. Jangan berikan kode ini kepada siapa pun, termasuk pihak yang mengaku dari NGK Company.</p>
    </div>
    <div class="footer">
      &copy; 2025 NGK Company. All rights reserved.
    </div>
  </div>

</body>
</html>
