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

 include_once "header.php"; 

 include_once "form.php"; 
?>
<?php

/* 
 * Proses mining
 */

include "database.php";
include "conn.php";
include 'fungsi.php';

//object database class
	$db_object = new database();

	$pesan_error = $pesan_success = "";
	if(isset($_GET['pesan_error'])){
	    $pesan_error = $_GET['pesan_error'];
	}
	if(isset($_GET['pesan_success'])){
	    $pesan_success = $_GET['pesan_success'];
	}
	$table = "data";
	$table2 = 'prediksi';

	$kelamin = mysql_result(mysql_query("SELECT Gender FROM `prediksi` LIMIT 1"),0);
	$umur = mysql_result(mysql_query("SELECT Umur FROM `prediksi` LIMIT 1"),0);
	$bd = mysql_result(mysql_query("SELECT Bdahak FROM `prediksi` LIMIT 1"),0);
	$bb = mysql_result(mysql_query("SELECT BBTurun FROM `prediksi` LIMIT 1"),0);
	$keringat = mysql_result(mysql_query("SELECT Keringat FROM `prediksi` LIMIT 1"),0);
	$bdrah = mysql_result(mysql_query("SELECT BDarah FROM `prediksi` LIMIT 1"),0);
	$demam = mysql_result(mysql_query("SELECT DemamL FROM `prediksi` LIMIT 1"),0);
	$nafas = mysql_result(mysql_query("SELECT SesakN FROM `prediksi` LIMIT 1"),0);
	$nyeri = mysql_result(mysql_query("SELECT NyeriD FROM `prediksi` LIMIT 1"),0);

	//Variabel PR=Paru Ringan, PK=Paru Kuat dan N=Negatif PPN=Semua Data
	//Tahap 1 menghitung jumlah class/label
	$jumdat_PR = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Klasifikasi LIKE '%Paru Ringan' "),0);
	$jumdat_PK = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Klasifikasi LIKE '%Paru Kuat' "),0);
	$jumdat_N = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Klasifikasi LIKE '%Negatif' "),0);
	$jumdat_PPN = mysql_result(mysql_query("SELECT COUNT(*) FROM data"),0);

	//Tahap 2 menghitung jumlah data
	$jk_PR = ($jumdat_PR/$jumdat_PPN);
	$jk_PK = ($jumdat_PK/$jumdat_PPN);
	$jk_N = ($jumdat_N/$jumdat_PPN);
	
	//echo $jumdat_PR."/".$jumdat_PPN."=".$jk_PR;

	//Tahap 3 Laki/Perempuan yang Kena Penyakit
	$jk_Lr = mysql_result(mysql_query("SELECT COUNT(Gender) FROM data WHERE Gender LIKE '%$kelamin' && Klasifikasi LIKE '%Paru Ringan' "),0);
	$jk_Lk = mysql_result(mysql_query("SELECT COUNT(Gender) FROM data WHERE Gender LIKE '%$kelamin' && Klasifikasi LIKE '%Paru Kuat' "),0);
	$jk_Ln = mysql_result(mysql_query("SELECT COUNT(Gender) FROM data WHERE Gender LIKE '%$kelamin' && Klasifikasi LIKE '%Negatif' "),0);

	$jumdat_Lr = ($jk_Lr/$jumdat_PR);
	$jumdat_Lk = ($jk_Lk/$jumdat_PK);
	$jumdat_Ln = ($jk_Ln/$jumdat_N);
//Perempuan yang Kena Penyakit
//	$jk_Pr = mysql_result(mysql_query("SELECT COUNT(Gender) FROM data WHERE Gender LIKE '%2' && Klasifikasi LIKE '%Paru Ringan' "),0);
//	$jk_Pk = mysql_result(mysql_query("SELECT COUNT(Gender) FROM data WHERE Gender LIKE '%2' && Klasifikasi LIKE '%Paru Kuat' "),0);
//	$jk_Pn = mysql_result(mysql_query("SELECT COUNT(Gender) FROM data WHERE Gender LIKE '%2' && Klasifikasi LIKE '%Negatif' "),0);

	//Tahap 4 Umur Yang terkena
	$jk_Ur = mysql_result(mysql_query("SELECT COUNT(Umur) FROM data WHERE Umur LIKE '%$umur' && Klasifikasi LIKE '%Paru Ringan' "),0);
	$jk_Uk = mysql_result(mysql_query("SELECT COUNT(Umur) FROM data WHERE Umur LIKE '%$umur' && Klasifikasi LIKE '%Paru Kuat' "),0);
	$jk_Un = mysql_result(mysql_query("SELECT COUNT(Umur) FROM data WHERE Umur LIKE '%$umur' && Klasifikasi LIKE '%Negatif' "),0);

	$jumdat_Ur = ($jk_Ur/$jumdat_PR);
	$jumdat_Uk = ($jk_Uk/$jumdat_PK);
	$jumdat_Un = ($jk_Un/$jumdat_N);

	//Tahap 5 Dahak Ya
	$jk_Dr = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Bdahak LIKE '%$bd' && Klasifikasi LIKE '%Paru Ringan' "),0);
	$jk_Dk = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Bdahak LIKE '%$bd' && Klasifikasi LIKE '%Paru Kuat' "),0);
	$jk_Dn = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Bdahak LIKE '%$bd' && Klasifikasi LIKE '%Negatif' "),0);

	$jumdat_Dr = ($jk_Dr/$jumdat_PR);
	$jumdat_Dk = ($jk_Dk/$jumdat_PK);
	$jumdat_Dn = ($jk_Dn/$jumdat_N);
	//Dahak Tidak
