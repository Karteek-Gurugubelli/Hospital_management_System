<?php

$fname = filter_input(INPUT_POST,'fname');

$lname = filter_input(INPUT_POST,'lname');
$birthday = filter_input(INPUT_POST,'birthday');
$gender = filter_input(INPUT_POST,'gender');
$email = filter_input(INPUT_POST,'email');
$phone = filter_input(INPUT_POST,'phone');
$doctor = filter_input(INPUT_POST,'doctor');
$date = filter_input(INPUT_POST,'date');
$time = filter_input(INPUT_POST,'time');

if(!empty($fname)){
	if (!empty($lname)){
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "hospital";
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
	if (mysqli_connect_error()){
	die('Connect Error('. mysqli_connect_error() .') '
     . mysqli_connect_error());
	}
	else{
	$sql = "INSERT INTO hospital(fname,lname,birthday,gender,email,phone,doctor,date,time)
	value ('$fname','$lname','$birthday','$gender','$email','$phone','doctor','date','time')";
		
		if ($conn -> query($sql) === TRUE){
			//$last_id = mysqli_insert_id($conn);

			echo"Your data is registered succesfully. Your Token Number is: " .$conn->insert_id; //$last_id;
			//mysql>select*from hospital where Id=(SELECT LAST_INSERTED_ID());
			echo"<br>Your data is: ";
		}
		else{
			echo"Error: " . sql ."<br>". $conn->error;
		}
	$conn->close();
	}

}
}

?>
<table border=1>
	<?php
	$conn = mysqli_connect("localhost","root","","hospital");
	$s=mysqli_query($conn,"select*from hospital order by id desc limit 1");
	while($r=mysqli_fetch_array($s))
	{
?>
	

<tr>
	<td><?php echo $r['id'];?></td>
	<td><?php echo $r['fname'];?></td>
	<td><?php echo $r['lname'];?></td>
	<td><?php echo $r['birthday'];?></td>
	<td><?php echo $r['gender'];?></td>
	<td><?php echo $r['email'];?></td>
	<td><?php echo $r['phone'];?></td>
	<td><?php echo $r['created_at'];?></td>
</tr>
<?php
}
?>
</table>