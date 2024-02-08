<?php

/**
 * Plugin Name: Blocks for debug
 * Description: Help welcome!
 * Version: 1.0
 * Author: Karolína Vyskočilová
 */

include_once __DIR__ . '/vendor/autoload.php';

wpify_custom_fields()->create_gutenberg_block( array(
	'name'        => 'wcf/test',
	'title'       => 'Test block',
    'example'         => array(
        'attributes' => array(
            'some_example_text' => 'Hello world!',
            'logo'  => 1, // Here I'd linke to somehow specify the attachment included in theme/plugin or URL
            'custom_param'  => "this will be stripped off"
        ),
    ),
	'items'       => array(
		array(
			'type'        => 'text',
			'title'       => 'Example text',
			'id'          => 'some_example_text',
			'description' => 'and example description',
			'label'       => 'with example label',
		),
		array(
            'type'  => 'attachment',
            'id'    => 'logo',
            'title' => 'test logo',
        ),
	),
	'render_callback' => function ( $attributes ) {
        $html = '<div class="frank_block">';
        $html .= '<p>' . $attributes['some_example_text'] . '</p>';
        $html .= wp_get_attachment_image($attributes['logo']);
        $html .= '</div>';
        return $html;
	},
) );

