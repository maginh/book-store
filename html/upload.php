<?php
// Include the database configuration file
include 'strconn.php';

$title=$_REQUEST['title'];
$desc=$_REQUEST['desc'];
$dataP=$_REQUEST['dataP'];
$numeroP=$_REQUEST['numeroP'];
$statusMsg = '';
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

// File upload path

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            //$query="INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())";
            //$tab=$dbconn->query($query);


            $insert = $dbconn->query("INSERT INTO libri (titolo, descrizione, dataP, file, nPagine) VALUES ('{$title}', '{$desc}', '{$dataP}', '".$fileName."', {$numeroP})");
            if($insert){
                $statusMsg = "Caricamento avvenuto con successo!";
            }else{
                $statusMsg = "Caricamento non avvenuto";
            }
        }else{
            $statusMsg = "C'è stato un errore durante l'upload del file";
        }
    }else{
        $statusMsg = 'Scusate, solo JPG, JPEG, PNG, GIF, & PDF files sono ammessi.';
    }
}else{
    $statusMsg = 'Perfavore scegli il file da caricare';
}

// Display status message
echo $statusMsg;
?>
