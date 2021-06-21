<?php
// Tele de index da central de atendimento

if(!defined('OSTCLIENTINC')) die('Access Denied');

$email=Format::input($_POST['lemail']?$_POST['lemail']:$_GET['e']);
$ticketid=Format::input($_POST['lticket']?$_POST['lticket']:$_GET['t']);

if ($cfg->isClientEmailVerificationRequired())
    $button = __("Email Access Link");
else
    $button = __("View Ticket");
?>
<div class="jumbotron">
    <h1 align="center"> Central de Atendimento </h1>
    <p align="justify">Seja bem-vindo(a) a central de atendimento do DTED. Escolha uma forma de abertura de chamado abaixo: </p>
    <p>
        <a href="login.php">
            <button type="button" class="btn btn-primary btn-lg btn-block">Abrir um chamado <br><b>com cadastro</b></button>
        </a><br>

    </p>
    <p>
        <a href="open.php">
            <button type="button" class="btn btn-default btn-lg btn-block">Abrir um chamado <br><b>sem cadastro</b></button>
        </a>
    </p>
</div>
<div class="row">

</div>
<form action="login.php" method="post" id="clientLogin">
    <?php csrf_token(); ?>
	<div class="row">
        <div class="col-md-6 login-box">

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

            <div><strong><?php echo Format::htmlchars($errors['login']); ?></strong></div>

            <div class="form-group">
                <!-- <label for="email"><?php echo __('E-Mail Address'); ?>: -->
                <label for="email">Email:</label>
                <input type="email" class="form-control nowarn" id="email" placeholder="<?php echo __('e.g. john.doe@osticket.com'); ?>" name="lemail" value="<?php echo $email; ?>">
            </div>

            <div class="form-group">
                <label for="ticketno"><?php echo __('Ticket Number'); ?>:</label>
                <input class="form-control" id="ticketno" type="text" name="lticket" placeholder="<?php echo __('e.g. 051243'); ?>"
                    size="30" value="<?php echo $ticketid; ?>" class="nowarn">
            </div>
            <input class="btn btn-success" type="submit" value="<?=$button; ?>">
        </div>

        <div class="col-md-6">
            <div class="instructions">
            <?php
            if ($cfg && $cfg->getClientRegistrationMode() !== 'disabled') { ?>
                <h3> Ainda não tem cadastro ?</h3>
                <!--<h3> <?php /*echo __('Have an account with us?'); */?></h3>-->
                <!--<a href="login.php">Clique em <?php /*echo __('Sign In'); */?></a>-->
            <?php
                if ($cfg->isClientRegistrationEnabled()) {
                    /*echo sprintf(__('or %s register for an account %s to access all your tickets.'), '<a href="account.php?do=create">','</a>');*/
                    echo "<p>
                            <a href='account.php?do=create'>Cadastre-se</a> para abrir uma conta e acessar todos os seus chamados.<br></p>";
                }
            }
            ?>
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
