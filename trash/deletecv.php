<?php

	//$id_num = (isset($_REQUEST['id']) ? $_REQUEST['id'] : '');
	//$act = (isset($_REQUEST['action']) ? $_REQUEST['action'] : '');
	
	//CONNECTION INFO
	$servername = "localhost";
	$username = "root";
	$password  = "";
	$dbname = "sv";
	
	//CONNECT
	$conn4 = new mysqli($servername, $username, $password, $dbname);
	/*
	if (isset($_POST['action'])) {echo $_POST['action']; }
	if (isset($_POST['id'])) {echo $_POST['id']; }
	
	if (isset($_POST['action'])) {
		
		switch ($_POST['action']) {
			
			case 'delete-cv':
				delete_cv($_POST['id']);
				echo"anan";

				break;
				
			case 'edit-cv':
				edit_cv();
				break;
		}
		
	}
	*/
	
	//function delete_cv($id) {
		$id_n = $_REQUEST['id'];
		
		$delete_deneyim = "DELETE FROM deneyim WHERE id = '".$id_n."' ";
		$delete_iletisim = "DELETE FROM iletisim WHERE id = '".$id_n."' ";
		$delete_dil = "DELETE FROM dil WHERE id = '".$id_n."' ";
		$delete_egitim = "DELETE FROM egitim WHERE id = '".$id_n."' ";
		$delete_referans = "DELETE FROM referans WHERE id = '".$id_n."' ";
		$delete_profil = "DELETE FROM profil WHERE id = '".$id_n."' ";
		
		if ($conn4->query($delete_deneyim) === TRUE) {
			echo "DENEYIM Record deleted successfully<br>";
		} else {
			echo "Error deleting record: " . $conn4->error;
		}
		
		if ($conn4->query($delete_iletisim) === TRUE) {
			echo "ILETISIM Record deleted successfully<br>";
		} else {
			echo "Error deleting record: " . $conn4->error;
		}
		
		if ($conn4->query($delete_dil) === TRUE) {
			echo "DIL Record deleted successfully<br>";
		} else {
			echo "Error deleting record: " . $conn4->error;
		}
		
		if ($conn4->query($delete_egitim) === TRUE) {
			echo "EGITIM Record deleted successfully<br>";
		} else {
			echo "Error deleting record: " . $conn4->error;
		}
		
		if ($conn4->query($delete_referans) === TRUE) {
			echo "REFERANS Record deleted successfully<br>";
		} else {
			echo "Error deleting record: " . $conn4->error;
		}
		
		if ($conn4->query($delete_profil) === TRUE) {
			echo " PROFİL Record deleted successfully<br>";
		} else {
			echo "Error deleting record: " . $conn4->error;
		}
		
		/*
		mysqli_query($conn4, "DELETE FROM deneyim WHERE id = '".$id_n."' ");
		mysqli_query($conn4, "DELETE FROM iletisim WHERE id = '".$id_n."' ");
		mysqli_query($conn4, "DELETE FROM dil WHERE id = '".$id_n."' ");
		mysqli_query($conn4, "DELETE FROM egitim WHERE id = '".$id_n."' ");
		mysqli_query($conn4, "DELETE FROM referans WHERE id = '".$id_n."' ");
		mysqli_query($conn4, "DELETE FROM profil WHERE id = '".$id_n."' ");
		*/

	//}
?>