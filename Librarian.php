<?php 
    session_start();
// to add to the database i must include database.php and connect to the library table in the database
    include 'database.php';
?>
<?php $result = mysqli_query($conn, "DELETE FROM library WHERE 'Book_ID' = '$_GET[Book_ID]'");?>
<?php $result = mysqli_query($mysqli, "SELECT * FROM library"); ?>
<?php $result=$conn->query('select * from library');?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Librarian Portal</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        </head>
        <body>
            <h1>Welcome to the Librarian Portal</h1>
            <p>You can Manage the books in your library over here</p>
            <!-- search for books  -->
            <!-- search for books  -->
            <!-- search for books  -->
            <!-- search for books  -->
            <!-- search for books  -->
            <!-- search for books  -->
            <!-- search for books  -->
            <!-- search for books  -->
            <div class="container">
                <div class="row">
                    <div class="card"> 
                        <form action="Librarian.php" method="GET">
                            <input type="text" name="query" placeholder="Search for a book">
                            <button type="submit" name="searchSubmit" id="searchSubmit" value="Search">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Book_ID,Author, Author_Age, Author_Genre, Genre, Book, Year, Age_Group, Author_ID  -->
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
                            <table class = "table table-striped">
                                <tr>
                                    <td><?php echo $results['Author'];?></td>
                                    <td><?php echo $results['Book'];?> </td>
                                </tr>
                            </table>
                        <?php } ?>   
                        <?php } else{
                            echo "No results";
                        }
                    }   
        ?>            
        <!-- search for books -->
        <!-- search for books -->
        <!-- search for books -->
        <!-- search for books -->
        <!-- search for books -->
        <!-- search for books -->
        <!-- search for books -->

        <div class="container">
            <div class="row">
                <div class="card"> 
                    <h1>Add a new book</h1>
        <?php 
            $result = mysqli_query($conn, "SELECT * FROM library");
            if(mysqli_num_rows($result) > 0){ ?> 

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Book ID</th>
                                <th>Author</th>
                                <th>Author Age</th>
                                <th>Author Genre</th>
                                <th>Genre</th>
                                <th>Book</th>
                                <th>Year</th>
                                <th>Age Group</th>
                                <th>Author ID</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                    <?php while($row = mysqli_fetch_array($result)){ ?>

                            <tr>
                                <td><?php echo $row['Book_ID']; ?></td>
                                <td><?php echo $row['Author']; ?></td>
                                <td><?php echo $row['Author_Age']; ?></td>
                                <td><?php echo $row['Author_Genre']; ?></td>
                                <td><?php echo $row['Genre']; ?></td>
                                <td><?php echo $row['Book']; ?></td>
                                <td><?php echo $row['Year']; ?></td>
                                <td><?php echo $row['Age_Group']; ?></td>
                                <td><?php echo $row['Author_ID']; ?></td>
                                <td><a href="update.php?Book_ID=<?php echo $row['Book_ID']; ?>"><button>Update</button></a></td>
                                <td><a href="deleteProcess.php?Book_ID=<?php echo $row['Book_ID']; ?>"><button>Delete</button></a></td>
                            </tr>
                        </tbody>
                    <?php } ?>
    <?php } else{
                echo "No results found";
            } ?>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="card"> 
            <?php
            if(isset($_POST['Update'])){
                $Book_ID = $_POST['Book_ID'];
                $Author = $_POST['Author'];
                $Author_Age = $_POST['Author_Age'];
                $Author_Genre = $_POST['Author_Genre'];
                $Genre = $_POST['Genre'];
                $Book = $_POST['Book'];
                $Year = $_POST['Year'];
                $Age_Group = $_POST['Age_Group'];
                $Author_ID = $_POST['Author_ID'];
                $sql = "UPDATE library SET Book_ID='$Book_ID', Author='$Author', 
                    Author_Age='$Author_Age', Author_Genre='$Author_Genre', 
                    Genre='$Genre', Book='$Book', Year='$Year', Age_Group='$Age_Group', 
                    Author_ID='$Author_ID' WHERE Book_ID='$Book_ID'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            ?>
            
            <form class ="row g-3" action="Librarian.php" method="post">
                <div class="col-md-6">
                <p>Author: <input class="form-control" id ="Author" type="text" name="Author" placeholder="Author" required></p>
                <p>Author Age: <input class="form-control" id ="Author_Age" type="text" name="Author_Age" placeholder="Author Age" required></p>
                <p>Author Genre: <input class="form-control" id ="Author_Genre" type="text" name="Author_Genre" placeholder="Author Genre" required></p>
                <p>Genre: <input class="form-control" id ="Genre" type="text" name="Genre" placeholder="Genre" required></p>
                <p>Book: <input class="form-control" id ="Book" type="text" name="Book" placeholder="Book" required></p>
                <p>Year: <input class="form-control" id ="Year" type="number" name="Year" placeholder="Year" required></p>
                <p>Age Group: <input class="form-control" id ="Age_Group" type="text" name="Age_Group" placeholder="Age Group" required></p>
                <p>Author ID: <input class="form-control" id ="Author_ID" type="text" name="Author_ID" placeholder="Author ID" required></p>
                <input class="form-control" id="addBook" type="submit" name="addBook" value="Add Book">
                </div>
            </form>
            <?php 
            if(isset($_POST['addBook'])){
                $Author = $_POST['Author'];
                $Author_Age = $_POST['Author_Age'];
                $Author_Genre = $_POST['Author_Genre'];
                $Genre = $_POST['Genre'];
                $Book = $_POST['Book'];
                $Year = $_POST['Year'];
                $Age_Group = $_POST['Age_Group'];
                $Author_ID = $_POST['Author_ID'];   
                $query = "INSERT INTO library (Author, Author_Age, Author_Genre, Genre, Book, Year, Age_Group, Author_ID, Book_ID) VALUES ('$Author', '$Author_Age', '$Author_Genre', '$Genre', '$Book', '$Year', '$Age_Group', '$Author_ID', NULL)";
                $result = mysqli_query($conn, $query);
                if(!$result){
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
                else{
                    echo "Book Added";
                }
            }
            ?>
        </table>
        </div>
        </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        </body>
        </html>