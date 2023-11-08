<html>
    <head>
        <style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>

</head>

           <center><h1> Re-Evaluation Reports</h1></center>
<table>

<tr></tr>
<tr></tr>
<tr>
    <th> Roll No</th>
    <th> Class</th>
    <th> Subject</th>
    <th> Reason</th>
</tr>

<?php

include('includes/config.php');
$sql = "SELECT * from revaluation";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<tr>
<td><?php echo htmlentities($result->Roll); ?></td>
<td><?php echo htmlentities($result->class); ?></td>
<td><?php echo htmlentities($result->subject); ?></td>
<td><?php echo htmlentities($result->reason);?>&nbsp;</td>
</tr>
<?php }} ?>
<tr></tr>
<tr></tr>
<tr></tr>
</table>




    </html>