<?php
function BMI($weight, $height) {
    $bmi = $weight / pow($height, 2);
    $bmi = round($bmi, 2);
    return $bmi;
}

function ArrangeFileArray(&$file_post) {
    $file_arr = array();
    $file_count = count($file_post["name"]);
    $file_keys = array_keys($file_post);
    
    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_arr[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_arr;
}

function AddFileToDirectory(&$file_array){
    foreach ($file_array as $file) {
        move_uploaded_file($file["tmp_name"], './upload/'.$file["name"]);
    }
}

function CheckUploadImageType(&$file_array){
    $image_type = array('gif', 'png', 'jpg');
    foreach ($file_array as $file) {
        $type = pathinfo($file['name'], PATHINFO_EXTENSION);
        if(!in_array($type, $image_type)){
            return 1;
        }
    }
    return 0;
}

extract($_POST);
$file_array = ArrangeFileArray($_FILES["image_uploads"]);
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./src/styles.css">
</head>

<body>
    <form action="Upload.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="height">
                Height:
            </label>
            <input type="text" name="height" id="height">
            <br>
            <label for="weight">
                Weight:
            </label>
            <input type="text" name="weight" id="weight">
            <br>
        </div>
        <div>
            <label for="image_uploads">
                Choose images to upload
            </label>
            <input type="file" multiple="multiple" name="image_uploads[]" id="image_uploads">
            <br>
        </div>
        <div class="preview">
            <p>No files currently selected for upload</p>
        </div>
        <div class="container-submit">
            <input type="submit" name="submit" value="Submit" class="button">
        </div>
    </form>

    <div class="container flex-column" id="result">
        <?php 
            if(isset($_POST['submit'])){
                echo '<div class="container flex-column" id="bmi">';
                echo '<h1>BMI</h1>';
                if($_POST['weight'] != NULL && $_POST['height'] != NULL){
                    echo '<p>Height = '.$weight.'</p>';
                    echo '<p>Weight = '.$height.'</p>';
                    echo '<p>BMI = '.BMI($weight, $height).'</p>';
                }
                else{
                    echo '<p>Please Type In All Information</p>';
                }
                echo '</div>';
            }
            else{
                echo '';
            }
            
            if(isset($_POST['submit'])){
                echo '<div class="container flex-column" id="photo">';
                echo '<h1>Picture</h1>';
                if($_FILES['image_uploads']['error'][0] == 4){
                    echo '<p>Empty</p>';
                }
                else{
                    if(CheckUploadImageType($file_array)){
                        echo '<p>Wrong File Type</p>';
                    }
                    else{
                        AddFileToDirectory($file_array);
                        foreach ($file_array as $file) {
                            echo '<img src="./upload/'.$file["name"].'">';
                        }
                    }
                }
                echo '</div>';
            }
            else{
                echo '';
            }
        ?>
    </div>

    <script type="text/javascript" src="./src/main.js"></script>
</body>

</html>