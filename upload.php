<?php
  if(isset($_POST["upload"]))
  {
      $temp = "upload/";
      if (!file_exists($temp))
        mkdir($temp);

      $fileupload      = $_FILES['fileupload']['tmp_name'];
      $ImageName       = $_FILES['fileupload']['name'];
      $ImageType       = $_FILES['fileupload']['type'];

      if (!empty($fileupload)){
        // mengacak angka untuk nama file
        $acak = rand(00000000, 99999999);

        $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
        $ImageExt       = str_replace('.','',$ImageExt); // Extension
        $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
        $NewImageName   = $acak.'.'.$ImageExt;

        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp.$NewImageName); // Menyimpan file

        echo "<script>alert('Berhasil diupload'); location='index.php'</script>";
      }
  }
?>
