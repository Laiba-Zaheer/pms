<?php
$conn = mysqli_connect("localhost", "root", "", "pms");
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Set default price filter
$selectedPrice = isset($_GET['price_range']) ? intval($_GET['price_range']) : 0;

// Query to fetch rental properties sorted based on price proximity to filter
$query = "
    SELECT *, ABS(p-price - $selectedPrice) AS price_diff 
    FROM post 
    WHERE `p-category` = 'rental' 
    ORDER BY price_diff ASC
";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Properties - Property Management System</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            display: flex;
            flex-direction: column;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            flex: 1;
        }

        .property-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            display: flex;
            flex-direction: row;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 250px;
        }

        .property-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .property-image {
            width: 50%;
            height: 100%;
            object-fit: contain;
            background-color: #fefefe;
            padding: 10px;
        }

        .property-details {
            padding: 15px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .property-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #003366;
            margin-bottom: 6px;
        }

        .property-desc {
            font-size: 0.95rem;
            color: #444;
            margin-bottom: 10px;
        }

        .property-owner {
            font-size: 0.9rem;
            color: #666;
            font-style: italic;
        }

        .footer-span {
            background-color: #2e3a45;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-weight: bold;
            font-size: 18px;
            width: 100%;
            margin-top: auto;
        }

        @media (max-width: 767px) {
            .property-card {
                flex-direction: column;
                height: auto;
            }

            .property-image {
                width: 100%;
                height: auto;
                max-height: 300px;
            }
        }

        .filter-box {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .filter-box label {
            font-weight: 500;
            margin-bottom: 10px;
            display: block;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container py-4">
    <!-- Price Filter -->
    <form method="GET" class="filter-box">
        <label for="price_range">Filter by Price Range (PKR): <strong><span id="price-value"><?php echo $selectedPrice; ?></span></strong></label>
        <input type="range" class="form-range" name="price_range" id="price_range" min="0" max="1000000" step="10000" value="<?php echo $selectedPrice; ?>" oninput="document.getElementById('price-value').innerText = this.value">
        <button class="btn btn-primary mt-2" type="submit">Apply Filter</button>
    </form>

    <!-- Property List -->
    <div class="row g-4">
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="col-md-6">
                    <div class="property-card">
                        <img class="property-image" src="admin/upload/' . htmlspecialchars($row["p-img"]) . '" alt="Property Image">
                        <div class="property-details">
                            <div class="property-title">' . htmlspecialchars($row["p-Name"]) . '</div>
                            <div class="property-desc">' . htmlspecialchars($row["p-des"]) . '</div>
                            <div class="property-owner"><i class="fa fa-user"></i> Owner: ' . htmlspecialchars($row["p-owner"]) . '</div>
                            <div><strong>Price:</strong> PKR ' . number_format($row["p-price"]) . '</div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "<p class='text-center text-muted'>No rental properties found in this range.</p>";
        }
        ?>
    </div>
</div>

<span class="footer-span">Rental Property</span>

</body>
</html>
