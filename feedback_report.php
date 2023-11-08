
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

           <center><h1> FeedBack Reports</h1></center>
<table>

<tr></tr>
<tr></tr>
<tr>
    <th> Name</th>
    <th> Email</th>
    <th> Phone</th>
    <th> Feedback</th>
</tr>

<?php

include('includes/config.php');
$sql = "SELECT distinct(name),email,phone,comments from feedback";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<tr>
<td><?php echo htmlentities($result->name); ?></td>
<td><?php echo htmlentities($result->email); ?></td>
<td><?php echo htmlentities($result->phone); ?></td>
<td><?php echo htmlentities($result->comments);?>&nbsp;</td>
</tr>
<?php }} ?>
</table>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<center><a href="dashboard.php" >Back to Home</a></center> 


    </html>