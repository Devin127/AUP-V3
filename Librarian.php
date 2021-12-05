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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        </head>
<body>
<h1><p>Add a Book to The Library</p></h1>
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
<h1> Remove a Book From the Library</h1>
<div class="table-responsive">
  <table class="table align-middle">
    <thead class="table-dark">
        <td class ="table-info">Author</td>
        <td class ="table-info">Author_Age</td>
        <td class ="table-info">Author_Genre</td>
        <td class ="table-info">Genre</td>
        <td class ="table-info">Book</td>
        <td class ="table-info">Year</td>
        <td class ="table-info">Age_Group</td>
        <td class ="table-info">Author_ID</td>
        <td class ="table-info">Book_ID</td>
    </thead>
    <?php
    while( $row = $result->fetch_assoc() ) { 
    ?>
<option value="">
        <tr>
            <td class ="table-info"><?php echo $row['Author']; ?></td>
            <td class ="table-info"><?php echo $row['Author_Age']; ?></td>
            <td class ="table-info"><?php echo $row['Author_Genre']; ?></td>
            <td class ="table-info"><?php echo $row['Genre']; ?></td>
            <td class ="table-info"><?php echo $row['Book']; ?></td>
            <td class ="table-info"><?php echo $row['Year']; ?></td>
            <td class ="table-info"><?php echo $row['Age_Group']; ?></td>
            <td class ="table-info"><?php echo $row['Author_ID']; ?></td>
            <td class ="table-info"><?php echo $row['Book_ID']; ?></td>
            <td class ="table-info">
            <a href="deleteProcess.php?Book_ID=<?php echo $row["Book_ID"]; ?>"><button>DELETE</button></a>
            </td>
        </tr>
    </option>
<?php
    }      
?>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>