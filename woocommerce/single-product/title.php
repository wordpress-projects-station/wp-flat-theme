<? if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<? 

	global $mods;
	
	if( $mods->titles_position == 'in-product' )
	{

		if( $mods->title_status ) {
			
			?>
			<h1>
				<strong>
					<? the_title(); ?>
				</strong>
			</h1>
			<?
		}
		
		if( $mods->subtitle_status && function_exists( 'get_the_subtitle' ) ) { 
		
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

		if( $mods->title_status||$mods->subtitle_status ) {
			?><div class="p-2"></div><?
		}
	}

?>



