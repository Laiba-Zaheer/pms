<?php
include('config.php');

// (Optional) Handle deletion — this block can also be removed if not needed anymore
// if (isset($_GET['delete'])) {
//     $id = intval($_GET['delete']);
//     $deleteQuery = "DELETE FROM `post` WHERE id = $id";
//     mysqli_query($conn, $deleteQuery);
//     header("Location: " . $_SERVER['PHP_SELF']);
//     exit();
// }

$sql = "SELECT * FROM `post`";
$result = mysqli_query($conn, $sql);
?>

<!-- Include Bootstrap & Font Awesome -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="property-list.css">

<div class="container mt-4">
<?php
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $imagePath = 'admin/upload/' . $row['p-img'];
    $fallbackImagePath = 'property2.jpg'; ?>
    
    <div class="card mb-4 shadow-sm border-0">
      <div class="row g-0">
        <!-- Image -->
        <div class="col-md-5">
          <img src="<?php echo htmlspecialchars($imagePath); ?>" 
               onerror="this.onerror=null; this.src='<?php echo $fallbackImagePath; ?>';" 
               class="img-fluid rounded-start h-100 w-100 object-fit-cover" 
               alt="Property Image">
        </div>

        <!-- Details -->
        <div class="col-md-7">
          <div class="card-body text-start">
            <h5 class="card-title text-primary"><?php echo htmlspecialchars($row["p-Name"]); ?></h5>
            <p class="card-text"><strong>Description:</strong> <?php echo htmlspecialchars($row["p-des"]); ?></p>
            <p class="card-text"><strong>Owner:</strong> <?php echo htmlspecialchars($row["p-owner"]); ?></p>
            <p class="card-text">
              <strong><i class="fa-solid fa-bed"></i> Beds:</strong> <?php echo $row["p-bed"]; ?> | 
              <strong><i class="fa-solid fa-bath"></i> Baths:</strong> <?php echo $row["p-baths"]; ?>
            </p>
            <p class="card-text"><strong>Area:</strong> <?php echo $row["p-sqfeat"]; ?> sq ft</p>
            <p class="card-text"><small class="text-muted">Last updated: 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
<?php
  }
} else {
  echo "<p class='text-center mt-4'>No properties found.</p>";
}

?>
</div>
