<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<!-- Some CSS-->
<style>
    h2 {
        text-align: center;
    }
    .center {
        text-align: center;
        margin: 20px auto;
        background-color: #ccc;
        padding: 40px;
    }
    .content {
        width: 100%;
    }
    .info {
        margin: auto;
        max-width: 350px;
    }
</style>

</head>
<body>
    
    <!-- API LINK-->
    <hr>
    <div class="center">
        <a class="center" href="data.php">Link to API</a>
    </div>
    <hr>
    <br>
    <!-- HIDE JSON-->
    <div style="display: none;">
        <?php include_once "data.php"; ?>
    </div>
    <div class="content">

        <!-- DISPLAY DATA ON PAGE -->
        <div class="info">
        
        <h2>GET VISITORS LOCATION</h2>
            <h4>IP ADDRESS:             <?php echo $details["ip"]; ?></h4>
            <h4>Country (Full Name):    <?php echo $details["fullName"]; ?></h4>
            <h4>Short name (initials) : <?php echo $details["short"]; ?></h4>
        </div>

    </div>

    <div id="main"></div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="testjs.js"></script>
</body>
</html>