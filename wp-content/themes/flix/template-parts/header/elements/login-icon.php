<?php
    $args = [
      'post_type' => 'page',
      'fields' => 'ids',
      'nopaging' => true,
      'meta_key' => '_wp_page_template',
      'meta_value' => 'account.php'
    ];
    $pages = get_posts( $args );
    if (is_array($pages) && count($pages)==1) {
        $id_page = $pages[0];
    }
 ?>

<li class="vlog-actions-button vlog-action-login">
  <?php if (is_user_logged_in()) { ?>
        <span><a href="<?php echo get_permalink($id_page); ?>"><i class="fv fv-author"></i></a></span>
  <?php } else { ?>
	     <span><a href="/login.php"><i class="fv fv-author"></i></a></span>
  <?php } ?>
</li>
