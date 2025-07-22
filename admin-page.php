<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Property Management System</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container-fluid{
            padding-left: 0rem;
            padding-right: 0rem;
            overflow: hidden;
        }
        .header{
            display: flex;
            justify-content: center;
            background-color: rgb(20 140 255);
            padding: 1rem;
        }
        .img-fluid{
            height: 100% !important;
        }
        
        .footer {
    background-color: red;
    color: white;
    text-align: center;
    padding: 1rem 0;
}

    </style>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">

            <!-- header -->
            <div class="col-md-12">
            <?php
                include("header.php");
            ?>
            </div>
            
            <div class="col-md-12 p-5">
                <div class="row">
                    <!-- left sidebar -->
                    <div class="col-md-7 order-2 order-sm-2 order-md-1 order-lg-1">
                        <?php
                            include("main-admin.php");
                        ?>
                    </div>
                    <div class="col-md-5 order-1 order-sm-1 order-md-2 order-lg-2">
                        <!-- right sidebar -->
                
                        <?php
                            include("sidebar.php");
                        ?>
                    </div>
                </div>
            </div>   

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadPropertyModal">
    <i class="fa fa-plus"></i> Add Property
</button>
<div class="modal fade" id="uploadPropertyModal" tabindex="-1" aria-labelledby="uploadPropertyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="upload-property.php" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="uploadPropertyModalLabel">Upload New Property</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6">
            <label class="form-label">Property Name</label>
            <input type="text" name="p_name" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Owner</label>
            <input type="text" name="p_owner" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">City</label>
            <input type="text" name="p_city" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Category</label>
            <select name="p_category" class="form-select" required>
              <option value="residential">Residential</option>
              <option value="commercial">Commercial</option>
              <option value="rental">Rental</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Price</label>
            <input type="number" name="p_price" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Square Feet</label>
            <input type="number" name="p_sqft" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Bedrooms</label>
            <input type="number" name="p_bed" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">Bathrooms</label>
            <input type="number" name="p_baths" class="form-control">
          </div>
          <div class="col-md-12">
            <label class="form-label">Description</label>
            <textarea name="p_des" class="form-control" rows="3" required></textarea>
          </div>
          <div class="col-md-12">
            <label class="form-label">Upload Image</label>
            <input type="file" name="p_img" class="form-control" accept="image/*" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-success">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>


            <!-- footer -->
            <div class="col-md-12 mt-3">
                <?php
                    include("footer.php");
                ?>
            </div>
        </div>

        </div>
    </div>
</body>
</html>
<?php
// bottom of admin-page.php
if (isset($conn)) {
    mysqli_close($conn);
}
?>