//	$jk_Dtr = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Bdahak LIKE '%0' && Klasifikasi LIKE '%Paru Ringan' "),0);
//	$jk_Dtk = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Bdahak LIKE '%0' && Klasifikasi LIKE '%Paru Kuat' "),0);
//	$jk_Dtn = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Bdahak LIKE '%0' && Klasifikasi LIKE '%Negatif' "),0);

	//Tahap 6 BBturun Ya/Tidak
	$jk_BBr = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BBturun LIKE '%$bb' && Klasifikasi LIKE '%Paru Ringan' "),0);
	$jk_BBk = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BBturun LIKE '%$bb' && Klasifikasi LIKE '%Paru Kuat' "),0);
	$jk_BBn = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BBturun LIKE '%$bb' && Klasifikasi LIKE '%Negatif' "),0);

	$jumdat_BBr = ($jk_BBr/$jumdat_PR);
	$jumdat_BBk = ($jk_BBk/$jumdat_PK);
	$jumdat_BBn = ($jk_BBn/$jumdat_N);	
	//BBturun Tidak
//	$jk_BBtr = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BBturun LIKE '%0' && Klasifikasi LIKE '%Paru Ringan' "),0);
//	$jk_BBtk = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BBturun LIKE '%0' && Klasifikasi LIKE '%Paru Kuat' "),0);
//	$jk_BBtn = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BBturun LIKE '%0' && Klasifikasi LIKE '%Negatif' "),0);
	
	//Tahap 7 Keringat Berlebih Ya/Tidak
	$jk_Kr = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Keringat LIKE '%$keringat' && Klasifikasi LIKE '%Paru Ringan' "),0);
	$jk_Kk = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Keringat LIKE '%$keringat' && Klasifikasi LIKE '%Paru Kuat' "),0);
	$jk_Kn = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Keringat LIKE '%$keringat' && Klasifikasi LIKE '%Negatif' "),0);

	$jumdat_Kr = ($jk_Kr/$jumdat_PR);
	$jumdat_Kk = ($jk_Kk/$jumdat_PK);
	$jumdat_Kn = ($jk_Kn/$jumdat_N);	
	//Keringat Tidak
//	$jk_Ktr = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Keringat LIKE '%0' && Klasifikasi LIKE '%Paru Ringan' "),0);
//	$jk_Ktk = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Keringat LIKE '%0' && Klasifikasi LIKE '%Paru Kuat' "),0);
//	$jk_Ktn = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE Keringat LIKE '%0' && Klasifikasi LIKE '%Negatif' "),0);
	
	//Tahap 8 Batuk Darah Ya/Tidak
	$jk_BDr = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BDarah LIKE '%$bdrah' && Klasifikasi LIKE '%Paru Ringan' "),0);
	$jk_BDk = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BDarah LIKE '%$bdrah' && Klasifikasi LIKE '%Paru Kuat' "),0);
	$jk_BDn = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BDarah LIKE '%$bdrah' && Klasifikasi LIKE '%Negatif' "),0);

	$jumdat_BDr = ($jk_BDr/$jumdat_PR);
	$jumdat_BDk = ($jk_BDk/$jumdat_PK);
	$jumdat_BDn = ($jk_BDn/$jumdat_N);	
	//Batuk Darah Tidak
