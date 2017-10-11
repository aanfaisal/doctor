<?php
/* 
 * Proses mining function
 */

$time_start = microtime(true);

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
$table = "prediksi";

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
$sql = "INSERT INTO prediksi (Gender, Umur, Bdahak, BBTurun, Keringat, BDarah, DemamL, SesakN, NyeriD) VALUES ('$kelamin', '$umur', '$bd','$bb','$keringat','$bdrah','$demam','$nafas','$nyeri')";

$db_object->db_query($sql);

?>

<?php
 
 include_once "header.php";
 include_once "form.php";
 include_once "footer.php";
?>

<?php
function display_mining($db_object) {
//    ?>
        <?php ?>

    <?php
    $sql1 = "SELECT * FROM prediksi";//. " ORDER BY lolos DESC";
    $query1 = $db_object->db_query($sql1);
    ?>
    Data Masuk :
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
        <th>Klasifikasi?</th>
        </tr>
        <?php
            $no=1;
            while($row=$db_object->db_fetch_array($query1)){
                    echo "<tr>";
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
                    echo "<td>".$row['Klasifikasi']."</td>";
                echo "</tr>";
                $no++;
            }
            ?>
    </table>

    <?php
}
?>