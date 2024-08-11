<?php
// file uploading 
declare(strict_types=1);

define('STORAGE_PATH', __DIR__ . '/../storage');

class Home
{
    public function index(): string
    {
        //accept=".pdf" we can specify the file type we can alsoo upload image in array typealsoo
 // return <<<FORM
         // <form action="" method="post" enctype="multipart/form-data">
         // <input type="file" name="file"  />  
         // <button type="submit"> upload </button>
         // </form>
         // FORM;
    }
    public function download()
    {
        header('Content-Type:application/pdf');
        header('Content-Disposition:attachment;filename="myfile.pdf"');
        readfile(STORAGE_PATH . '/storage/slack.zip');
    }
    public function index1(): string
    {
        // Form to upload multiple files
        return <<<FORM
                <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="file[]" />  
                <input type="file" name="file[]" />  
                <button type="submit"> Upload </button>
                </form>
                FORM;
    }

    public function upload()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            echo '<pre>';
            var_dump($_FILES);
            echo '</pre>';

            foreach ($_FILES['file']['name'] as $key => $name) {
                $tmpName = $_FILES['file']['tmp_name'][$key];
                if ($tmpName) {
                    $filePath = STORAGE_PATH . '/' . $name;
                    move_uploaded_file($tmpName, $filePath);

                    echo '<pre>';
                    var_dump(pathinfo($filePath));
                    echo '</pre>';
                }
            }
        }
    }
}

$home = new Home();
echo $home->index1();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $home->upload();
}
// echo $home->download();