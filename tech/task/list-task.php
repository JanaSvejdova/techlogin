<?php 

include('config/constants.php'); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo SITEURL;?>css/style.css">
    <title>list task</title>
</head>
<body>
<div class="wrapper">

<h1> list task </h1>

<div class="menu">
<a href="<?php echo SITEURL; ?>">Home</a>
<?php 
$conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die();

$db_select2 = mysqli_select_db($conn2, DB_NAME) or die();

$sql2 = "SELECT * FROM rok_202201";
$res2 = mysqli_query($conn2, $sql2);

if($res2==true) {
    while($row2=mysqli_fetch_assoc($res2)) {
        $ID = $row2['ID'];
        $NAZEV_POZADOVANEHO_ZBOZI = $row2['NAZEV_POZADOVANEHO_ZBOZI'];
        $PRIORITA_NAKUPU = $row2['PRIORITA_NAKUPU'];
        ?> 
        <a href="<?php echo SITEURL; ?>list-task.php?id=<?php echo $ID ; ?>"><?php echo $PRIORITA_NAKUPU ;?></a>   
      
        <?php 
    }
}

?>


<a href="<?php echo SITEURL; ?>manage-list.php">Manage list</a>
</div>

<div class="all_task">
    <a class="btn-primary" href="<?php echo SITEURL; ?>add-task.php"> add task </a>
 <table class="tbl_full">
    <tr>
        <th>S.N.</th>
        <th>Task Name</th>
        <th>Priority</th>
        <th>Deadline</th>
        <th>Actions</th>
    </tr>
    <?php 
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die();
    $db_select = mysqli_select_db($conn, DB_NAME) or die();

    $sql = "SELECT * FROM rok_202201 WHERE PRIORITA_NAKUPU=$PRIORITA_NAKUPU ";

    $res = mysqli_query($conn, $sql);

    if($res==true) {

        $count_rows = mysqli_num_rows($res);
        if($count_rows>0) {
                while($row=mysqli_fetch_assoc($res)) {
                    $ID = $row['ID'];
                    $NAZEV_POZADOVANEHO_ZBOZI = $row['NAZEV_POZADOVANEHO_ZBOZI'];
                    $PRIORITA_NAKUPU = $row['PRIORITA_NAKUPU'];
                    $POZNAMKA = $row['POZNAMKA'];
                    ?> 
                      <tr>
                        <td>1.</td>
                        <td><?php echo $NAZEV_POZADOVANEHO_ZBOZI; ?> </td>
                        <td><?php echo $PRIORITA_NAKUPU; ?></td>
                        <td><?php echo $POZNAMKA; ?></td>
                        <td>
                        <a href="<?php echo SITEURL; ?>update-task.php?id=<?php echo $ID; ?>">Update</a>
                        </td>
                    </tr>


                    <?php 

                }
        } else {
            ?> 

            <tr>
                <td colspan="5">No task added on this list</td>
            </tr>

            <?php 
        }
    }
    ?>
  
 </table>
</div>
</div>


</body>
</html>