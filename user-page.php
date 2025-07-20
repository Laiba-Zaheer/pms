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
        html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}
.container-fluid {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    padding-left: 0;
    padding-right: 0;
}
.page-content {
    flex: 1;
}
.footer {
    background-color: #000;
    color: white;
    text-align: center;
    padding: 1rem 0;
}


    </style>
</head>
<body>
    <div class="container-fluid">
        
        <!-- Header -->
        <div class="row">
            <div class="col-md-12">
                <?php include("header.php"); ?>
            </div>
        </div>

        <!-- Main Content Wrapper -->
        <div class="row page-content"> <!-- 👈 Make this stretchable -->
            <div class="col-md-12 p-5">
                <div class="row">
                    <!-- Left: Main -->
                    <div class="col-md-7 order-2 order-md-1">
                        <?php include("main.php"); ?>
                    </div>

                    <!-- Right: Sidebar -->
                    <div class="col-md-5 order-1 order-md-2">
                        <?php include("sidebar.php"); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="row">
            <div class="col-md-12">
                <?php include("footer.php"); ?>
            </div>
        </div>
        
    </div>
</body>

</html>