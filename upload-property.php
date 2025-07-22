<?php
$conn = mysqli_connect("localhost", "root", "", "pms");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['p_name'];
    $owner = $_POST['p_owner'];
    $city = $_POST['p_city'];
    $category = $_POST['p_category'];
    $price = $_POST['p_price'];
    $sqfeat = $_POST['p_sqft'];
    $bed = $_POST['p_bed'];
    $bath = $_POST['p_baths'];
    $desc = $_POST['p_des'];

    $imageName = $_FILES['p_img']['name'];
    $imageTmp = $_FILES['p_img']['tmp_name'];
    $imagePath = "admin/upload/" . basename($imageName);

    if (move_uploaded_file($imageTmp, $imagePath)) {
        $query = "INSERT INTO post (p_name, p_owner, p_city, p_category, p_price, p_sqft, p_bed, p_baths, p_des, p_img) 
                  VALUES ('$name', '$owner', '$city', '$category', '$price', '$sqfeat', '$bed', '$bath', '$desc', '$imageName')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Property added successfully'); window.location.href='admin-page.php';</script>";
        } else {
            echo "Database error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Property Listings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .property-card {
            border: 1px solid #ccc;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            display: flex;
            flex-direction: row;
        }
        .property-image {
            flex: 1;
            max-width: 50%;
            object-fit: cover;
            height: 250px;
        }
        .property-details {
            flex: 1;
            padding: 20px;
        }
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<div class="container py-4">
    <h2 class="text-center mb-4 fw-bold">All Properties</h2>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-6">
                <div class="property-card">
                    <img src="admin/upload/<?= htmlspecialchars($row['p-img']) ?>" class="property-image img-fluid" alt="Property Image">
                    <div class="property-details">
                        <h5><?= htmlspecialchars($row['p-Name']) ?></h5>
                        <p><strong>Owner:</strong> <?= htmlspecialchars($row['p-owner']) ?></p>
                        <p><?= htmlspecialchars($row['p-des']) ?></p>
                        <p><strong>City:</strong> <?= htmlspecialchars($row['p-city']) ?></p>
                        <p><strong>Price:</strong> PKR <?= number_format($row['p-price']) ?></p>
                        <p><strong>Bedrooms:</strong> <?= $row['p-bed'] ?> | <strong>Baths:</strong> <?= $row['p-bath'] ?> | <strong>Area:</strong> <?= $row['p-sqfeat'] ?> Sq.Ft.</p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<footer>
    Property Management System &copy; 2025
</footer>
</body>
</html>
