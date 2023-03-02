<?php
session_start();
require 'conn.php';
global $conn;?>
<H1>OUR EMPLOYEES</H1>
        <table border="3">
            <thead>
                <th>ID</th>
                <TH>NAME</TH>
                <TH>E-MAIL</TH>
                <TH>DEPARTMENT</TH>
                <TH>POSITION</TH>
            </thead>
            <?php
//if(isset($_POST['employees'])){
    $query = "SELECT * FROM `employees`";
    $runquery = mysqli_query($conn , $query); 
    while($item = mysqli_fetch_array($runquery)){
        ?>
                <tr>
                <td><?php echo $item["ID"]; ?></td>
                <td><?php echo $item["NAME"]; ?></td>
                <td><?php echo $item["E-MAIL"]; ?></td>
                <td><?php echo $item["DEPARTMENT"]; ?></td>
                <td><?php echo $item["POSITION"]; ?></td>
                </tr>
    <?php
    }
   // }
    ?>
    </body>
    </html>