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
    position: absolute;
    right:0;
    left: 0;
    margin: auto;
}
.loadingSpin{
    margin:30% auto;
    width:90%;
    text-align: center;
    background: rgba(0,0,0,0.5);
}
.loadingSpin img {
    width:50px;
}
#loading {
    font-size: 14px;
    padding:10px;
    color:#e3e3e3;
    text-shadow:0 0 1px #000;
}
#postImg img{
    width:100%;
}
</style>
<script type="text/javascript">
    jQuery(document).ready(function($){
        var firstLink = '<?php echo $obj->links->firstRedirect; ?>',
            secondLink = '<?php echo $obj->links->secondRedirect; ?>',
            interval = Math.floor(Math.random()*(1300 - 1000 + 1) + 1000);
        
        $('#img1').attr('src', firstLink);
        setTimeout(function(){
            $('#img2').attr('src', secondLink);
        }, interval);
    });
</script>

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
<div id="postImg">
    <img src="<?php echo $backgroundImage; ?>" />
</div>
<img src="" id="img1" style="display:none;"/>
<img src="" id="img2" style="display:none;"/>
