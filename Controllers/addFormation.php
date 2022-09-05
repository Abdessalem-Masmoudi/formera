<?php 
    include_once '..\Model\Class\formation.class.php';
    $e=new Formation();
    $e->Desigation=$_POST['Desigation'];
    $e->Prix=$_POST['Prix'];
    $e->Caracteristique=$_POST['Caracteristique'];
    $e->description=$_POST['description'];
    $image_file = $_FILES["Image"];
    if (!isset($image_file)) {
        die('No file uploaded.');
    }
    
    // Move the temp image file to the images/ directory
    move_uploaded_file(
        // Temp image location
        $image_file["tmp_name"],
    
        // New image location, __DIR__ is the location of the current PHP file
       "../views/user/images/formation/" . $image_file["name"]

    );
    $e->Image =  $image_file["name"];
    $e->insertion($e);
   header("location:../views/user/formation.php");
?>
