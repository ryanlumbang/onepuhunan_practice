<?php
    //ini_set('session.cache_limiter', 'public');    
    //session_cache_limiter(false);
    //header("Cache-Control: max-age=300, must-revalidate");
    
    if(!isset($_SESSION['logged_in'])) {
       header("location: index.php");   
    } else { ?>
    <div class="uk-panel uk-panel-box tm-submenu">
        <div class="uk-container uk-container-center uk-text-right">
            [ <?php echo date("l") . ", " . date("d F Y") ?> ]&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Welcome <b><?= $this->session->emp_name ?>!</b>&nbsp;&nbsp;&nbsp;[ <a href="<?php echo site_url("logout"); ?>">Logout</a> ]
        </div>
    </div>      
 <?php } ?>
