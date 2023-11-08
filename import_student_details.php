<?php 
 include 'excelconfig.php';
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
               
               $StudentId=$line[0];
               $StudentName=$line[1];
           
               $RollId= $line[2];
               $StudentEmail= $line[3];
               $Gender= $line[4];
               $DOB= $line[5];
               $ClassId= $line[6];
               
               $sql="SELECT * FROM tblstudents where StudentId='{$StudentId}'";
               $res=$dbh->query($sql);
               if($res->rowCount() >0)
               {
                   $update="UPDATE tblstudents set StudentName='".$StudentName."',Gender='".$Gender."',StudentEmail='".$StudentEmail."',
                   DOB='".$DOB."' ,ClassId='".$ClassId."' ,UpdationDate=NOW() WHERE StudentId='".$StudentId."'";

                    $dbh->query($update);
               }
               else
               {
                   $insert="INSERT INTO `tblstudents`(`StudentId`, `StudentName`, `RollId`,`StudentEmail`,`Gender`,`DOB`,`ClassId`) VALUES 
                   ('{$StudentId}', '{$StudentName}', '{$RollId}', '{$StudentEmail}', '{$Gender}', '{$DOB}','{$ClassId}')";

// INSERT INTO `tblstudents`(`StudentId`, `StudentName`, `RollId`, `StudentEmail`, `Gender`, `DOB`, `ClassId`, `RegDate`, `UpdationDate`, `Status`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]')
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
  echo "<script>window.open('add-students.php{$q}','_self')</script>";
 
 ?>