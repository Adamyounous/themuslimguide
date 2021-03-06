<?php

function business_prime_upgrade_control($wp_customize) {

	class Business_Prime_Upsale_Customize_Control extends WP_Customize_Section {
		public $type = 'themefarmer-upsell';
		public function render() {
			$classes = 'accordion-section control-section-' . $this->type;
			$id      = 'themefarmer-upsell-buttons-section';
			?>
		    <li id="accordion-section-<?php echo esc_attr($this->id); ?>"class="<?php echo esc_attr($classes); ?>">
		        <div class="themefarmer-upsale">
		          	<a href="<?php echo esc_url('https://www.themefarmer.com/product/business-prime-pro/'); ?>" target="_blank" class="themefarmer-upsale-bt" id="themefarmer-pro-button"><?php _e('VIEW PRO VERSION ', 'business-prime');?></a>
		        </div>
		    </li>
		    <?php
		}

	}

	$wp_customize->add_section(new Business_Prime_Upsale_Customize_Control($wp_customize, 'business-prime-upsell', array(
		'priority' => '200',
	)));

}

function business_prime_settings_control($wp_customize) {

	class Business_Prime_Page_Dropdown_Control extends WP_Customize_Control {

		public function render_content() {
			$pages = get_pages(array('hide_empty' => false));
			if (!empty($pages)): ?>
            <label>
              	<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
              	<select <?php $this->link();?>>
                <option value="0"><?php esc_html_e('Select Page', 'business-prime');?></option>
              	<?php
					foreach ($pages as $page):
							printf('<option value="%s" %s>%s</option>',
								$page->ID,
								selected($this->value(), $page->ID, false),
								$page->post_title
							);
					endforeach;
				?>
              	</select>
            </label>
          	<?php
		endif;
		}

	}

/** Social **/

	$wp_customize->add_section('business_prime_top_bar_section', array(
		'title'      => __('Social Settings', 'business-prime'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting('business_prime_social_new_tab',
		array(
			'default'           => true,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'business_prime_sanitize_checkbox',
		));

	$wp_customize->add_control('business_prime_social_new_tab', array(
		'type'     => 'checkbox',
		'priority' => 200,
		'section'  => 'business_prime_top_bar_section',
		'label'    => __('Open social links in new tab', 'business-prime'),
	));

	$wp_customize->add_setting('business_prime_social_link_facebook',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'business_prime_sanitize_url',
		)
	);

	$wp_customize->add_control('business_prime_social_link_facebook', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'business_prime_top_bar_section',
		'label'    => __('Facebook Page URL', 'business-prime'),
	));

	$wp_customize->add_setting('business_prime_social_link_google', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'business_prime_sanitize_url',
	));

	$wp_customize->add_control('business_prime_social_link_google', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'business_prime_top_bar_section',
		'label'    => __('Google Page URL', 'business-prime'),
	));

	$wp_customize->add_setting('business_prime_social_link_youtube', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'business_prime_sanitize_url',
		)
	);

	$wp_customize->add_control('business_prime_social_link_youtube', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'business_prime_top_bar_section',
		'label'    => __('Youtube Page URL', 'business-prime'),
	));

	$wp_customize->add_setting('business_prime_social_link_twitter', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'business_prime_sanitize_url',
		)
	);
	$wp_customize->add_control('business_prime_social_link_twitter', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'business_prime_top_bar_section',
		'label'    => __('Twitter Page URL', 'business-prime'),
	));

	$wp_customize->add_setting('business_prime_social_link_linkedin', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'business_prime_sanitize_url',
		)
	);
	$wp_customize->add_control('business_prime_social_link_linkedin', array(
		'type'     => 'url',
		'priority' => 200,
		'section'  => 'business_prime_top_bar_section',
		'label'    => __('Linkedin Page URL', 'business-prime'),
	));

/** Social **/

