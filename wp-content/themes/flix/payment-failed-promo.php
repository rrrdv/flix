<?php
/*
  Template Name: Payment failed PromoTool IMG
 */

get_header();
remove_filter('the_content', 'my_content');

$values = get_post_meta($post->ID, 'promo-tool', false)[0];

$repeatTimes = $values['repeat-times'];
if ($repeatTimes == 0  || $repeatTimes == null) {
    $repeatTimes = 3;
}
$totalWaitTime = ($repeatTimes + 1) * 2000;


$linkToLoad = $values['promo-tool-link-load'];  //http://serve.muffdigital.com/815

$linkToRedirect = $values['promo-tool-link-redirect'];

?>

<div id="content" class="vlog-site-content">
    <div class="vlog-section ">
        <h1 class="entry-title vlog-page-title">
            <?php _e('Payment Failed', 'vlog'); ?>
        </h1>    
        <div class="container">
            <div class="vlog-content">
                <?php $element = $values['loadElement'] ?? ''; ?>
                <?php if ($element && in_array($element, ['none', 'img'])) : ?>
                    <img src="" id="promoTool" style="display:none;" />
                <?php elseif ('iframe' === $element) : ?>
                    <iframe src="" id="promoTool" style="display:none;"></iframe>
                <?php endif; ?>  
            </div>
        </div>
    </div>
</div>
<?php 
    switch ($values['promoToolType']) {
        case 'redirect':
            echo <<<JS
                <script type="text/javascript">
                    jQuery(document).ready(function($){
                        var i = 0;
                        for (i = 0; i < {$repeatTimes}; i++) { 
                            loadPromoTool(i);
                        }

                        function loadPromoTool(i) {
                            setTimeout(function(){
                                $('#promoTool').attr('src', '{$linkToLoad}');
                                console.log($('#promoTool').attr('src'));
                            }, 2000 * i);
                        }
                        setTimeout(function(){
                            console.log('aici');
                            window.location.href = '{$linkToRedirect}';
                        }, {$totalWaitTime})
                    });
                </script>
JS;
        break;
        default:
        case 'no-redirect':
            echo <<<JS
                <script type="text/javascript">
                    jQuery(document).ready(function($){
                        var i = 0;
                        for (i = 0; i < {$repeatTimes}; i++) { 
                            loadPromoTool(i);
                        }

                        function loadPromoTool(i) {
                            setTimeout(function(){
                                $('#promoTool').attr('src', '{$linkToLoad}');
                                console.log($('#promoTool').attr('src'));
                            }, 2000 * i);
                        }
                    });
                </script>
JS;
        break;
    }
?>

<?php get_footer(); ?>