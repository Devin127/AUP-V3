<?php 
session_start();
include ('database.php');
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Member Portal</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css">

</head>
<body>
        <h1>Welcome to Only-books online library</h1>
        <p>you can search through our books over here</p>
<!-- search Function -->
        <div class="container">
                <div class="row">
                        <div class="card"> 
                                <form action="Member.php" method="GET">
                                        <input type="text" name="query" placeholder="Search for a book">
                                        <button type="submit" name="searchSubmit" id="searchSubmit" value="Search">Search</button>
                                </form>
                        </div>
                </div>
        </div>
        <?php
        $query = $_GET['query'];
        $min_Length = 3;
        if(strlen($query) >= $min_length){
        $query = htmlspecialchars($query);
        $query = mysqli_real_escape_string($conn, $query);
        $raw_results = mysqli_query($conn, "SELECT * FROM library WHERE 
        (`Author` LIKE '%".$query."%') OR (`Author_Age` LIKE '%".$query."%') OR (`Author_Genre` LIKE '%".$query."%') OR 
        (`Genre` LIKE '%".$query."%') OR (`Book` LIKE '%".$query."%') OR (`Year` LIKE '%".$query."%') OR 
        (`Age_Group` LIKE '%".$query."%') OR (`Author_ID` LIKE '%".$query."%')");
                if(mysqli_num_rows($raw_results) > 0){
                while($results = mysqli_fetch_array($raw_results)){ ?>
                        <div class="container">
                                <div class="row">
                                        <div class="card">
                                                <div class="card-body">
                                                        <h5 class="card-title"><?php echo $results['Book']; ?></h5>
                                                        <p class="card-text"><?php echo $results['Author']; ?></p>
                                                        <p class="card-text"><?php echo $results['Genre']; ?></p>
                                                </div>
                                        </div>
                       
                <?php } ?>   
                <?php } else{
                        echo "No results";
                }
                }   
?>            
<!-- End of search Function -->



</body>
</html>