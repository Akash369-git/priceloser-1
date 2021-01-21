<?php
    include 'index.php';

    if (isset($_POST['submit'])){
        $name =  mysqli_real_escape_string($con, $_POST['name']);
        $email=  mysqli_real_escape_string($con, $_POST['email']);
        $subject=  mysqli_real_escape_string($con, $_POST['subject']);
        $message = mysqli_real_escape_string($con, $_POST['message']);

        $emailquery = " select * from registration where email='$email' ";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount>0){
            echo "Email alreay exists";
        }else{
            $insertquery = "insert into contact( `name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message')";

            $iquery = mysqli_query($con, $insertquery);

            if($con){
                ?>
                  <script>
                    alert("Connection Successful");
                  </script>
                  <?php
              }else{
                ?>
                <script>
                  alert("Connection not Successful");
                </script>
                <?php
              }
        }

   ?>