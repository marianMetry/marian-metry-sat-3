

<?php
session_start();

 if (isset($_POST['submit'])) //Reads the submitted file input.
 {    
                                  
 
      $jsonData = $_FILES['json'];
      $jsonDataName = $jsonData['name'];
      $jsonDataTempName = $jsonData['tmp_name'];
      $jsonDataError = $jsonData['error'];
      $ext= pathinfo( $jsonDataName, PATHINFO_EXTENSION);
      // print_r($jsonData);
      //  echo $ext;
     $errors=[];

    //validation   
  
      //checks that no errors
       if ($jsonDataError !=0)
        {
         $errors[]=' founed error while uploading file';
        } 

        //checks that extension is .json

        elseif ($ext != "json") 
        {
         $errors[]=' you must upload json file only ';
     
      }


    


       if (empty($errors))
       {
            // if valid   ==>rename the file ==>then move it to destination
            $randamName=uniqid();
            
            $jsonNewName ="$randamName.$ext";  //make rename  the file 
            //Moves the file to the project directory.
            move_uploaded_file( $jsonDataTempName ,"json/$jsonNewName");


            
            //Reads data from the file 
            $jsonFile = fopen("json/604ccf672f06e.json" ,"r");  //$jsonFile from data type ==(resource)
            $jsonFileSize=filesize("json/604ccf672f06e.json");
            $jsonFileData=fread( $jsonFile ,  $jsonFileSize);
         
            fclose($jsonFile);
            //  then converts it from JSON to associative array 
            $jsonDecode = json_decode( $jsonFileData);
     
    
            
            // then stores it in session  
            $_SESSION['datas'] =json_decode( $jsonFileData);
         

            // then redirect to display.php
            header("location:display.php");
         }
         else
         {
            //store in session errors arr
            $_SESSION['errors'] =$errors;

            //redirect to upload-json.php
            header("location:upload-json.php");


            
         }
      


   }

?>