<?php

    if(isset($_GET['edit_user'])){
        $the_user_id = $_GET['edit_user'];
    }

    $query = "SELECT * FROM users WHERE user_id = $the_user_id";
    $select_user_by_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_user_by_id)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_password = $row['user_password'];
        $user_role = $row['user_role'];
        $user_email = $row['user_email'];    
    }



    if(isset($_POST['edit_user'])){
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];

        // $post_image = $_FILES['image']['name']; ///上傳檔案名稱
        // $post_image_temp = $_FILES['image']['tmp_name']; ///上傳檔案的暫存位置
        
        $user_role = $_POST['user_role'];    
        // $post_date = date('d-m-y');    

        // move_uploaded_file($post_image_temp,"../images/$post_image");///移動檔案(A,B)，將A移到B

        $query = "UPDATE users SET ";
        $query .= "username = '{$username}', ";
        $query .= "user_password = '{$user_password}', ";        
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_role = '{$user_role}' ";        
        $query .= "WHERE user_id = $the_user_id";

        $update_user_query = mysqli_query($connection,$query);

        comfirmQuery($update_user_query);
    }



?>


<form action="" method='post' enctype="multipart/form-data">

    <div class="form-group">
        <label for="author">Firstname</label>
        <input value="<?php echo $user_firstname; ?>" type='text' class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="status">Lastname</label>
        <input value="<?php echo $user_lastname; ?>" type='text' class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <select name="user_role" id="">
            <option value='<?php echo $user_role; ?>'><?php echo $user_role; ?></option>
            <?php
                if($user_role == 'admin'){
                    echo "<option value='subscriber'>subscriber</option>";
                }else{
                    echo "<option value='admin'>admin</option>";
                }           
            ?>

        </select>
    </div>
<!-- 
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type='file' name="image">
    </div> -->

    <div class="form-group">
        <label for="tags">Username</label>
        <input value="<?php echo $username; ?>" type='text' class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="content">Password</label>
        <input value="<?php echo $user_password; ?>" type='password' class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <label for="content">Email</label>
        <input value="<?php echo $user_email; ?>" type='email' class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
    </div>


</form>