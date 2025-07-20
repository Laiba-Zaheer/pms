<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Property Listings</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & FontAwesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="property-list.css">
</head>
<body>

<!-- Header -->
<header class="bg-dark text-white py-3 mb-4">
  <div class="container">
    <h2 class="mb-0">Property Management System</h2>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row gy-4">
    <?php
    include('config.php');

    $sql = "SELECT * FROM `post`";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $imagePath = 'admin/upload/' . $row['p-img'];
        $fallbackImagePath = 'property2.jpg'; // fallback if image is missing
    ?>
    <div class="col-md-6">
      <div class="card mb-4 shadow-sm border-0">
        <div class="row g-0">

          <!-- Image Section -->
          <div class="col-md-5">
            <img src="<?php echo htmlspecialchars($imagePath); ?>" 
                 onerror="this.onerror=null; this.src='<?php echo htmlspecialchars($fallbackImagePath); ?>';" 
                 class="img-fluid rounded-start h-100 w-100 object-fit-cover" 
                 alt="Property Image">
          </div>

          <!-- Text Section -->
          <div class="col-md-7">
            <div class="card-body">
              <h5 class="card-title text-primary"><?php echo htmlspecialchars($row["p-Name"]); ?></h5>
              <p class="card-text"><strong>Description:</strong> <?php echo htmlspecialchars($row["p-des"]); ?></p>
              <p class="card-text"><strong>Owner:</strong> <?php echo htmlspecialchars($row["p-owner"]); ?></p>
              <p class="card-text">
                <strong><img src="icons/bed.png" alt="bed" width="20"> Beds:</strong> <?php echo htmlspecialchars($row["p-bed"]); ?> &nbsp;
                <strong><img src="icons/bath.png" alt="bath" width="20"> Baths:</strong> <?php echo htmlspecialchars($row["p-bath"]); ?>
              </p>
              <p class="card-text"><strong>Area:</strong> <?php echo htmlspecialchars($row["p-sqfeat"]); ?> sq ft</p>
              <p class="card-text"><strong>City:</strong> <?php echo htmlspecialchars($row["p-city"]); ?></p>
              <p class="card-text text-muted"><small>Last updated 3 mins ago</small></p>
            </div>
          </div>

        </div>
      </div>
    </div>
    <?php
      }
    } else {
      echo "<p class='text-center mt-4'>No properties found.</p>";
    }

    mysqli_close($conn);
    ?>
  </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
  <div class="container">
    <p class="mb-0">&copy; <?php echo date('Y'); ?> Property Management System. All rights reserved.</p>
  </div>
</footer>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
