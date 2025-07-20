<?php
$conn = mysqli_connect("localhost", "root", "", "pms");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Default SQL Query
$search = $_GET['search'] ?? '';
$sort = $_GET['sort'] ?? '';

$sql = "SELECT * FROM register WHERE reg_cat = 'tenant'";

// Search logic
if (!empty($search)) {
    $search = mysqli_real_escape_string($conn, $search);
    $sql .= " AND (f_name LIKE '%$search%' OR l_name LIKE '%$search%' OR reg_email LIKE '%$search%')";
}

// Sorting logic
if ($sort === 'income_asc') {
    $sql .= " ORDER BY reg_income ASC";
} elseif ($sort === 'income_desc') {
    $sql .= " ORDER BY reg_income DESC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tenants - Property Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Segoe UI', sans-serif;
        }

        .tenant-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .tenant-card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .tenant-header {
            font-weight: bold;
            font-size: 1.3rem;
            color: #003366;
        }

        .tenant-subinfo {
            font-size: 0.95rem;
            color: #555;
        }

        .footer-span {
            background-color: #2e3a45;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-weight: bold;
            font-size: 18px;
            width: 100%;
        }

        .filter-form input, .filter-form select {
            margin-bottom: 15px;
        }

        .fa-user-circle {
            font-size: 2rem;
            margin-right: 8px;
            color: #003366;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <h2 class="text-center text-primary mb-4">Registered Tenants</h2>

    <!-- Filter/Search -->
    <form method="GET" class="row filter-form justify-content-center mb-4">
        <div class="col-md-4">
            <input type="text" name="search" placeholder="Search by name or email" class="form-control" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        </div>
        <div class="col-md-3">
            <select name="sort" class="form-select">
                <option value="">Sort by Income</option>
                <option value="income_asc" <?= ($sort == 'income_asc') ? 'selected' : '' ?>>Low to High</option>
                <option value="income_desc" <?= ($sort == 'income_desc') ? 'selected' : '' ?>>High to Low</option>
            </select>
        </div>
        <div class="col-md-2 d-grid">
            <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Apply</button>
        </div>
        <div class="col-md-2 d-grid">
            <a href="tenant.php" class="btn btn-secondary"><i class="fa fa-rotate-left"></i> Reset</a>
        </div>
    </form>

    <!-- Tenants List -->
    <div class="row">
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($tenant = mysqli_fetch_assoc($result)) {
                echo '
                <div class="col-md-6 col-lg-4">
                    <div class="tenant-card">
                        <div class="tenant-header">
                            <i class="fa fa-user-circle"></i> ' . htmlspecialchars($tenant["f_name"] . ' ' . $tenant["l_name"]) . '
                        </div>
                        <div class="tenant-subinfo mt-2"><i class="fa fa-envelope"></i> ' . htmlspecialchars($tenant["reg_email"]) . '</div>
                        <div class="tenant-subinfo"><i class="fa fa-phone"></i> ' . htmlspecialchars($tenant["reg_ph"]) . '</div>
                        <div class="tenant-subinfo"><i class="fa fa-money-bill"></i> Monthly Income: PKR ' . number_format($tenant["reg_income"]) . '</div>
                        <div class="tenant-subinfo"><i class="fa fa-venus-mars"></i> Gender: ' . htmlspecialchars($tenant["reg_gender"]) . '</div>
                        <div class="tenant-subinfo"><i class="fa fa-id-card"></i> CNIC: ' . htmlspecialchars($tenant["reg_cnic"]) . '</div>
                    </div>
                </div>';
            }
        } else {
            echo '<div class="col-12 text-center"><p class="text-muted">No tenants found.</p></div>';
        }
        ?>
    </div>
</div>

<!-- Footer -->
<span class="footer-span">Tenant Management | Property Management System</span>

</body>
</html>