/** Slider **/

	$wp_customize->add_section('business_prime_slider_section', array(
		'title'      => __('Slider Settings', 'business-prime'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting('business_prime_hide_slider',
		array(
			'default'           => false,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'business_prime_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('business_prime_hide_slider', array(
		'type'     => 'checkbox',
		'priority' => 1,
		'section'  => 'business_prime_slider_section',
		'label'    => __('Hide Slider ', 'business-prime'),
	));

	
	for ($i = 1; $i <= 3; $i++) {

        $wp_customize->add_setting( 'business_prime_slide_' . $i, array(
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'absint',
        ));

        $wp_customize->add_control(
            new Business_Prime_Page_Dropdown_Control(
                $wp_customize, 'business_prime_slide_' . $i,
                array(
                    'label'    => sprintf(__('Slide %s Page', 'business-prime'), $i),
                    'section'  => 'business_prime_slider_section',
                    'priority' => 1,
        )));

    }

	$wp_customize->add_setting('business_prime_slide_button_text',
		array(
			'default'           => __('Click To Begin', 'business-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'business_prime_sanitize_nohtml',
		));

	$wp_customize->add_control('business_prime_slide_button_text', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'business_prime_slider_section',
		'label'    => __('Button Text', 'business-prime'),
	));

	$wp_customize->add_setting('business_prime_slide_button_link',
		array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'business_prime_sanitize_url',
		));

	$wp_customize->add_control('business_prime_slide_button_link', array(
		'type'     => 'url',
		'priority' => 1,
		'section'  => 'business_prime_slider_section',
		'label'    => __('Button Link', 'business-prime'),
	));


	$wp_customize->add_setting( 'business_prime_slider_info', array(
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(
        new Business_Prime_Info_Text(
            $wp_customize, 'business_prime_slider_info',
            array(
                'label'       => __('INFO: Slide Content', 'business-prime'),
                'description' => __('Use WoedPress Page for slide. Featured Image Works as slide image, Page Title as Slide Caption Heading and Page Content As description', 'business-prime'),
                'section'  => 'business_prime_slider_section',
                'priority' => 1,
    )));

/** Slider **/

/** servces **/

	$wp_customize->add_section('business_prime_services_section', array(
		'title'      => __('Services Settings', 'business-prime'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting('business_prime_services_header', array(
			'default'           => __('Service Heading Text', 'business-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('business_prime_services_header', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'business_prime_services_section',
		'label'    => __('Service Heading Text', 'business-prime'),
	));

	$wp_customize->add_setting('business_prime_services_desc', array(
			'default'           => __('Service Sub Heading Text', 'business-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('business_prime_services_desc', array(
		'type'     => 'textarea',
		'priority' => 1,
		'section'  => 'business_prime_services_section',
		'label'    => __('Service Sub Heading Text', 'business-prime'),
	));

	for ($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting('business_prime_services_icon_'. $i, array(
			'default'           => 'fa-star',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('business_prime_services_icon_'. $i, array(
			'type'     => 'text',
			'priority' => 1,
			'section'  => 'business_prime_services_section',
			'label'    => sprintf(__('Service %s Icon', 'business-prime'), $i),
		));

        $wp_customize->add_setting( 'business_prime_service_' . $i, array(
                'type'              => 'theme_mod',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'absint',

        ));

        $wp_customize->add_control(
            new Business_Prime_Page_Dropdown_Control(
                $wp_customize, 'business_prime_service_' . $i,
                array(
                    'label'    => sprintf(__('Service %s Page', 'business-prime'), $i),
                    'section'  => 'business_prime_services_section',
                    'priority' => 1,
        )));
    }

    $wp_customize->add_setting( 'business_prime_service_icon_info', array(
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',

    ));

    $wp_customize->add_control(
        new Business_Prime_Info_Text(
            $wp_customize, 'business_prime_service_icon_info',
            array(
                'label'       => __('INFO: Change Icon', 'business-prime'),
                'description' => sprintf(__('Use FontAwesome Icon class to change icon <a href="%s" target="_blank">See More Icons</a>', 'business-prime'), esc_url('http://fontawesome.io/icons/')),
                'section'  => 'business_prime_services_section',
                'priority' => 1,
    )));

    
/** servces **/

/** CTA **/
	$wp_customize->add_section( 'business_prime_home_cta_section', array(
		'title'         =>    __( 'Callout Options', 'business-prime' ), 
		'priority'      =>    1, 
		'capability'    =>    'edit_theme_options', 
	));

	$wp_customize->add_setting('business_prime_callout', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',

	));
	$wp_customize->add_control(new Business_Prime_Page_Dropdown_Control($wp_customize, 'business_prime_callout',
		array(
			'label'    => __('Callout Details Page', 'business-prime'),
			'section'  => 'business_prime_home_cta_section',
			'priority' => 1,
	)));


	$wp_customize->add_setting( 'business_prime_home_cta_one_text', array(
			'default' => __('Register Now','business-prime'),
			'type' => 'theme_mod', 
			'capability' => 'edit_theme_options', 
			'transport' => 'refresh', 
			'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control( 'business_prime_home_cta_one_text', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'business_prime_home_cta_section',
		'label'    => __('Button One Text', 'business-prime'),
		));

	$wp_customize->add_setting( 'business_prime_home_cta_one_url', 
		array(
			'default' =>'#',
			'type' => 'theme_mod', 
			'capability' => 'edit_theme_options', 
			'transport' => 'refresh', 
			'sanitize_callback' => 'business_prime_sanitize_url',
			));

	$wp_customize->add_control( 'business_prime_home_cta_one_url', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'business_prime_home_cta_section',
		'label'    => __('Button One URL', 'business-prime'),
		));


	$wp_customize->add_setting( 'business_prime_home_cta_two_text', array(
			'default' => __('View Details','business-prime'),
			'type' => 'theme_mod', 
			'capability' => 'edit_theme_options', 
			'transport' => 'refresh', 
			'sanitize_callback' => 'sanitize_text_field',
			));

	$wp_customize->add_control( 'business_prime_home_cta_two_text', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'business_prime_home_cta_section',
		'label'    => __('Button Two Text', 'business-prime'),
	));

	$wp_customize->add_setting( 'business_prime_home_cta_two_url', array(
			'default' => '#',
			'type' => 'theme_mod', 
			'capability' => 'edit_theme_options', 
			'transport' => 'refresh', 
			'sanitize_callback' => 'business_prime_sanitize_url',
	));

	$wp_customize->add_control( 'business_prime_home_cta_two_url', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'business_prime_home_cta_section',
		'label'    => __('Button Two URL', 'business-prime'),
	));

/** CTA **/

/** Latest Posts **/

	$wp_customize->add_section('business_prime_home_blog_section', array(
		'title'      => __('Latest Blogs Settings', 'business-prime'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_setting('business_prime_home_blog_heading',
		array(
			'default'           => __('Our Blogs', 'business-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));
	$wp_customize->add_control('business_prime_home_blog_heading', array(
		'type'     => 'text',
		'priority' => 1,
		'section'  => 'business_prime_home_blog_section',
		'label'    => __('Heading', 'business-prime'),
	));

	$wp_customize->add_setting('business_prime_home_blog_desc',
		array(
			'default'           => __('Be updated with latest news', 'business-prime'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));
	$wp_customize->add_control('business_prime_home_blog_desc', array(
		'type'     => 'textarea',
		'priority' => 1,
		'section'  => 'business_prime_home_blog_section',
		'label'    => __('Description', 'business-prime'),
	));

/** Latest Posts **/


	$wp_customize->get_section('title_tagline')->priority     = 10;
	$wp_customize->get_section('static_front_page')->priority = 30;
	$wp_customize->get_section('header_image')->priority      = 50;

	$wp_customize->get_setting( 'blogname' )->transport 		= 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport 	= 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
}

add_action('customize_register', 'business_prime_upgrade_control');
add_action('customize_register', 'business_prime_settings_control');

if (class_exists('WP_Customize_Control')):
	class Business_Prime_Info_Text extends WP_Customize_Control{

	    public function render_content(){
	    ?>
		    <span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
			</span>

			<?php if($this->description){ ?>
				<span class="description customize-control-description">
				<?php echo wp_kses_post($this->description); ?>
				</span>
			<?php }
	    }

	}
endif;

?>
