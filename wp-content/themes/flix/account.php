<?php
/*
 Template Name: Account page
*/
use Wordpress\Membership\Commons\User;
use Wordpress\Membership\Commons\Adapter;
use Wordpress\Membership\Commons\Subscription;
use Wordpress\Membership\Commons\SubscriptionPerCategory;
use Wordpress\Membership\Commons\Credits;
use Wordpress\Membership\Commons\MembershipPublic;

if (! is_user_logged_in()) {
    wp_redirect(site_url('login.php'));
    exit;
}

$user    = User::instance()->current_user();
$user_id = $user->ID;
$msg     = getMessage($user_id);

$member_options = MembershipPublic::init();


$hello_text = '<strong>Hello <span class="user">%s</span></strong>,<br />'
 .' here you can change your portal settings';

$hello_user = sprintf(
    __($hello_text, 'membership'),
    $user->display_name
);

add_filter('loginaddHotlineSupport', 'addHotlineSupport', true);
$addHotlineSupport = apply_filters('loginaddHotlineSupport', false);

get_header();

?>
<script type="text/javascript">
    function M_CheckUnsubSubmit() {
        return confirm("<?php echo __vlog('cancel_confirmation', 'vlog') ?>");
    }
</script>
<div class="pagewrap">
  	<?php the_title('<h1 class="entry-title vlog-page-title">', '</h1>'); ?>

    <div class="tabs">

        <?php if (has_nav_menu('gestione_profilo')) {
    ?>
            <input type="radio" id="tab1" name="tab-control">
        <?php
} ?>
        <input type="radio" id="tab2" name="tab-control" checked>
        <input type="radio" id="tab3" name="tab-control">
        <ul class="account-items">
        <?php if (has_nav_menu('gestione_profilo')) {
        ?>
            <li><label for="tab1" role="button"><span><?php echo __('Gestione profilo', 'membership'); ?></span></label></li>
        <?php
    } ?>
        <li><label for="tab2" class="acc" role="button"><span><?php echo __('Account details', 'membership'); ?></span></label></li>
        <li><label for="tab3" class="abo" role="button"><span><?php echo __('Abo details', 'membership'); ?></span></label></li>
    </ul>


    <div class="container content">
        <?php if (has_nav_menu('gestione_profilo')) {
        ?>
            <section class="gestione-profile">
                <div class="account-form-content">
                    <?php wp_nav_menu(array('theme_location' => 'gestione_profilo')); ?>
                </div>
            </section>
        <?php
    } ?>
        <section class="account-details">
            <div class="account-form-content">
                <form action='' method='POST' id="account_form">
                    <?php echo $msg; ?>
                    <?php wp_nonce_field('update-user_' . $user_id); ?>
                    <input type="hidden" name="action" value="update" />
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
                    <ul class="form-table">
                        <li>
                            <label for="enable_affiliate"><?php echo __('Username', 'membership'); ?></label>
                            <input type="text" name="user_login" id="user_login" value="<?php echo $user->user_login; ?>" disabled="disabled" class="regular-text textbox-default" />
                            <span class="description"><?php echo __('Usernames cannot be changed.', 'membership'); ?></span>
                        </li>
                        <li>
                            <label for="enable_affiliate"><?php echo __('Nickname', 'membership'); ?></label>
                            <input type="text" name="nickname" id="nickname" value="<?php echo $user->nickname; ?>" class="regular-text textbox-default" />
                        </li>
                        <li>
                            <label for="enable_affiliate"><?php echo __('New Password', 'membership'); ?></label>
                            <input type="password" name="pass1" id="pass1" size="16" value="" class="textbox-default" autocomplete="off" />
                        </li>
                        <li>
                            <label for="pass2"><?php echo __('Retype Password', 'membership'); ?></label>
                            <input type="password" name="pass2" id="pass2" size="16" value="" class="textbox-default" autocomplete="off" />
                        </li>
                        <li>
                            <input type="submit"  value="<?php echo __('Update', 'membership'); ?>" class="button-primary update_account" name="submit" />
                        </li>
                    </ul>
                    <?php echo '<a class="center" href="' . wp_logout_url(home_url()) . '">' . __('Log out') . '</a>' ?>
                </form>
            </div>
        </section>

        <?php

        /**
         * Current member
         *
         * @see Wordpress\Membership\Commons\User::current
         */
        $member = User::instance()->current();

        # user susbcription(s)
        $relationships = $member->get_relationships();

        if (! $relationships) {
            $relationships = [];
            echo '<div class="renew-details" style="text-align: center">'.__('You are not a subscriber', 'membership').'</div>';
        }

        foreach ((array) $relationships as $key => $relation) {
            $sub     = Subscription::instance()->subscription($relation->sub_id);
            $adapter = Adapter::get($relation->usinggateway);
            $period  = $sub->getPeriod($relation);

            # cancellation button
            $cancel_button = method_exists($adapter, 'display_cancel_button')
                ? $adapter->display_cancel_button($sub)
                : false;

            // current user has subscription?
            $has_subscription = User::instance()->has_subscription(null, $relation->sub_id);

            # cancel subscription
            $cancel_subscription = ! $member->is_marked_for_expire($relation->sub_id) && $has_subscription
                ? $cancel_button
                : null;

            # subscription by credits(s)
            $use_credits = apply_filters('user_credit_account', $relation->updateddate ?? '');

            # next payment
            $next_payment = $cancel_subscription ? __($relation->expirydate) : 'no'; ?>
        <section class="renew-details">
            <?php
            if (has_filter(Credits::CREDIT_USER_ACC)) {
                echo $use_credits;
            } else {
                $subname = (SubscriptionPerCategory::instance()->isActive() ? ('- '.$sub->field('name')): ''); ?>
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 hidden-xs">
                    <span class="account-options"><?php echo __('Abo details', 'membership'); ?></span>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="account-option-name">
                        <?php echo __('Product Name', 'membership'); ?>
                    </div>
                    <div class="account-option-details">
                        <?php echo __(get_bloginfo('name'), 'membership') . " Video" . $subname ?>
                    </div>
                    <div class="account-option-name">
                        <?php echo __('Amount', 'membership'); ?>
                    </div>
                    <div class="account-option-details">
                        <?php echo __(Subscription::instance()->price($member->wp_user->ID)) . " " . $member_options->member_options['paymentcurrency']; ?>
                    </div>
                    <div class="account-option-name">
                        <?php echo __('Status', 'membership'); ?>
                    </div>
                    <div class="account-option-details">
                        <?php echo __($cancel_subscription ? 'active' : 'inactive', 'membership'); ?>
                    </div>
                    <div class="account-option-name">
                        <?php echo __('Renewal', 'membership'); ?>
                    </div>
                    <div class="account-option-details">
                        <?php echo __($cancel_subscription ? 'automatic' : 'no', 'membership'); ?>
                    </div>
                    <div class="account-option-name">
                        <?php echo __('Subscription', 'membership'); ?>
                    </div>
                    <div class="account-option-details">
                        <?php echo __($cancel_subscription ? $period : 'no', 'membership'); ?>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="account-option-name">
                      <?php echo __('First payment', 'membership'); ?>
                  </div>
                  <div class="account-option-details">
                      <?php echo __($relation->startdate); ?>
                  </div>
                  <div class="account-option-name">
                      <?php echo __('Last payment', 'membership'); ?>
                  </div>
                  <div class="account-option-details">
                      <?php echo __($relation->updateddate); ?>
                  </div>
                  <div class="account-option-name">
                      <?php echo __('Next payment', 'membership'); ?>
                  </div>
                  <div class="account-option-details">
                      <?php echo __($next_payment, 'membership'); ?>
                  </div>
                  <div class="account-option-name">
                      <?php echo __('Livetime', 'membership'); ?>
                  </div>
                  <div class="account-option-details">
                      <?php echo __($cancel_subscription ? 'indefinitely until canceled' : 'Subscription is disabled', 'membership'); ?>
                  </div>
                  <div class="cancel-account">
                      <?php echo $cancel_subscription; ?>
                  </div>
                </div>
            </div>
            <?php
            echo $addHotlineSupport;
            }
            ?>
        </section>
      <?php
        } ?>
      </div>
    </div>


</div>

<?php
// get the user update message
function getMessage(int $user_id) : string
{
    if (empty($_POST['action']) || $_POST['action'] !== 'update') {
        return '';
    }
    $msg = User::instance()->edit($user_id);
    if (empty($msg)) {
        return '';
    }
    return '<div id="message"><p style="text-align: center">'.$msg.'</p></div>';
}

get_footer(); ?>
