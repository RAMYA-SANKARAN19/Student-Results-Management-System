<?php 
 include "excelconfig.php";
  if(isset($_POST['import']))
  {
     $csvMimes=array('application/vnd.ms-excel');
     if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes))
     {
        if(is_uploaded_file($_FILES['file']['tmp_name']))
        {
            $csvFile = fopen($_FILES['file']['tmp_name'],'r');
            fgetcsv($csvFile);
            while(($line = fgetcsv($csvFile)) !== FALSE)
            {
               
               $studentid=$line[0];
               $classid=$line[1];
               $subjectid=$line[2];
               $marks= $line[3];
               $sql="SELECT * FROM tblresult where StudentId='{$studentid}'";
               $res=$dbh->query($sql);
               if($res->rowCount() >0)
               {
                   $update="UPDATE tblresult set ClassId='".$classid."',marks='".$marks."' WHERE
                    StudentId='".$studentid."' and SubjectId='".$subjectid."'";
                    $dbh->query($update);
               }
               else
               {
                   $insert="INSERT INTO `tblresult` (`StudentId`, `ClassId`, `SubjectId`, `marks`) VALUES ('{$studentid}', '{$classid}', '{$subjectid}', '{$marks}')";
                   $dbh->query($insert);
               }
            }
            fclose($csvFile);
            $q='?status=success';
         }

            

        
        else{
            $q='?status=error';

        
     }}
     else{
        echo  $q='?status=invalid_file_format';
     }
     

 }
  echo "<script>window.open('add-result.php{$q}','_self')</script>";
 
 ?>