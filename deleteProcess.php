<?php
    /************************
        deleteProcess.php
    */
    if( !empty( $_GET['Book_ID'] ) ){
    
        require 'database.php';
        $sql='delete from `library` where `book_id`=?';
        $stmt=$conn->prepare( $sql );
        $stmt->bind_param('s',$_GET['Book_ID']);
        $stmt->execute();
        $rows=$stmt->affected_rows;
        
        
        // Stay on the same page after Deleting
        exit( header( 'Location: home.php?status=' . $rows ) );
    }
?>