//	$jk_Ktr = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BDarah LIKE '%0' && Klasifikasi LIKE '%Paru Ringan' "),0);
//	$jk_Ktk = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BDarah LIKE '%0' && Klasifikasi LIKE '%Paru Kuat' "),0);
//	$jk_Ktn = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BDarah LIKE '%0' && Klasifikasi LIKE '%Negatif' "),0);

	//Tahap 9 Demam Lama Ya/Tidak
	$jk_DLr = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE DemamL LIKE '%$demam' && Klasifikasi LIKE '%Paru Ringan' "),0);
	$jk_DLk = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BDarah LIKE '%$demam' && Klasifikasi LIKE '%Paru Kuat' "),0);
	$jk_DLn = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BDarah LIKE '%$demam' && Klasifikasi LIKE '%Negatif' "),0);
	
	$jumdat_DLr = ($jk_DLr/$jumdat_PR);
	$jumdat_DLk = ($jk_DLk/$jumdat_PK);
	$jumdat_DLn = ($jk_DLn/$jumdat_N);	
	
	//Tahap 9 Sesak Nafas Ya/Tidak
	$jk_Nr = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE DemamL LIKE '%$nafas' && Klasifikasi LIKE '%Paru Ringan' "),0);
	$jk_Nk = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BDarah LIKE '%$nafas' && Klasifikasi LIKE '%Paru Kuat' "),0);
	$jk_Nn = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BDarah LIKE '%$nafas' && Klasifikasi LIKE '%Negatif' "),0);

	$jumdat_Nr = ($jk_Nr/$jumdat_PR);
	$jumdat_Nk = ($jk_Nk/$jumdat_PK);
	$jumdat_Nn = ($jk_Nn/$jumdat_N);

	//Tahap 9 Nyeri Ya/Tidak
	$jk_Nyr = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE DemamL LIKE '%$nyeri' && Klasifikasi LIKE '%Paru Ringan' "),0);
	$jk_Nyk = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BDarah LIKE '%$nyeri' && Klasifikasi LIKE '%Paru Kuat' "),0);
	$jk_Nyn = mysql_result(mysql_query("SELECT COUNT(*) FROM data WHERE BDarah LIKE '%$nyeri' && Klasifikasi LIKE '%Negatif' "),0);

	$jumdat_Nyr = ($jk_Nyr/$jumdat_PR);
	$jumdat_Nyk = ($jk_Nyk/$jumdat_PK);
	$jumdat_Nyn = ($jk_Nyn/$jumdat_N);
	
	//Tahap Akhir : Kalikan Semua Kemungkinan
	//paru ringan
	$jumdat_X = ($jumdat_Lr*$jumdat_Ur*$jumdat_Dr*$jumdat_BBr*$jumdat_Kr*$jumdat_BDr*$jumdat_DLr*$jumdat_Nr*$jumdat_Nyr);
	//paru kuat
	$jumdat_Y = ($jumdat_Lk*$jumdat_Uk*$jumdat_Dk*$jumdat_BBk*$jumdat_Kk*$jumdat_BDk*$jumdat_DLk*$jumdat_Nk*$jumdat_Nyk);
	//Negatif
	$jumdat_Z =($jumdat_Ln*$jumdat_Un*$jumdat_Dn*$jumdat_BBn*$jumdat_Kn*$jumdat_BDn*$jumdat_DLn*$jumdat_Nn*$jumdat_Nyn);

	//Tahap akhir banget :p
	//paru ringan
	$hasil_X = ($jumdat_X*$jk_PR);
	//paru kuat
	$hasil_Y = ($jumdat_Y*$jk_PK);
	//Negatif
	$hasil_Z = ($jumdat_Z*$jk_N);


