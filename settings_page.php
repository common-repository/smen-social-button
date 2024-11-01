<div class="wrap">
	<h2>Smen social button</h2>

	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>

		<table class="form-table">

			<tr valign="top">
				<th scope="row">Vertical position within a post</th>
				<td>
					<select name="smenVerticalPosition">
						<option value="top" <?php if(get_option('smenVerticalPosition') == 'top') echo 'selected="selected"' ?>>top</option>
						<option value="bottom" <?php if(get_option('smenVerticalPosition') == 'bottom') echo 'selected="selected"' ?>>bottom</option>
					</select>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">Horizontal position within a post</th>
				<td>
					<select name="smenHorizontalPosition">
						<option value="right" <?php if(get_option('smenHorizontalPosition') == 'right') echo 'selected="selected"' ?>>right</option>
						<option value="left" <?php if(get_option('smenHorizontalPosition') == 'left') echo 'selected="selected"' ?>>left</option>
					</select>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">Use custom placement</th>
				<td>
					<input type="checkbox" name="smenCustomPlacement" value="true" <?php if(get_option('smenCustomPlacement') == 'true') echo 'checked="checked"' ?> />
					<p>
						When checked, the vote button will not be displayed.<br />
						You will have to manually update your template to include the <code><?php echo htmlspecialchars('<?php displaySmenVote() ?>') ?></code> tag.<br />
						This provides great flexibility if you wish to customize the button's position.
					</p>
				</td>
			</tr>

		</table>

		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="smenVerticalPosition,smenHorizontalPosition,smenCustomPlacement" />

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>

	</form>
</div>