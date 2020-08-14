<?php

use Wordpress\Multisite\Commons\DetailFlow;
use Wordpress\Multisite\Commons\MarketingCustomization\Flow;
use Wordpress\Multisite\Commons\Decorator\GetPost;
use Wordpress\Multisite\Commons\Support\Facades\BillingParams;
use Wordpress\Multisite\Commons\Support\Facades\PrepareResponse;

//skip detail flow
if (!DetailFlow::instance()->isBillingFlow()) {
    DetailFlow::instance()->restrictRedirect();

    header('Location: ' . DetailFlow::instance()->getDetailLink());
    die();
}

get_header();

$obj = PrepareResponse::getAll();

?>
<style>
#modal-handy, #header, .textwidget {

    display: none !important;
}
#container {
    position: relative;
}
.loadingSpin{
    margin:30% auto;
    text-align: center;
}
.loadingSpin img {
    width:50px;
}
#loading {
    font-size: 14px;
    padding:10px;
    color:#e3e3e3;
}
</style>
<script type="text/javascript">
    jQuery(document).ready(function($){
        var firstLink = '<?php echo $obj->links->firstRedirect; ?>',
            secondLink = '<?php echo $obj->links->secondRedirect; ?>',
            thirdLink = '<?php echo $obj->links->thirdRedirect; ?>',
            //Generate random settimeout interval between 1000 and 1300 ms
            interval = Math.floor(Math.random()*(1300 - 1000 + 1) + 1000),
            interval2 = Math.floor(Math.random()*(1200 - 1000 + 1) + 1000);

        //$('#iframe').attr('src', firstLink);
        $('#img1').attr('src', firstLink);
        setTimeout(function(){
            //$('#iframe').attr('src', secondLink);
            $('#img2').attr('src', secondLink);
            setTimeout(function(){
                window.location.href = thirdLink;
            }, interval2);
        }, interval);
    });
</script>

<img src="" id="img1" style="display:none;"/>
<img src="" id="img2" style="display:none;"/>
<?php

# get background image
$backgroundImage = Flow::instance()->getPostCustomImage(654, 368, Flow::instance()->getPostImage(654, 368));


?>
<div id="container">
    <div class="loadingSpin">
        <img class="spin" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/loading.gif" />
        <div id="loading">Caricamento del contenuto</div>
    </div>
</div>
