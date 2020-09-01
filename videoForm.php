<?php
class videoForm {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function createUploadForm() {
        $fileInput = $this->createFileInput();
        $titleInput = $this->createTitleInput();
        $descriptionInput = $this->createDescriptionInput();
        $privacyInput = $this->createPrivacyInput();
        $catogoriesInput = $this->createCatogoriesInput();
        $uploadButton = $this->createUploadButton();
        return "<form action='processing.php' method='POST' entype='multipart/form-data'>
                    $fileInput
                    $titleInput
                    $descriptionInput
                    $privacyInput
                    $catogoriesInput
                    $uploadButton
                </form>";
    }

    private function createFileInput() {
       return "<div class='form-group'>
                <input type='file' class='form-control-file' id='exampleFormControlFile1' name='fileInput'  required>
               </div>";
    }

    private function createTitleInput() {
        return"<div class='form-group'>
                    <input class='form-control' type='text' placeholder='Title' name='titleInput'>
                </div>";
                
    }
    private function createDescriptionInput() {
        return"<div class='form-group'>
                    <textarea class='form-control' placeholder='Description' name='DescriptionInput' rows='3'></textarea>
                </div>";
                
    }

    private function createPrivacyInput() {
        return "<div class'form-group'>
                    <select class='form-control' name='privacyInput'>
                        <option value='0'>Public</option>
                        <option value='1'>Private</option>
                    </select>
                </div>";
    }

    private function createCatogoriesInput() {
        $query = $this->con->prepare("SELECT * FROM categories");
        $query->execute();

        $html ="
                    <select class='form-control' name='categoryInput'style='margin-top: 30px'>" ;

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $id = $row["id"];
            $name = $row["name"];
            $html = $html . "<option value='$id'>$name</option>";
    }

        $html .=  "</select>
                </div>";

        return $html;
    }

    private function createUploadButton() {
        return "<button type='submit' class='btn btn-primary' name='uploadbutton=' style='
        height: 502px;
        margin-top: 49px;
    '>Upload</button>";
    }
}
?>