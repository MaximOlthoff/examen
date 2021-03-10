<?php
if(isset($_GET['ID'])) {
    require_once "db/connect.php";
    $ID = mysqli_real_escape_string($conn, $_GET['ID']);
    
    $sql    = "SELECT * FROM tb_film WHERE filmid='$ID' ";
    $result = mysqli_query($conn, $sql) or die("bad query: $sql");
    $row    = mysqli_fetch_array($result);

    $result =mysqli_query($conn, $sql) or die("bad query: $sql");

} else  {
    header('location: index.php');
}
?>

<?php  echo "<h1>" .$row['titel']. "</h1>";?>
<?php  echo "<h2>" .$row['beschrijving']. "</h2>";?>
<img src="images/<?php echo $row['foto']?>" id='mainImg'>

<?php
echo "<br><br>";
echo "<Button onclick=location.href='locatie.php?ID={$row['filmid']}'>reserveren</button>";
?>
