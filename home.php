<?php
include 'config.php';

$sql = "SELECT * FROM properties";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Property Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
  <h2 class="text-center mb-4">Property Listings</h2>
  <div class="row">
    <?php while ($row = $result->fetch_assoc()) { ?>
      <div class="col-md-4 mb-4">
        <div class="card shadow">
          <img src="images/<?php echo $row['image']; ?>" class="card-img-top" style="height:200px; object-fit:cover;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['title']; ?></h5>
            <p class="card-text"><?php echo $row['description']; ?></p>
            <p><strong>Price:</strong> $<?php echo $row['price']; ?></p>
            <p><strong>Location:</strong> <?php echo $row['location']; ?></p>
            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning me-2">Edit</a>
            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this property?')">Delete</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
</body>
</html>
