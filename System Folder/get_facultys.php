<?php
include('faculty/includes/dbconnection.php');
if(!empty($_POST["sp_id"])) 
{
$spid=$_POST["sp_id"];
$sql=$dbh->prepare("SELECT * FROM tblfaculty WHERE Specialization=:spid");
$sql->execute(array(':spid' => $spid));	
?>
<option value="">Select Faculty</option>
<?php
while($row =$sql->fetch())
{
?>
<option value="<?php echo $row["ID"]; ?>"><?php echo $row["FullName"]; ?></option>
<?php
}
}
?>