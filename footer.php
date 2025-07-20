<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About Footer</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f4f4;
    }

    .content {
      padding: 60px 20px;
      text-align: center;
    }

    .footer {
      background: #14034fff;
      color: #ffffff;
      padding: 60px 20px 30px;
    }

    .footer h3 {
      text-align: center;
      font-size: 30px;
      color: #b59a47ff;
      margin-bottom: 30px;
    }

    .footer-content {
      max-width: 1100px;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 30px;
    }

    .footer-column {
      flex: 1;
      min-width: 250px;
    }

    .footer-column h4 {
      color: #ffdd57;
      margin-bottom: 12px;
      font-size: 18px;
      border-bottom: 1px solid #555;
      padding-bottom: 5px;
    }

    .footer-column p,
    .footer-column a {
      margin: 6px 0;
      font-size: 15px;
      color: #ddd;
      text-decoration: none;
    }

    .footer-column a:hover {
      color: #ffc107;
    }

    .footer-bottom {
      text-align: center;
      margin-top: 40px;
      font-size: 14px;
      color: #aaa;
      border-top: 1px solid #333;
      padding-top: 15px;
    }

    @media (max-width: 768px) {
      .footer-content {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }
    }
  </style>
</head>
<body>

  <!-- Your page content -->
  

  <!-- Footer with About Section -->
  <footer class="footer">
    <h3>About Izhaar Associates</h3>
    <div class="footer-content">
      <div class="footer-column">
        <h4>Founder</h4>
        <p>Syed Izhaar Ali Shah</p>
      </div>

      <div class="footer-column">
        <h4>Contact</h4>
        <a href="tel:+923335080800">+92 333 5080800</a>
        <a href="tel:+923215080800">+92 321 5080800</a>
        <a href="tel:0515400098">051 5400098 99</a>
        <a href="mailto:izhaarassociates@gmail.com">izhaarassociates@gmail.com</a>
      </div>

      <div class="footer-column">
        <h4>Location</h4>
        <p>Office #1,2 Spring North, Ground Floor</p>
        <p>Hamza Arcade, Plaza #35, Commercial Phase VII</p>
        <p>Bahria Town, Islamabad</p>
      </div>

      <div class="footer-column">
        <h4>Owners</h4>
        <p>Syed Izhaar Ali Shah</p>
        <p>Asad Rauf</p>
        <p>Syed Waqar Shah</p>
      </div>
    </div>

    <div class="footer-bottom">
      &copy; 2025 Izhaar Associates — All Rights Reserved
    </div>
  </footer>

</body>
</html>
