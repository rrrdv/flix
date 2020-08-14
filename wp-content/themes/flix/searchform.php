<?php
$onkeydown = 'onKeyDown="
	if (this.value.length == 35 && 
		event.keyCode != 13 && 
		event.keyCode != 8 && 
		event.keyCode != 37 && 
		event.keyCode != 38 && 
		event.keyCode != 39 && 
		event.keyCode != 40
	) return false;"';

$onsubmit = 'onsubmit = "
	if (document.getElementsByClassName(\'s\')[0].value == \'\') {
		return false;
	}"';

?>

<form class="vlog-search-form" action="<?php echo esc_url(home_url('/')); ?>" method="get" <?php echo $onsubmit; ?>>
	<input class="s" name="s" <?php echo $onkeydown; ?> 
		type="text" 
		maxlength="35" 
		value="<?php echo (isset($_GET['s']) ? $_GET['s'] : ''); ?>" 
		placeholder="<?php echo esc_attr(__vlog('search_placeholder')); ?>" />
	<button type="submit" class="vlog-button-search"><i class="fv fv-search"></i></button>
</form>
