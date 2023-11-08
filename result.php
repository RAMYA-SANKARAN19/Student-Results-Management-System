<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    if(isset($_POST['submit']))
    {
        $Roll=$_POST['Roll'];
        $class=$_POST['class']; 
        $subjects=$_POST['subject'];
        $reason=$_POST['reason'];
        // print_r($subject);

        // exit;
        foreach ($subjects as $key => $subject) {            
            $sql="INSERT INTO  revaluation(Roll,class,subject,reason) VALUES(:Roll,:class,:subject,:reason)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':Roll',$Roll,PDO::PARAM_STR);
            $query->bindParam(':class',$class,PDO::PARAM_STR);
            $query->bindParam(':subject',$subject,PDO::PARAM_STR);
            $query->bindParam(':reason',$reason,PDO::PARAM_STR);
            $query->execute();
        }
        $lastInsertId = $dbh->lastInsertId();

        header("Location: paying.php"); 
        if($lastInsertId)
        {
            $msg="Class Created successfully";
        }
        else 
        {
            $error="Something went wrong. Please try again";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Result Management System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
        <link rel="stylesheet" href="css/prism/prism.css" media="screen">
        <link rel="stylesheet" href="css/main.css" media="screen">
        <script src="js/modernizr/modernizr.min.js"></script>

        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
            }


            /* Full-width input fields */

            input[type=text],
            input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }


            /* Set a style for all buttons */

            button {
                background-color: #04AA6D;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            button:hover {
                opacity: 0.8;
            }


            /* Extra styles for the cancel button */

            .cancelbtn {
                width: auto;
                padding: 10px 18px;
                background-color: #f44336;
            }


            /* Center the image and position the close button */

            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
                position: relative;
            }

            img.avatar {
                width: 40%;
                border-radius: 50%;
            }

            .container {
                padding: 16px;
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }


            /* The Modal (background) */

            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
                /* Black w/ opacity */
                padding-top: 60px;
            }


            /* Modal Content/Box */

            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto;
                /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 80%;
                /* Could be more or less, depending on screen size */
            }


            /* The Close Button (x) */

            .close {
                position: absolute;
                right: 25px;
                top: 0;
                color: #000;
                font-size: 35px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }


            /* Add Zoom Animation */

            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            @-webkit-keyframes animatezoom {
                from {
                    -webkit-transform: scale(0)
                }
                to {
                    -webkit-transform: scale(1)
                }
            }

            @keyframes animatezoom {
                from {
                    transform: scale(0)
                }
                to {
                    transform: scale(1)
                }
            }


            /* Change styles for span and cancel button on extra small screens */

            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }
                .cancelbtn {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <div class="main-wrapper">
        <div class="content-wrapper">
        <div class="content-container">
            <!-- /.left-sidebar -->
            <div class="main-page">
                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="col-md-12">
                            <h2 class="title" align="center">Result Management System</h2>
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                <section class="section" id="exampl">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h3 align="center">Student Result Details</h3>
                                            <hr />
                                            <?php
                                                // code Student Data
                                                $rollid=$_POST['rollid'];
                                                $classid=$_POST['class'];
                                                $dob=$_POST['dob'];
                                                $_SESSION['rollid']=$rollid;
                                                $_SESSION['classid']=$classid;
                                                $_SESSION['dob']=$dob;
                                                $qery = "SELECT   tblstudents.StudentName,tblstudents.RollId,tblstudents.DOB,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.RollId=:rollid and tblstudents.ClassId=:classid and tblstudents.DOB=:dob ";
                                                $stmt = $dbh->prepare($qery);
                                                $stmt->bindParam(':rollid',$rollid,PDO::PARAM_STR);
                                                $stmt->bindParam(':classid',$classid,PDO::PARAM_STR);
                                                $stmt->bindParam(':dob',$dob,PDO::PARAM_STR);
                                                $stmt->execute();
                                                $resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
                                                $cnt=1;
                                                if($stmt->rowCount() > 0)
                                                {
                                                foreach($resultss as $row)
                                                {   ?> 
                                            <p>
                                                <b>Student Name :</b> <?php echo htmlentities($row->StudentName);?>
                                            </p>
                                            <p>
                                                <b>Student Roll Id :</b> <?php echo htmlentities($row->RollId);?>
                                            <p>
                                                <b>Student Class:</b> <?php echo htmlentities($row->ClassName);?>( <?php echo htmlentities($row->Section);?>) <?php }
                                                    ?>
                                        </div>
                                        <div class="panel-body p-20">
                                            <table class="table table-hover table-bordered" border="1" width="100%">
                                                <thead>
                                                    <tr style="text-align: center">
                                                        <th style="text-align: center">S.No</th>
                                                        <th style="text-align: center"> Subject</th>
                                                        <th style="text-align: center">Marks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php                                              
                                                        // Code for result
                                                        
                                                         $query ="select t.StudentName,t.RollId,t.ClassId,t.marks,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.RollId,sts.ClassId,tr.marks,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId=:rollid and t.ClassId=:classid)";
                                                        $query= $dbh -> prepare($query);
                                                        $query->bindParam(':rollid',$rollid,PDO::PARAM_STR);
                                                        $query->bindParam(':classid',$classid,PDO::PARAM_STR);
                                                        $query-> execute();  
                                                        $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                                        $cnt=1;
                                                        if($countrow=$query->rowCount()>0)
                                                        { 
                                                        foreach($results as $result){
                                                        
                                                            ?> 
                                                    <tr>
                                                        <th scope="row" style="text-align: center"> <?php echo htmlentities($cnt);?> </th>
                                                        <td style="text-align: center"> <?php echo htmlentities($result->SubjectName);?> </td>
                                                        <td style="text-align: center"> <?php echo htmlentities($totalmarks=$result->marks);?> </td>
                                                    </tr>
                                                    <?php 
                                                        $totlcount+=$totalmarks;
                                                        $cnt++;
                                                        }
                                                        ?> 
                                                    <tr>
                                                        <th scope="row" colspan="2" style="text-align: center">Total Marks</th>
                                                        <td style="text-align: center">
                                                            <b> <?php echo htmlentities($totlcount); ?> </b> out of <b> <?php echo htmlentities($outof=($cnt-1)*100); ?> </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" colspan="2" style="text-align: center">Percntage</th>
                                                        <td style="text-align: center">
                                                            <b> <?php echo  htmlentities($totlcount*(100)/$outof); ?> % </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="center">
                                                            <i class="fa fa-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)"></i>
                                                        </td>
                                                    </tr>
                                                    <?php }
                                                        else { ?> 
                                                    <div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Notice!</strong> Your result not declare yet <?php }
                                                            ?>
                                                    </div>
                                                    <?php 
                                                        } 
                                                        else
                                                        {?>
                                                    <div class="alert alert-danger left-icon-alert" role="alert"> --> <strong>Oh snap!</strong> <?php
                                                        echo htmlentities("Invalid Details");
                                                         }
                                                        ?> </div>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-md-6 -->
                                <div class="form-group">
                                    <div class="col-xl-1">
                                        <pre>
                                            <a href="index.php" style="align:right">
                                                <strong>Back to Home
                                                </a>
                                    </div>
                                    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Re-Evaluation</button>
                                   

                                    <div id="id01" class="modal"> 
                                        <div class="modal-body">
        
      
                                        <form class="modal-content animate" method="post">
                                            <div class="imgcontainer">
                                                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                                <h2> Re-Evaluation Form  </h2>
                                            </div>
                                            <div class='container-fluid'>

                                                <div class="form-group">                                                    
                                                    <label for="uname"><b>Roll No </b></label>
                                                    <input type="text" placeholder="Enter RollNo" name="Roll" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="default" >Class</label>
                                                    <select name="class" class="form-control clid" id="classid" onChange="getSubject(this.value);" required="required"><!-- getSubject -->
                                                        <option value="">Select Class</option>
                                                        <?php $sql = "SELECT * from tblclasses";
                                                        $query = $dbh->prepare($sql);
                                                        $query->execute();
                                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                        if($query->rowCount() > 0)
                                                        {
                                                            foreach($results as $result)
                                                                {   ?>
                                                                    <option value="<?php echo htmlentities($result->id); ?>">
                                                                    <?php echo htmlentities($result->ClassName); ?>&nbsp; Section-
                                                                    <?php echo htmlentities($result->Section); ?></option>
                                                            <?php }} ?>
                                                    </select>
                                                </div>
                                                <div id="subjectDiv" class="form-group"></div>

                                                <div class="form-group">
                                                    <label for="uname"><b>Reason</b></label>
                                                    <textarea name="reason" cols=100 rows=5 class="form-control"  placeholder="Reason for Re-Evaluation"></textarea>
                                                    
                                                </div>
                                                <div class="form-group mt-20">
                                <div class="col-sm-offset-2 col-sm-10">
                                    

                                    <span><button type="submit" name="submit"
                                        class="btn btn-success btn-labeled pull-right">Submit <span class="btn-label btn-label-right"><i
                                                class="fa fa-check"></i></span></button></span>
                                </div>
                            </div>
                                                
                                           
                                        </form>
                                    </div>
                                    <script>
                                        // Get the modal
                                        var modal = document.getElementById('id01');
                                        
                                        // When the user clicks anywhere outside of the modal, close it
                                        window.onclick = function (event) {
                                          if (event.target == modal) {
                                            modal.style.display = "none";
                                        }
                                    }
                                </script>
                            </pre>
                        </strong>
                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->
                    </div>
                    <!-- /.main-page -->
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {


                // $(document).on('change', '#classid', function(event) {
                //     event.preventDefault();
                //     console.log($(this).val());
                // });
            });
            function getSubject(class_id) {
                $.ajax({
                    type: 'post',
                    url: 'ajax.php',
                    data: {
                        class_id:class_id
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        console.log(response);
                        var html = '<label for="subject"><b>Subject</b></label>';
                        for (var i = 0; i < response.length; i++) {
                            var subject = response[i]; 
                            html += `<div class="checkbox"><label><input type="checkbox" name="subject[]" value="${subject.SubjectName}" id="subject${subject.id}">${subject.SubjectName}</label></div>`;
                            // html += `<div class="form-check"><input class="form-check-input" type="checkbox" value="${subject.SubjectName}" id="subject${subject.id}">  <label class="form-check-label" for="flexCheckDefault"> ${subject.SubjectName}  </label></div>`;
                        }

                        $('#subjectDiv').html(html);
                    }
                });
            }

            function CallPrint(strid) {
                var prtContent = document.getElementById("exampl");
                var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                WinPrint.document.write(prtContent.innerHTML);
                WinPrint.document.close();
                WinPrint.focus();
                WinPrint.print();
                WinPrint.close();
            }
        </script>
        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>