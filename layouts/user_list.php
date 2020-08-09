<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        $file = fopen('../php/user.txt', 'r');
        $data = fread($file, filesize('../php/user.txt'));
        $user = explode('|', $data);
    ?>
    <table>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>User Type</th>
        <?php
            $i = 0;
            while( $row = mysqli_fetch_assoc($allStd) ){
                $id       = $row['id'];
                $name     = $row['name'];
                $email    = $row['email'];
                $phone    = $row['phone'];
                $address  = $row['address'];
                $joindate = $row['joindate'];
                $i++;
        ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $joindate; ?></td>
                </tr>

        <?php  } 
        ?>
    </table>
</body>
</html>