?>
<!-- mining section -->
	<section class="" style="" id="edukasi">
		<div class="container">
			<div class="col-md-12">
				<div>
				

	<center><h4>P(X|Ci) = P(Ci) Untuk i=1,2,3 P(Ci) Prior probability pada setiap class</h4></center>
	<p>P(hasil_lab = “Paru Ringan”) = <?php echo $jumdat_PR."/".$jumdat_PPN." = ".$jk_PR ?> </p>
	<br>
	<p>P(hasil_lab = “Paru Kuat”) = <?php echo $jumdat_PK."/".$jumdat_PPN." = ".$jk_PK ?> </p>
	<br>
	<p>P(hasil_lab = “Negatif”) = <?php echo $jumdat_N."/".$jumdat_PPN." = ".$jk_N ?> </p>
	<br>
	<p>P(L/P= “<?php echo $kelamin ?>”|hasil_lab = “Paru Ringan”) = <?php echo $jk_Lr."/".$jumdat_PR." = ".$jumdat_Lr ?> </p>
	<br>
	<p>P(L/P= “<?php echo $kelamin ?>”|hasil_lab = “Paru Kuat) = <?php echo $jk_Lk."/".$jumdat_PK." = ".$jumdat_Lk ?> </p>
	<br>
	<p>P(L/P= “<?php echo $kelamin ?>”|hasil_lab = “Negatif”) = <?php echo $jk_Ln."/".$jumdat_N." = ".$jumdat_Ln ?> </p>
	<br>
	<p>P(Umur= “<?php echo $umur ?>”|hasil_lab = “Paru Ringan”) = <?php echo $jk_Ur."/".$jumdat_PR." = ".$jumdat_Ur ?> </p>
	<br>
	<p>P(Umur= “<?php echo $umur ?>”|hasil_lab = “Paru Kuat) = <?php echo $jk_Uk."/".$jumdat_PK." = ".$jumdat_Uk ?> </p>
	<br>
	<p>P(Umur= “<?php echo $umur ?>”|hasil_lab = “Negatif”) = <?php echo $jk_Un."/".$jumdat_N." = ".$jumdat_Un ?> </p>
	<br>
	<p>P(BB(± 3 M)= “<?php echo $bd ?>”|hasil_lab = “Paru Ringan”) = <?php echo $jk_Dr."/".$jumdat_PR." = ".$jumdat_Dr ?> </p>
	<br>
	<p>P(BB(± 3 M)= “<?php echo $bd ?>”|hasil_lab = “Paru Kuat) = <?php echo $jk_Dk."/".$jumdat_PK." = ".$jumdat_Dk ?> </p>
	<br>
	<p>P(BB(± 3 M)= “<?php echo $bd ?>”|hasil_lab = “Negatif”) = <?php echo $jk_Dn."/".$jumdat_N." = ".$jumdat_Dn ?> </p>
	<br>
	<p>P(BBM= “<?php echo $bb ?>”|hasil_lab = “Paru Ringan”) = <?php echo $jk_BBr."/".$jumdat_PR." = ".$jumdat_BBr ?> </p>
	<br>
	<p>P(BBM= “<?php echo $bb ?>”|hasil_lab = “Paru Kuat) = <?php echo $jk_BBk."/".$jumdat_PK." = ".$jumdat_BBk ?> </p>
	<br>
	<p>P(BBM= “<?php echo $bb ?>”|hasil_lab = “Negatif”) = <?php echo $jk_BBn."/".$jumdat_N." = ".$jumdat_BBn ?> </p>
	<br>
	<p>P(KDH= “<?php echo $keringat ?>”|hasil_lab = “Paru Ringan”) = <?php echo $jk_Kr."/".$jumdat_PR." = ".$jumdat_Kr ?> </p>
	<br>
	<p>P(KDH= “<?php echo $keringat ?>”|hasil_lab = “Paru Kuat) = <?php echo $jk_Kk."/".$jumdat_PK." = ".$jumdat_Kk ?> </p>
	<br>
	<p>P(KDH= “<?php echo $keringat ?>”|hasil_lab = “Negatif”) = <?php echo $jk_Kn."/".$jumdat_N." = ".$jumdat_Kn ?> </p>
	<br>
	<p>P(BD= “<?php echo $bdrah ?>”|hasil_lab = “Paru Ringan”) = <?php echo $jk_BDr."/".$jumdat_PR." = ".$jumdat_BDr ?> </p>
	<br>
	<p>P(BD= “<?php echo $bdrah ?>”|hasil_lab = “Paru Kuat) = <?php echo $jk_BDk."/".$jumdat_PK." = ".$jumdat_BDk ?> </p>
	<br>
	<p>P(BD= “<?php echo $bdrah ?>”|hasil_lab = “Negatif”) = <?php echo $jk_BDn."/".$jumdat_N." = ".$jumdat_BDn ?> </p>
	<br>
	<p>P(DL= “<?php echo $demam ?>”|hasil_lab = “Paru Ringan”) = <?php echo $jk_DLr."/".$jumdat_PR." = ".$jumdat_DLr ?> </p>
	<br>
	<p>P(DL= “<?php echo $demam ?>”|hasil_lab = “Paru Kuat) = <?php echo $jk_DLk."/".$jumdat_PK." = ".$jumdat_DLk ?> </p>
	<br>
	<p>P(DL= “<?php echo $demam ?>”|hasil_lab = “Negatif”) = <?php echo $jk_DLn."/".$jumdat_N." = ".$jumdat_DLn ?> </p>
	<br>
	<p>P(SN= “<?php echo $nafas ?>”|hasil_lab = “Paru Ringan”) = <?php echo $jk_Nr."/".$jumdat_PR." = ".$jumdat_Nr ?> </p>
	<br>
	<p>P(SN= “<?php echo $nafas ?>”|hasil_lab = “Paru Kuat) = <?php echo $jk_Nk."/".$jumdat_PK." = ".$jumdat_Nk ?> </p>
	<br>
	<p>P(SN= “<?php echo $nafas ?>”|hasil_lab = “Negatif”) = <?php echo $jk_Nn."/".$jumdat_N." = ".$jumdat_Nn ?> </p>
	<br>
	<p>P(ND= “<?php echo $nyeri ?>”|hasil_lab = “Paru Ringan”) = <?php echo $jk_Nyr."/".$jumdat_PR." = ".$jumdat_Nyr ?> </p>
	<br>
	<p>P(ND= “<?php echo $nyeri ?>”|hasil_lab = “Paru Kuat) = <?php echo $jk_Nyk."/".$jumdat_PK." = ".$jumdat_Nyk ?> </p>
	<br>
	<p>P(ND= “<?php echo $nyeri ?>”|hasil_lab = “Negatif”) = <?php echo $jk_Nyn."/".$jumdat_N." = ".$jumdat_Nyn ?> </p>
	<br>
	<h4>Kalikan Semua Kemungkinan</h4>
	<p>P(X= |hasil_lab = “Paru Ringan”) = <?php echo $jumdat_Lr."*".$jumdat_Ur."*".$jumdat_Dr."*".$jumdat_BBr."*".$jumdat_Kr."*".$jumdat_BDr."*".$jumdat_DLr."*".$jumdat_Nr."*".$jumdat_Nyr." = ".$jumdat_X ?> </p>
	<br>
	<p>P(X= |hasil_lab = “Paru Kuat) = <?php echo $jumdat_Lk."*".$jumdat_Uk."*".$jumdat_Dk."*".$jumdat_BBk."*".$jumdat_Kk."*".$jumdat_BDk."*".$jumdat_DLk."*".$jumdat_Nk."*".$jumdat_Nyk." = ".$jumdat_Y ?> </p>
	<br>
	<p>P(X= |hasil_lab = “Negatif”) = <?php echo $jumdat_Ln."*".$jumdat_Un."*".$jumdat_Dn."*".$jumdat_BBn."*".$jumdat_Kn."*".$jumdat_BDn."*".$jumdat_DLn."*".$jumdat_Nn."*".$jumdat_Nyn." = ".$jumdat_Z ?> </p>
	<br>
	<h4>Hasil Akhir</h4>
	<p>P(X|hasil_lab= “Paru Ringan”)*P(hasil_lab= “Paru Ringan”) = <?php echo $jumdat_X."*".$jk_PR." = ".$hasil_X ?> </p>
	<br>
	<p>P(X|hasil_lab= “Paru Kuat”)*P(hasil_lab= “Paru Kuat”) = <?php echo $jumdat_Y."*".$jk_PK." = ".$hasil_Y ?> </p>
	<br>
	<p>P(X|hasil_lab = “Negatif”)*P(hasil_lab= “Negatif”) = <?php echo $jumdat_Z."*".$jk_N." = ".$hasil_Z ?> </p>
	<br>

	
	
	<?php
	if ($jumdat_X = $jumdat_Y = $jumdat_Z) {
    	echo "Dari perhitungan diatas,Nilai probabilitas terbesar diperoleh pada kelas “Paru Kuat” dengan nilai $jumdat_X dan dapat disimpulkan identifikasi tuberkulosis sejak dini mengacu pada “Paru Kuat”";
	}
	else if ($jumdat_X = $jumdat_Y = $jumdat_Z) {
		echo "Dari perhitungan diatas,Nilai probabilitas terbesar diperoleh pada kelas “Paru Ringan” dengan nilai $jumdat_Y dan dapat disimpulkan identifikasi tuberkulosis sejak dini mengacu pada “Paru Ringan”";
	}
	else if ($jumdat_X = $jumdat_Y = $jumdat_Z) {
		echo "Dari perhitungan diatas,Nilai probabilitas terbesar diperoleh pada kelas “Negatif” dengan nilai $jumdat_Z dan dapat disimpulkan identifikasi tuberkulosis sejak dini mengacu pada “Negatif”";
	}
	?>

			</div>
		</div>
	</div>
</section>
<!-- end of mining section -->

<?php
 include_once "footer.php"; 
?>
</body>
</html>