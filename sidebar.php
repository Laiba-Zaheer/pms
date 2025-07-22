<div class="mt-3 shadow p-3 mb-3">
    <form class="d-flex" method="GET" action="">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </form>
</div>

<?php
require_once "config.php";

$sql = "SELECT * FROM `post`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0):
    while ($row = mysqli_fetch_assoc($result)):
        $description = $row["p_des"];
        $first20Words = implode(' ', array_slice(explode(' ', $description), 0, 15));
        $imagePath = 'admin/upload/' . $row['p_img'];
        $fallbackImagePath = 'property1.jpg';
?>
    <div class="shadow p-3 mb-3 bg-white rounded">
        <div class="card border-0" style="width: 100%;">
            <div class="row g-0">
                <!-- Image section -->
                <div class="col-5">
                    <img src="<?php echo htmlspecialchars($imagePath); ?>" 
                         class="img-fluid rounded-start h-100 object-fit-cover"
                         alt="Property Image"
                         onerror="this.onerror=null; this.src='<?php echo htmlspecialchars($fallbackImagePath); ?>';">
                </div>

                <!-- Text/Details Section -->
                <div class="col-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><?php echo htmlspecialchars($row["p_name"]); ?></h5>
                        <p class="card-text"><strong>Description:</strong> <?php echo htmlspecialchars($first20Words); ?>...</p>
                        <p class="card-text"><strong>Owner:</strong> <?php echo htmlspecialchars($row["p_owner"]); ?></p>
                        <p class="card-text">
                            <strong><i class="fa-solid fa-bed"></i> Beds:</strong> <?php echo $row["p_bed"]; ?> | 
                            <strong><i class="fa-solid fa-bath"></i> Baths:</strong> <?php echo $row["p_baths"]; ?>
                        </p>
                        <p class="card-text"><strong>Area:</strong> <?php echo $row["p_sqft"]; ?> sq ft</p>
                        <p class="card-text"><small class="text-muted">Last updated: 3 mins ago</small></p>
                    </div>
                </div>

            </div> <!-- .row -->
        </div> <!-- .card -->
    </div> <!-- .shadow -->

<?php
    endwhile;
else:
    echo "<p class='text-center'>No properties found.</p>";
endif;
?>
