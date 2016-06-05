<?php
class DatabaseLib
{
    	///////////////// upload two ima
public static function upload_image($image_name, $image_type, $image_path,$image_folder)
    {
	   try
        {
            $add="assets/frontend/pages/img/".$image_folder."/".$image_name; // the path with the file name where the file will be stored, upload is the directory 
            move_uploaded_file ($image_path,$add);
            $n_width=250; // Fix the width of the thumb nail images
            $n_height=200; // Fix the height of the thumb nail imaage
            $temp="assets/frontend/pages/img/".$image_folder."/temp/".$image_name; // Path where thumb nail image will be stored
          /////////////////// starting of JPG thumb nail creation//////////
            if ($image_type == "image/jpeg")
                {
                    $img=ImageCreateFromJPEG($add); 
                    $width=ImageSx($img);              // Original picture width is stored
                    $height=ImageSy($img);             // Original picture height is stored
                    $newimage=imagecreatetruecolor($n_width,$n_height);                 
                    imageCopyResized($newimage,$img,0,0,0,0,$n_width,$n_height,$width,$height);
                    ImageJpeg($newimage,$temp);
                }
            if ($image_type=="image/png")
                {
                    $img=ImageCreateFromPNG($add);
                    $width=ImageSx($img);              // Original picture width is stored
                    $height=ImageSy($img);              // Original picture height is stored                 
                    $newimage=imagecreatetruecolor($n_width,$n_height);
                    imageCopyResized($newimage,$img,0,0,0,0,$n_width,$n_height,$width,$height);
                    if (function_exists("imagepng"))
                         {
                            ImagePNG($newimage,$temp);
                         }
                    elseif (function_exists("imagejpeg"))
                         {
                            ImageJPEG($newimage,$temp);
                         }
    }

if ($image_type == "image/gif")
{
$img=ImageCreateFromPNG($add);
$width=ImageSx($img);              // Original picture width is stored
$height=ImageSy($img);            // Original picture height is stored
$newimage=imagecreatetruecolor($n_width,$n_height);
imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
if (function_exists("imagegif")) {
ImageGIF($newimage,$temp);
}
elseif (function_exists("imagejpg")) {
ImageJPEG($newimage,$temp);
}
}	

 }
       catch(PDOException $e)
		{
			die($e->getMessage());
		}	
	}
}