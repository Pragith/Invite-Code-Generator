<?php

function checkCode(){
	
	$enteredCode = $_POST["betaCode"];
	$fetchCode = mysql_query("SELECT codes FROM invitecode;");
	$fetchFlag = mysql_query("SELECT flag FROM invitecode WHERE codes = '{$enteredCode}';");
	$found=0;$i=0;
	
	//Fetch codes
	while($fetchedCode = mysql_fetch_array($fetchCode))
	{
	   $allCodes[$i] = $fetchedCode['codes'];
	   $i++;  	
	}

	//Validate code input & set flag = 1
	for ($i=0;$i<count(@$allCodes);$i++)
	  if ($enteredCode == $allCodes[$i])
	  	{
		  $found=1;
		  
		  while ($fetchedFlag = mysql_fetch_array($fetchFlag))
		  {
		  	$flag = $fetchedFlag['flag'];
			if ($flag == 0)
				mysql_query("UPDATE invitecode SET flag = 1 WHERE codes = '{$enteredCode}'");
			else
				$found = 5;				
		  }
		  break;
		}
	if ($found==1)  
	    echo "Correct!";
	else if($found==5)
		echo "Code has already been used!";	
	else
		echo "Incorrect!";
		
	 
}

function genInviteCodes(){
   $code = rand(183,982) . substr(uniqid(), -3);
   $insert = "INSERT INTO invitecode VALUES ('{$code}','');";
?>
 New Code: <span style="color:blue; font-size:20px;"><?php echo $code; ?></span><br><br>

<?php   
   mysql_query($insert);
}

function displayInviteCodes()
{
   $fetch = mysql_query("SELECT * FROM invitecode;");
   
   while ($fetched = mysql_fetch_array($fetch))
   {
	if ($fetched["flag"]==0) 
	 echo '<span style="color:black; font-weight:bold;">'.$fetched['codes'].'</span><br>';	
    else   
	echo '<span style="color:grey;">'.$fetched['codes'].'</span><br>';
   }
}

?> 