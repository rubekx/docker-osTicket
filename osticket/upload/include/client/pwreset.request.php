<?php
if(!defined('OSTCLIENTINC')) die('Access Denied');

$userid=Format::input($_POST['userid']);
?>
<h1><?php echo __('Forgot My Password'); ?></h1>
<p><?php echo __(
'Enter your username or email address in the form below and press the <strong>Send Email</strong> button to have a password reset link sent to your email account on file.');
    ?></p>

<form action="pwreset.php" method="post" id="clientLogin">
    <div style="width:50%;display:inline-block">
    <?php csrf_token(); ?>
    <input type="hidden" name="do" value="sendmail"/>
        <?php
            if($errors['deuErro']==true){
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Atenção!</strong> <strong><?php echo Format::htmlchars($banner); ?></strong>
        </div>
        <?php
            }
            else{
        ?>
        <div class="alert alert-warning" role="alert">
            <strong>Atenção!</strong> <strong><?php echo Format::htmlchars($banner); ?></strong>
        </div>

        <?php
            }
        ?>

    <br>
    <div>
        <label for="username">Email Cadastrado:</label>
        <input id="username" type="text" name="userid" size="30" value="<?php echo $userid; ?>">
    </div>
    <p>
        <input class="btn btn-primary" type="submit" value="<?php echo __('Send Email'); ?>">
    </p>
    </div>
</form>
