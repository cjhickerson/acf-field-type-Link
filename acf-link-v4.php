<?php

class acf_field_Link extends acf_field {

	// vars
	var $settings, // will hold info such as dir / path
		$defaults; // will hold default field options


	/*
	*  __construct
	*
	*  Set name / label needed for actions / filters
	*
	*  @since	3.6
	*  @date	23/01/13
	*/

	function __construct()
	{
		// vars
		$this->name = 'Link';
		$this->label = __('Link');
		$this->category = __("Basic",'acf'); // Basic, Content, Choice, etc
		$this->defaults = array(
			// add default here to merge into your field.
			// This makes life easy when creating the field options as you don't need to use any if( isset('') ) logic. eg:
			//'preview_size' => 'thumbnail'
			'new_window' => 'false',
			'no_follow' => 'false',
			'url' => '',
			'text' => '',
		);


		// do not delete!
    	parent::__construct();


    	// settings
		$this->settings = array(
			'path' => apply_filters('acf/helpers/get_path', __FILE__),
			'dir' => apply_filters('acf/helpers/get_dir', __FILE__),
			'version' => '1.0.0'
		);

	}


	/*
	*  create_options()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like below) to save extra data to the $field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field	- an array holding all the field's data
	*/

	function create_options( $field )
	{
		// defaults?
		/*
		$field = array_merge($this->defaults, $field);
		*/

		// key is needed in the field names to correctly save the data
		//$key = $field['link'];


		// Create Field Options HTML


	}


	/*
	*  create_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/

	function create_field( $field )
	{
		// defaults?
		/*
		$field = array_merge($this->defaults, $field);
		*/

		// perhaps use $field['preview_size'] to alter the markup?


		// create Field HTML
		if (!$field['value'] || !is_array($field['value'])) {
			$field['value'] = $this->defaults;
		}

		?>
		<style>
		.acf-field-link {
		}
		.acf-field-link > ul {
			list-style: none;
		}
		.acf-field-link > ul > li {
			float:left;
			width: 50%;
			padding: 10px 0 0;
		}
		.acf-field-link > ul > li .acf-input-wrap {
			padding-right: 15px;
		}
		.acf-field-link > ul > li:nth-child(even) .acf-input-wrap {
			padding-right: 0;
		}
		</style>
		<div class="acf-field-link">
			<ul class="acf-link-list horizontal">
				<li>
					<label for="<?php echo $field['name']; ?>[text]">Link Text</label>
					<div class="acf-input-wrap">
						<input class="text" placeholder="This is my link" type="text"
		 					name="<?php echo $field['name']; ?>[text]"
							value="<?php echo $field['value']['text']; ?>"
						>
					</div>
				</li>
				<li>
					<label for="<?php echo $field['name']; ?>[url]">Link URL</label>
					<div class="acf-input-wrap">
						<input class="text" placeholder="http://" type="text"
							name="<?php echo $field['name']; ?>[url]"
							value="<?php echo $field['value']['url']; ?>"
						>
					</div>
				</li>
				<li>
					<label>Open link in a new window?</label>
					<ul class="acf-radio-list radio horizontal acf-input-wrap">
						<li>
							<label>
								<input type="radio" name="<?php echo $field['name']; ?>[new_window]" value="false"
								<?php if ($field['value']['new_window'] == 'false') { ?> checked <?php } ?>>
								Current Window
							</label>
						</li>
						<li>
							<label>
								<input type="radio" name="<?php echo $field['name']; ?>[new_window]" value="true"
								<?php if ($field['value']['new_window'] == 'true') { ?> checked <?php } ?>>
								New Window
							</label>
						</li>
					</ul>
				</li>
				<li>
					<label>Allow Search Engines to follow?</label>
					<ul class="acf-radio-list radio horizontal acf-input-wrap">
						<li>
							<label>
								<input type="radio" name="<?php echo $field['name']; ?>[no_follow]" value="false"
								<?php if ($field['value']['no_follow'] == 'false') { ?> checked <?php } ?>>
								Allow Follow
							</label>
						</li>
						<li>
							<label>
								<input type="radio" name="<?php echo $field['name']; ?>[no_follow]" value="true"
								<?php if ($field['value']['no_follow'] == 'true') { ?> checked <?php } ?>>
								No Follow
							</label>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<div style="clear:both;">

		</div>
		<?php
	}

	/*
	*  update_field()
	*
	*  This filter is applied to the $field before it is saved to the database
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field - the field array holding all the field options
	*  @param	$post_id - the field group ID (post_type = acf)
	*
	*  @return	$field - the modified field
	*/

	function update_field( $field, $post_id )
	{

		if (isset($field['value']['url'])) {
			$field['value']['url'] = esc_url($field['value']['url']);
		}

		return $field;
	}


}


// create field
new acf_field_Link();

?>
