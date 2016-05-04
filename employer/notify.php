<?php
/**
 * Created by PhpStorm.
 * User: Sreelal
 * Date: 09-04-2016
 * Time: 08:32 PM
 */
include_once('config.php');
session_start();
$notifycount=0;
function notify()
{


    if ($_SESSION['status'] == 0) {
        $GLOBALS['notifycount'] += 1;
        ?>

        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> Your Account is not Activated
        </div>

    <?php }
}
function eventjobapplied(){

}
?>