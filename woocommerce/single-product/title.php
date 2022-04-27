<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<? 

	global $mods;
	
	if( !$mods->heading_status && $mods->title_status ) {
		
		?>
		<h1 class="display-4">
			<strong>
				<? the_title(); ?>
			</strong>
		</h1>
		<?
	}
	
	if( !$mods->heading_status && $mods->subtitle_status && function_exists( 'get_the_subtitle' ) ) { 
	
		$subtitle = get_the_subtitle();

		if(strlen($subtitle)) {
			?>
				<div class="p-2"></div>
				<h3 class="mt-2 mb-2 fs-4">
					<?=$subtitle?>
				</h3>
			<?
		}
	}

	if( !$mods->heading_status ) {
		?><div class="p-2"></div><?
	}

?>



