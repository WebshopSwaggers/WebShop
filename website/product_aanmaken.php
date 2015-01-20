
 //HTML Starts Here.

<!-- // Form needed to upload the image.
     // You can change the name of the form, dont forget to change that in the variable $img_ff.
     // You can change the action file. (In this case i use the same name as this file.)-->
<form enctype="multipart/form-data" name="image" method="post" action="product_aanmaken.php">
    <label for="image">Image:</label>
    <input type="file" id="image" name="image" />
    <br />
    <input type="submit" value="Upload" />&nbsp;<input type="reset" value="Reset" />
</form>

//HTML Ends Here . 


<?php

function uploadImage($img_ff, $dst_path, $dst_img){

    //Get variables for the function.
            //complete path of the destination image.
    $dst_cpl = $dst_path . basename($dst_img);
            //name without extension of the destination image.
    $dst_name = preg_replace('/\.[^.]*$/', '', $dst_img);
            //extension of the destination image without a "." (dot).
    $dst_ext = strtolower(end(explode(".", $dst_img)));

//Check if destination image already exists, if so, the image will get an extra number added.
    while(file_exists($dst_cpl) == true){
        $i = $i+1;
        $dst_img = $dst_name . $i . '.' . $dst_ext;
        $dst_cpl = $dst_path . basename($dst_img);
    }

        //upload the file and move it to the specified folder.
    move_uploaded_file($_FILES[$img_ff]['tmp_name'], $dst_cpl);

        //get type of image.
    $dst_type = exif_imagetype($dst_cpl);

        //Checking extension and imagetype of the destination image and delete if it is wrong.
    if(( (($dst_ext =="jpg") && ($dst_type =="2")) || (($dst_ext =="jpeg") && ($dst_type =="2")) || (($dst_ext =="gif") && ($dst_type =="1")) || (($dst_ext =="png") && ($dst_type =="3") )) == false){
        unlink($dst_cpl);
        die('<p>The file "'. $dst_img . '" with the extension "' . $dst_ext . '" and the imagetype "' . $dst_type . '" is not a valid image. Please upload an image with the extension JPG, JPEG, PNG or GIF and has a valid image filetype.</p>');
    }
}
    //Script ends here.


// Needed for the function:

        // If the form is posted do this:
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Variables needed for the function.
        $img_ff = 'image'; // Form name of the image
        $dst_img = strtolower($_FILES[$img_ff]['name']); // This name will be given to the image. (in this case: lowercased original image name uploaded by user).
        $dst_path = '../directory/'; // The path where the image will be moved to.

        uploadImage($img_ff, $dst_path, $dst_img);
    }




?>