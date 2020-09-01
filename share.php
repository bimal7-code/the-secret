<?php 
require_once("includes/header.php");
require_once("includes/classes/videoForm.php"); 
?>


<div class="column">

    <?php
    
    $fp = new videoForm($con);
    echo $fp->createUploadForm();
    echo uniqid();

    $query = $con->prepare("SELECT * FROM categories");
    $query->execute();
    
    ?>

</div>


<?php require_once("includes/footer.php"); ?>