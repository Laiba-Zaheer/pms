<?php
include('config.php');

// Validate if p-id is present
if (!isset($_GET['p-id']) || !is_numeric($_GET['p-id'])) {
    die("Invalid property ID.");
}

$id = intval($_GET['p-id']);

// Fetch record
$result = mysqli_query($conn, "SELECT * FROM post WHERE `p-id` = $id");
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
if (!$row) {
    die("Property not found.");
}

// Handle update
if (isset($_POST['update'])) {
    $name = $_POST['p-Name'];
    $des = $_POST['p-des'];
    $owner = $_POST['p-owner'];
    $beds = $_POST['p-bed'];
    $baths = $_POST['p-baths'];
    $area = $_POST['p-sqfeat'];

    $query = "UPDATE post SET 
                `p-Name` = '$name', 
                `p-des` = '$des', 
                `p-owner` = '$owner',
                `p-bed` = '$beds',
                `p-baths` = '$baths',
                `p-sqfeat` = '$area' 
              WHERE `p-id` = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: display.php");
        exit();
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
}
?>

<!-- HTML Form -->
<form method="POST" class="p-4">
    <input type="text" name="p-Name" value="<?php echo htmlspecialchars($row['p-Name']); ?>" placeholder="Property Name" class="form-control mb-2" required>
    <textarea name="p-des" placeholder="Description" class="form-control mb-2" required><?php echo htmlspecialchars($row['p-des']); ?></textarea>
    <input type="text" name="p-owner" value="<?php echo htmlspecialchars($row['p-owner']); ?>" placeholder="Owner" class="form-control mb-2" required>
    <input type="number" name="p-bed" value="<?php echo htmlspecialchars($row['p-bed']); ?>" placeholder="Beds" class="form-control mb-2" required>
    <input type="number" name="p-baths" value="<?php echo htmlspecialchars($row['p-baths']); ?>" placeholder="Baths" class="form-control mb-2" required>
    <input type="number" name="p-sqfeat" value="<?php echo htmlspecialchars($row['p-sqfeat']); ?>" placeholder="Area" class="form-control mb-2" required>
    <button type="submit" name="update" class="btn btn-success">Update Property</button>
</form>
