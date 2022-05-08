<?php include "includes/admin_header.php" ?>
<?php
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_username_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_username_query)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_password = $row['user_password'];
        $user_role = $row['user_role'];
        $user_email = $row['user_email'];    
    }

    if(isset($_POST['update_profile'])){        
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];

        $query = "UPDATE users SET ";
        $query .= "username = '{$username}', ";
        $query .= "user_password = '{$user_password}', ";        
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_role = '{$user_role}' ";        
        $query .= "WHERE user_id = $user_id";

        $update_user_query = mysqli_query($connection,$query);

        comfirmQuery($update_user_query);
    }






?>


    <div id="wrapper">        

        <!-- Navigation -->

        <?php include "includes/admin_navigation.php" ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>

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
                            <input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">
                        </div>


                    </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>