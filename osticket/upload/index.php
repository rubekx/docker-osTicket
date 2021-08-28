<?php
/*********************************************************************
    index.php

    Helpdesk landing page. Please customize it to fit your needs.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2013 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
**********************************************************************/
require('client.inc.php');

require_once INCLUDE_DIR . 'class.page.php';

$section = 'home';
require(CLIENTINC_DIR.'header.inc.php');
?>
<div class="clearfix"></div>
<div id="landing_page" class="container">
    <div class="jumbotron">
    <h1 class="text-center"> Central de Atendimento </h1>
    <?php if((!$thisclient || !$thisclient->isValid())){?>
    <p class="text-center">Seja bem-vindo(a) a central de atendimento do DTED. Escolha uma forma de abertura de chamado abaixo: </p>
    <p>
        <a href="login.php" class="btn btn-primary btn-lg btn-block">Abrir um chamado <br><b>com cadastro</b></a>
    </p>
    <p>
        <a href="open.php" class="btn btn-default btn-lg btn-block">Abrir um chamado <br><b>sem cadastro</b></a>
    </p>
    <?php }else{?>
        <p class="text-center">Seja bem-vindo(a) a central de atendimento do DTED.</p>
    <p>
        <a href="open.php" class="btn btn-primary btn-lg btn-block">Abrir Novo Chamado</a>
    </p>
    <p>
        <a href="tickets.php" class="btn btn-success btn-lg btn-block">Abrir Todos Chamados</a>
    </p>
    <?php } ?>
</div>
</div>
</div>
<?php require(CLIENTINC_DIR.'footer.inc.php'); ?>