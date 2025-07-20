<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Property Management</title>
  <link rel="stylesheet" href="stylee.css">
</head>
<body>

  <!-- Navbar with banner background -->
  <nav class="navbar">
    <img src="logo.png" alt="Logo" class="logo">

    <div class="nav-links">
      <a href="main.php">HOME</a>
      <a href="index.php">SIGN-IN</a>
      <a href="residential.php">Residential Property</a>
      <a href="commercial.php"> Commercial Property</a>
      <a href="rental.php">RENTAL PROPERTY</a>
      <a href="tenant.php">TENANT</a>
      <a href="appointment.php">APPOINTMENTS</a>
    </div>

    <!-- Unit Filter -->
    <div class="unit-filter">
      <label for="unitType">Unit:</label>
      <select id="unitType">
        <option value="kanal">Kanal</option>
        <option value="marla">Marla</option>
        <option value="sqft">Sq. Feet</option>
        <option value="sqyd">Sq. Yards</option>
      </select>

      <label for="price">Price (PKR):</label>
      <input type="number" id="price" placeholder="Enter max price">
    </div>

    <!-- Category Dropdown -->
    <div class="category-dropdown">
      <label for="category">Category:</label>
      <select id="category">
        <option value="tenant">Tenant</option>
        <option value="buyer">Buyer</option>
        <option value="seller">Seller</option>
        <option value="landlord">Landlord</option>
      </select>
    </div>
  </nav>

  <!-- Property Cards Section 
  <section class="property-cards">
    <div class="card">
      <img src="p1.jpg" alt="Property 1">
      <h3>Gulberg Luxury Villa</h3>
      <p>Spacious 1 Kanal house with lush green lawn and modern architecture. Owner: Mr. Azlan Khan</p>
    </div>

    <div class="card">
      <img src="p2.jpg" alt="Property 2">
      <h3>DHA Commercial Plot</h3>
      <p>Commercial 10 Marla plot available at a prime location in DHA. Owner: Mrs. Sana Riaz</p>
    </div>

    <div class="card">
      <img src="p3.jpg" alt="Property 3">
      <h3>Bahria Apartments</h3>
      <p>Modern 3-bed apartment in Bahria Town. Best for families. Owner: Mr. Hamza Ali</p>
    </div>
  </section>
-->
</body>
</html>
