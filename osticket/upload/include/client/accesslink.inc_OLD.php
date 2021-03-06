<?php
if(!defined('OSTCLIENTINC')) die('Access Denied');

$email=Format::input($_POST['lemail']?$_POST['lemail']:$_GET['e']);
$ticketid=Format::input($_POST['lticket']?$_POST['lticket']:$_GET['t']);

if ($cfg->isClientEmailVerificationRequired())
    $button = __("Email Access Link");
else
    $button = __("View Ticket");
?>
<div class="row">
	<div class="page-title">
		<h1><?php echo __('Check Ticket Status'); ?></h1>
		<p><?php
		echo __('Please provide your email address and a ticket number.');
		if ($cfg->isClientEmailVerificationRequired())
			echo ' '.__('An access link will be emailed to you.');
		else
			echo ' '.__('This will sign you in to view your ticket.');
		?></p>

	</div>
</div>
<form class="form-group" action="login.php" method="post" id="clientLogin" class="form-horizontal">
    <?php csrf_token(); ?>
	<div class="row">
	<div class="login-box col-md-6">
		<div><strong><?php echo Format::htmlchars($errors['login']); ?></strong></div>
		<div>
			<!-- <label for="email"><?php echo __('E-Mail Address'); ?>: -->
			<label for="email">Email:
			<input class="form-control" id="email" placeholder="<?php echo __('e.g. john.doe@osticket.com'); ?>" type="text"
				name="lemail" size="42" value="<?php echo $email; ?>" class="nowarn"></label>
		</div>
		<div>
			<label for="ticketno"><?php echo __('Ticket Number'); ?>:
			<input class="form-control" id="ticketno" type="text" name="lticket" placeholder="<?php echo __('e.g. 051243'); ?>"
				size="30" value="<?php echo $ticketid; ?>" class="nowarn"></label>
		</div>
		<div><p>
			<input class="btn btn-success" type="submit" value="<?=$button; ?>">
			<a class="btn btn-info" href="http://atendimento.nead.ufma.br/pwreset.php" target="_blank" >Esqueceu sua senha?</a>
		</p>
		</div>
	</div>

	<div class="col-md-6">
		<div class="instructions">
	<?php if ($cfg && $cfg->getClientRegistrationMode() !== 'disabled') { ?>
			<h3> <?php echo __('Have an account with us?'); ?></h3
			<a href="login.php"><?php echo __('Sign In'); ?></a> <?php
		if ($cfg->isClientRegistrationEnabled()) { ?>
	<?php echo sprintf(__('or %s register for an account %s to access all your tickets.'),
		'<a href="account.php?do=create">','</a>');
		}
	}?>
		</div>
	</div>

	</div>
</form>

<p>
<?php
// if ($cfg->getClientRegistrationMode() != 'disabled'
//     || !$cfg->isClientLoginRequired()) {
//     echo sprintf(
//     __("If this is your first time contacting us or you've lost the ticket number, please %s open a new ticket %s"),
//         '<a href="open.php">','</a>');
// } ?>
</p>
