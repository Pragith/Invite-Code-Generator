<?php
   include("config.php");
   include("functions.php");
?> 


<form method="POST">
<input type="submit" value="Generate Code" name="genbtn"/>
</form>
<?php if (isset($_POST['genbtn']))  genInviteCodes(); displayInviteCodes(); ?>
