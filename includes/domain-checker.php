<?php
vc_map( array(
        "name" =>"Domain Checker",
        "base" => "wpdomainchecker",
        "description" => "Domain Checker",
		"category" => esc_html__("Hosting Press", "hostingpress"),
        "params" => array(
					array(
					"type" => "textfield",
					"heading" => esc_html__( "Button Label", 'hostingpress' ),
					"param_name" => "button",
					"value"=>'',
					"description" => esc_html__( "Button Label", 'hostingpress')
					),
					array(
						'heading' => esc_html__('reCaptcha', 'hostingpress') ,
						"description" => esc_html__( "Protect your domain checker from spam and abuse.", 'hostingpress'),
						'param_name' => 'recaptcha',
						'value' => array( esc_html__( 'Enable', 'hostingpress' ) => 'yes'),
						'type' => 'checkbox',
						'std' => '',
					) ,	
					array(
						'heading' => esc_html__('Advanced Options', 'hostingpress') ,
						"description" => esc_html__( "Show Advanced Options", 'hostingpress'),
						'param_name' => 'advanced',
						'value' => array( esc_html__( 'Enable', 'hostingpress' ) => 'enable'),
						'type' => 'checkbox',
						'std' => '',
					) ,
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Width', 'hostingpress' ),
						'param_name' => 'width',
						'value'=>'',
						'description' => esc_html__( 'To make it responsive just leave it.', 'hostingpress'),
						"dependency" => array('element'=>'advanced','value'=>array('enable')),
					),					
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Product ID', 'hostingpress' ),
						'param_name' => 'item_id',
						'value'=>'',
						'description' => esc_html__( 'For multiple checker for multiple product WooCommerce.', 'hostingpress'),
						"dependency" => array('element'=>'advanced','value'=>array('enable')),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'TLDs', 'hostingpress' ),
						'param_name' => 'tld',
						'value'=>'',
						'description' => esc_html__( 'Multiple TLDs check if user not define tld on the domain. (e.g: com,net,org,info)', 'hostingpress'),
						"dependency" => array('element'=>'advanced','value'=>array('enable')),
					),
					
        ),
    ) );
?>