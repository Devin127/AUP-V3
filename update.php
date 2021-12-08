<?php
include ('database.php');
// update library table in onlybooks database
// Book_ID,Author, Author_Age, Author_Genre, Genre, Book, Year, Age_Group, Author_ID
if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE library SET Book_ID='" . $_POST['Book_ID'] . "', Author='" . $_POST['Author'] . "', Author_Age='" . $_POST['Author_Age'] . "', Author_Genre='" . $_POST['Author_Genre'] . "', Genre='" . $_POST['Genre'] . "', Book='" . $_POST['Book'] . "', Year='" . $_POST['Year'] . "', Age_Group='" . $_POST['Age_Group'] . "', Author_ID='" . $_POST['Author_ID'] . "' WHERE Book_ID='" . $_POST['Book_ID'] . "'");
    $message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM library WHERE Book_ID='" . $_GET['Book_ID'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
    <title>Update Book Record</title>
</head>
<body>
    <form name = "frmUser" method = "post" action = "">
        <div><?php if(isset($message)) { echo $message; } ?></div>
        <div class="container">
            <h1>Update Book Record</h1>
            <hr/>
            
            <label for="Author"><b>Author</b></label>
            <input type="text" placeholder="Enter Author" name="Author" value="<?php echo $row['Author']; ?>" required>
            <label for="Author_Age"><b>Author_Age</b></label>
            <input type="text" placeholder="Enter Author_Age" name="Author_Age" value="<?php echo $row['Author_Age']; ?>" required>
            <label for="Author_Genre"><b>Author_Genre</b></label>
            <input type="text" placeholder="Enter Author_Genre" name="Author_Genre" value="<?php echo $row['Author_Genre']; ?>" required>
            <label for="Genre"><b>Genre</b></label>
            <input type="text" placeholder="Enter Genre" name="Genre" value="<?php echo $row['Genre']; ?>" required>
            <label for="Book"><b>Book</b></label>
            <input type="text" placeholder="Enter Book" name="Book" value="<?php echo $row['Book']; ?>" required>
            <label for="Year"><b>Year</b></label>
            <input type="text" placeholder="Enter Year" name="Year" value="<?php echo $row['Year']; ?>" required>
            <label for="Age_Group"><b>Age_Group</b></label>
            <input type="text" placeholder="Enter Age_Group" name="Age_Group" value="<?php echo $row['Age_Group']; ?>" required>
            <label for="Author_ID"><b>Author_ID</b></label>
            <input type="text" placeholder="Enter Author_ID" name="Author_ID " value="<?php echo $row['Author_ID']; ?>" required>
            <input id ="changeBook" type="submit" name="changeBook" value="Update Book Information">
            <button type="button" onclick="location.href='home.php'">Back</button>
        </div>
    </form>
</body>
</html>
