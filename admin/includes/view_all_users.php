<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <!-- <th>Date</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
            global $connection;
            $query = "SELECT * FROM users";
            $select_users = mysqli_query($connection, $query);
        
            while($row = mysqli_fetch_assoc($select_users)){
            $user_id = $row['user_id'];
            $user_name = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];            
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];  
                                                                      
            
            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$user_name}</td>";            
            echo "<td>{$user_firstname}</td>";            
            echo "<td>{$user_lastname}</td>"; 
            echo "<td>{$user_email}</td>";            
            echo "<td>{$user_role}</td>";            
            echo "<td><a href='users.php?chang_to_admin=$user_id'>Admin</td>";
            echo "<td><a href='users.php?chang_to_sub=$user_id'>Subscriber</td>";
            echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</td>";
            echo "<td><a href='users.php?delete=$user_id'>Delete</td>";
            echo "</tr>";        
        
        }

        ?>

        
    </tbody>
</table>

<?php

if(isset($_GET['chang_to_sub'])){
    $the_user_id = $_GET['chang_to_sub'];
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id";
    $chang_to_sub_query = mysqli_query($connection, $query);
    header("Location: users.php");
}


if(isset($_GET['chang_to_admin'])){
    $the_user_id = $_GET['chang_to_admin'];
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
    $chang_to_admin_query = mysqli_query($connection, $query);
    header("Location: users.php");
}

if(isset($_GET['delete'])){
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_user_query = mysqli_query($connection, $query);
    header("Location: users.php");
}

?>

