<?php

function comfirmQuery($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED" .mysqli_error($connection));
    }
    

}



function insert_categories(){

    global $connection;
    if(isset($_POST['submit'])){
    $cat_title = $_POST['cat_title'];
    
        if($cat_title == "" || empty($cat_title)){
            echo "this field should not be empty.";
        }else{
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}') ";
            
            $create_category_query = mysqli_query($connection, $query);

            if(!$create_category_query){
                die('QUERY FAILED' .mysqli_error($connection));
            }
        }

    }
               
}

function findAllCategories(){
        
    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<th>{$cat_id}</th>";
        echo "<th>{$cat_title}</th>";
        echo "<th><a href='categories.php?edit={$cat_id}'>Edit</a></th>";
        echo "<th><a href='categories.php?delete={$cat_id}'>Delete</a></th>";
        echo "</tr>";
    }                
}

function deleteCategories(){
    
    global $connection;
    if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id={$the_cat_id} ";
        $delete_query = mysqli_query($connection,$query);
        header("Location: categories.php");
    }
}























?>