<?php
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $email =  $_POST['email'];
        $password =  $_POST['password'];
        $cpassword =  $_POST['cpassword'];

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $emailquery = "select * from registration where email = '$email' ";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount> 0){
            echo "Email already exists";
        }else{
            if($password === $cpassword){
                $insertquery = "insert into registration(username, email, password, cpassword) values('$username', '$email', '$pass', '$cpass')";
                $iquery = mysqli_query($con, $insertquery);
               
                        if($iquery){
                                ?>
                                    <script>
                                        alert("inserted successful");    
                                    </script>
                            <?php
                            }else{ ?>
                                        <script>
                                            alert(" not connection");    
                                        </script>
                                    <?php
                        }

     }      else{
                echo "password are not matching";
            }
        }
    }

    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "signup";

    $con = mysqli_connect($server, $user, $password, $db);

    if($con){
        ?>
            <script>
                alert("connection successful");    
            </script>
        <?php
    }else{ ?>
    <script>
        alert(" no connection");    
    </script>
  <?php
  }
 ?>