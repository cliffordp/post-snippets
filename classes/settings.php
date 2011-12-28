<?php
/**
 * 
 */
class Post_Snippets_Settings
{

private $plugin_options;

public function set_options( $options )
{
	$this->plugin_options = $options;
}

public function render()
{
?>
<div class=wrap>
    <h2>Post Snippets NEW</h2>

	<form method="post" action="">
	<?php wp_nonce_field('update-options'); ?>

    <div class="tablenav">
        <div class="alignleft actions">
            <input type="submit" name="add-snippet" value="<?php _e( 'Add New Snippet', 'post-snippets' ) ?>" class="button-secondary" />
            <input type="submit" name="delete-selected" value="<?php _e( 'Delete Selected', 'post-snippets' ) ?>" class="button-secondary" />
			<span class="description"><?php _e( '(Use the help dropdown button above for additional information.)', 'post-snippets' ); ?></span>
        </div>
    </div>
    <div class="clear"></div>

    <table class="widefat fixed" cellspacing="0">
        <thead>
        <tr>
            <th scope="col" class="check-column"><input type="checkbox" /></th>
            <th scope="col" style="width: 180px;"><?php _e( 'Title', 'post-snippets' ) ?></th>
            <th scope="col" style="width: 180px;"><?php _e( 'Variables', 'post-snippets' ) ?></th>
            <th scope="col"><?php _e( 'Snippet', 'post-snippets' ) ?></th>
        </tr>
        </thead>
    
        <tfoot>
        <tr>
            <th scope="col" class="check-column"><input type="checkbox" /></th>
            <th scope="col"><?php _e( 'Title', 'post-snippets' ) ?></th>
            <th scope="col"><?php _e( 'Variables', 'post-snippets' ) ?></th>
            <th scope="col"><?php _e( 'Snippet', 'post-snippets' ) ?></th>
        </tr>
        </tfoot>
    
        <tbody>
		<?php 
		// $snippets = get_option($this->plugin_options);
		$snippets = $this->plugin_options;
		if (!empty($snippets)) {
			for ($i=0; $i < count($snippets); $i++) { ?>
			<tr class='recent'>
			<th scope='row' class='check-column'><input type='checkbox' name='checked[]' value='<?php echo $i; ?>' /></th>
			<td class='row-title'>
			<input type='text' name='<?php echo $i; ?>_title' value='<?php echo $snippets[$i]['title']; ?>' />
			</td>
			<td class='name'>
			<input type='text' name='<?php echo $i; ?>_vars' value='<?php echo $snippets[$i]['vars']; ?>' /><br/>
			<input type='checkbox' name='<?php echo $i; ?>_shortcode' value='true'<?php if ($snippets[$i]['shortcode'] == true) { echo " checked"; }?> /> <?php _e( 'Shortcode', 'post-snippets' ) ?><br/>
			<input type='checkbox' name='<?php echo $i; ?>_quicktag' value='true'<?php if ($snippets[$i]['quicktag'] == true) { echo " checked"; }?> /> <?php _e( 'Quicktag', 'post-snippets' ) ?><br/>
			<!-- <input type='checkbox' name='< ?php echo $i; ? >_php' value='true'< ?php if ($snippets[$i]['php'] == true) { echo " checked"; }? > /> < ?php _e( 'PHP Code', 'post-snippets' ) ? ><br/> -->
			</td>
			<td class='desc'>
			<textarea name="<?php echo $i; ?>_snippet" class="large-text" style='width: 100%;' rows="5"><?php echo htmlspecialchars($snippets[$i]['snippet'], ENT_NOQUOTES); ?></textarea>
			<?php _e( 'Description', 'post-snippets' ) ?>:
			<input type='text' style='width: 100%;' name='<?php echo $i; ?>_description' value='<?php if (isset( $snippets[$i]['description'] ) ) echo esc_html($snippets[$i]['description']); ?>' /><br/>
			</td>
			</tr>
		<?php
			}
		}
		?>
	    </tbody>
	</table>
	<div class="submit">
		<input type="submit" name="update-post-snippets" value="<?php _e( 'Update Snippets', 'post-snippets' ) ?>"  class="button-primary" /></div>
	</form>
</div>
<?php
}

}
