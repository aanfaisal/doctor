<!DOCTYPE html>
<html lang="en"> 

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tuberkulosis</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    

</head>
<body>
<?php
include_once "database.php";
if(isset($_POST['submit'])){
    
    //object database class
    $db_object = new database();

    $pesan_error = $pesan_success = "";
    if(isset($_GET['pesan_error'])){
        $pesan_error = $_GET['pesan_error'];
    }
    if(isset($_GET['pesan_success'])){
        $pesan_success = $_GET['pesan_success'];
    }
    $table = "prediksi";

    $id = "1";
    $kelamin = $_POST['kelamin'];
    $umur = $_POST['umur'];
    $bd = $_POST['bd'];
    $bb = $_POST['bb'];
    $keringat = $_POST['keringat'];
    $bdrah = $_POST['bdrah'];
    $demam = $_POST['demam'];
    $nafas = $_POST['nafas'];
    $nyeri = $_POST['nyeri'];

    //Memasukkan data
    $sql = "UPDATE prediksi SET Gender = '$kelamin',Umur = '$umur',Bdahak = '$bd',BBTurun = '$bb',Keringat = '$keringat',BDarah = '$bdrah',DemamL = '$demam',SesakN = '$nafas',NyeriD = '$nyeri' WHERE ID = $id";
                                            
                                
    //$sql = "INSERT INTO prediksi (Gender, Umur, Bdahak, BBTurun, Keringat, BDarah, DemamL, SesakN, NyeriD) VALUES ('$kelamin', '$umur', '$bd','$bb','$keringat','$bdrah','$demam','$nafas','$nyeri')";

    $db_object->db_query($sql);

}
?>

<?php

 include_once "header.php"; 

 include_once "form.php"; 
?>

<?php

include_once "database.php";
    
    //object database class
    $db_object = new database();

    $pesan_error = $pesan_success = "";
    if(isset($_GET['pesan_error'])){
        $pesan_error = $_GET['pesan_error'];
    }
    if(isset($_GET['pesan_success'])){
        $pesan_success = $_GET['pesan_success'];
    }
    
    $sql1 = "SELECT * FROM prediksi";//. " ORDER BY lolos DESC";
    $query1 = $db_object->db_query($sql1);
    ?>
    <br><br><br><center><h1>Data Prediksi</h1></center>
    
    <table class='table table-bordered table-striped  table-hover'>
        <tr>
        <th>ID</th>
        <th>Gender</th>
        <th>Umur</th>
        <th>Berdahak?</th>
        <th>BB Turun?</th>
        <th>Keringat?</th>
        <th>Batuk Darah?</th>
        <th>Sesak Nafas?</th>
        <th>Nyeri?</th>
        </tr>
        <?php
            $no=1;
            while($row=$db_object->db_fetch_array($query1)){
                    
                    echo "<td>".$no."</td>";
                    echo "<td>".$row['Gender']."</td>";
                    echo "<td>".$row['Umur']."</td>";
                    echo "<td>".$row['Bdahak']."</td>";
                    echo "<td>".$row['BBTurun']."</td>";
                    echo "<td>".$row['Keringat']."</td>";
                    echo "<td>".$row['BDarah']."</td>";
                    echo "<td>".$row['DemamL']."</td>";
                    echo "<td>".$row['SesakN']."</td>";
                    echo "<td>".$row['NyeriD']."</td>";
            }
            ?>
    </table>
    <br>
    <center>
            <div>
                <a href="mining.php"><button type="" name="submit" class="btn btn-success btn-lg">P r e d i k s i</button></a>
            </div>
        </center>
        <br>
<?php
 include_once "footer.php"; 
?>
</body>
</html>

