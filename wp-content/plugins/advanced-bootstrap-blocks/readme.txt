=== Advanced Bootstrap Blocks ===
Tags: bootstrap, responsive, layout, grid, page builder, container, columns, blocks, button, group, editor, gutenberg
Requires at least: 5.2
Tested up to: 5.9
Stable tag: trunk
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.txt

Build responsive Bootstrap 4 layouts inside the Gutenberg editor. 

== Description ==

This plugin adds flexible Bootstrap 4 blocks to the WordPress editor for creating custom page layouts with the Bootstrap grid.

Are you using Advanced Bootstrap Blocks? [Write a review](https://wordpress.org/plugins/advanced-bootstrap-blocks/#reviews)!

== Blocks == 

Advanced Bootstrap Blocks adds the following Bootstrap 4 blocks to the WordPress editor: 

* Container (fixed-width or fluid, with background image settings)
* Row
* Column
* Button and Button Group
* Card with Header, Body, Footer
* Jumbotron

== Block Templates == 

Do you need to create standard block layouts for WordPress pages and posts? The WordPress editor lets you define custom block templates inside your theme. 

The example below may get you started. Visit the [WordpPress Block Editor Handbook](https://developer.wordpress.org/block-editor/developers/block-api/block-templates/) to learn more about supercharging your WordPress themes with blocks templates. 

	<?php
	if(in_array('advanced-bootstrap-blocks/advanced-bootstrap-blocks.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
		// do stuff only if the Advanced Bootstrap Blocks plugin is active				
		add_action( 'init', 'advancedbootstrapblocks_register_page_template' );
		function advancedbootstrapblocks_register_page_template() {
			$post_type_object = get_post_type_object( 'page' );
			$isFluid = get_theme_mod( 'understrap_container_type' ) === 'container-fluid'; 
			$post_type_object->template = [
				[ 'advanced-bootstrap-blocks/container', 
					['className'=>'py-5', 'isWrapped' => $isFluid, 'isFluid' => false ], 
					[
						[ 'advanced-bootstrap-blocks/row', 
							[],
							[
								[ 'advanced-bootstrap-blocks/column', 
									['className'=>'col-md-8 offset-md-2 text-center'], 
									[
										['core/heading', 
											[ 'className' => 'display-4', 'level' => 1, 'placeholder' => 'Hello, World!', ], 
											[]
									],
										[ 'core/paragraph', 
											['className' => 'lead', 'placeholder' => 'Lorem ipsum dolor sit amet.', ], 
											[]
										],
									]
								]
							]
						]
					]
				],
			];
		}
	}


== Frequently Asked Questions ==

### Does this plugin add Bootstrap styles or scripts to my theme? 

This plugin does not add Bootstrap stylesheets or scripts to your website.

### This plugin is giving me trouble. Can you help?

Yes. Please submit issues, bugs, and feature requests through the [plugin support page](https://wordpress.org/support/plugin/advanced-bootstrap-blocks/).

== Changelog ==

### 1.8
* Bugfix: image alignment within blocks
* Update: replace build process with @wordpress/scripts 
* Update: update deprecated functions (withState -> useState, block_categories -> block_categories_all)

### 1.7
* Bugfix: fix right-hand props.className assignment in editor.BlockListBlock filters

### 1.6
* Bugfix: remove forced Column padding reset
* Bugfix: fix Card Header content bug
* Bugfix: assign key to to mapped values in padding + margin inspectors

### 1.5
* Bugfix: improve drag/drop Container block behavior in WordPress v5.5.1
* Adjust visibility of blocks with .modal and .d-*-none classNames

### 1.4
* Add Jumbotron block
* Remove allowed block restriction from Container

### 1.3
* Remove default block classnames
* Improve editor block outlines
* Legacy support for wp 5.1+
* Bugfix: fix issue with inline svg icon

### 1.2.4-1.2.6
* Hotfix: Fix and improve missing block outlines in WP 5.4
* Improve Column block display

### 1.2.3
* Feature: Add Offset controls to Column inspector

### 1.2.2
* Feature: Add Column class controls
* Add block template example to README

### 1.2.1
* Bugfix: Remove unsupported regex from Padding and Block margin controls

### 1.2.0
* Feature: Add Block Padding and Block Margin controls
* Bugfix: Improve 'Bootstrap Classes' filtering
* Bugfix: Fix bad link in README

### 1.1.10
* Bugfix: Remove front-end dependency injection

### 1.1.9 
* Bugfix: Add outline to Row and Column blocks outside of Container

### 1.1.8 
* Bugfix: Prevent long words from forcing Column blocks onto next row 

### 1.1.7 
* Bugfix: Add'l fix to save Anchor (ID) when added to Container 

### 1.1.6
* Bugfix: Save Anchor (ID) when added to Container, Row, Column, and Button blocks 

### 1.1.5
* Add Anchor (ID) support to Container, Row, Column, and Button blocks
* Bugfix: allow blocks to be dropped in empty Column blocks

### 1.1.4 
* Override block outlines with original outline colors
* Replaced icon on all blocks with Bootstrap-branded icon
* Updated default state of Card block to match basic Bootstrap 4 example
* Retitled Container "Background Settings" to "Background Image Settings"
* Minor changes to block editor UI

### 1.1.3
* Added Button Group block
* Removed colored block outlines (made redundant by WP 5.3 release)
* Modified initial state of Container block (defaults to 3 columns) 
* Modified initial state of Card block (includes Card Header, Card Body, and Card Footer)

### 1.1.1-1.1.2
* Removed vertical margin from blocks in WordPress v5.3

### 1.1.0
* Added `Card`, `CardHeader`, and `CardBody` blocks
* Added `Bootstrap Classes` inspector utility for toggling BS4 classes

### 1.0.10
* Added background size, repeat, and position settings to Container `Background Image` settings
* Fixed namespacing and inheritance issues with editor-specific Bootstrap grid styles
* Removed unneeded wrapping div from around Container in WP editor

### 1.0.9
* Fixed bug with `Container` save markup
* Fixed bug with `Button` text state 

### 1.0.8
* Added background-image selector to `Container` block (adds `style="background-image:url();"` to `Container` markup)

### 1.0.7
* Refined `Button` block (add URL picker, button text is directly editable)
* General UI improvements

### 1.0.6
* Made column .offset-* classes available in editor
* Updated Button editor UI (per standards in WP editor handbook)
* Improved block selection w/ CSS pointer-events

### 1.0.5
* All Bootstrap styles now included in editor by default (this may change in the future)
* Fixed bug with omission of custom container classNames in editor
* Increased padding around main container layout

### 1.0.4
* Added basic `Button` component (with style, block, size, outline, new-window settings) 
* Minor README changes
