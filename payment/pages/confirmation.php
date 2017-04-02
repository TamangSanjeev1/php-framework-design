<?php session_start(); ?>
<form action="../../order/transactionConfirmation" method="post">
  	<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
  	<input type="hidden" name="transaction_id" value="<?php echo $_SESSION['t_id']; ?>">
  	<input type="hidden" name="amount" value="<?php echo $_SESSION['total']; ?>">
  	<input type="submit" value="Submit">
</form>
