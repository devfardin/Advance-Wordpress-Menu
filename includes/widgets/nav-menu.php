<?php
class Elementor_nav_menu extends \Elementor\Widget_Base {

    public function get_name() {
        return 'nav_menu';
    }
    public function get_title() {
        return esc_html__( 'Nav Menu', 'cf-plugin' );
    }
    public function get_icon() {
        return 'eicon-menu-bar';
    }
    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'nav_menu','cf-plugin' ];
    }
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'cf-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Menu Selector
        $this->add_control(
			'cf_nav_menu_id',
			[
				'label' => esc_html__( 'Menu Id', 'cf-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '1', 'cf-plugin' ),
				'placeholder' => esc_html__( 'Your Menu Id Here', 'cf-plugin' ),
			]
		);

        // Menu Horizental Alignment
        $this->add_control(
			'cf-plugin',
			[
				'label' => esc_html__( 'Alignment', 'cf-plugin' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'cf-plugin' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'cf-plugin' ),
						'icon' => 'eicon-h-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'Right', 'cf-plugin' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .cf-plugin-nav-menu .menu' => ' justify-content: {{VALUE}};',
				],
			]
		);
        // Menu Vertical Alignment
        $this->add_control(
			'cf-plugin-Vertical',
			[
				'label' => esc_html__( 'Vertical Alignment', 'cf-plugin' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'cf-plugin' ),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'cf-plugin' ),
						'icon' => 'eicon-v-align-middle',
					],
					'flex-end' => [
						'title' => esc_html__( 'Right', 'cf-plugin' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .cf-plugin-nav-menu .menu' => '  align-items: {{VALUE}};',
				],
			]
		);
        $this->end_controls_section();
        // Content Tab End

        // Style Tab Here
        $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->end_controls_section();
        // Style Tab End

    }

    protected function render() {
        $settings = $this->get_settings_for_display(); 
    ?>
        <?php $this->inline_style(); ?>

        <div class='cf-plugin-nav-menu'>
            <?php
                wp_nav_menu( array(
                    'menu' => $settings['cf_nav_menu_id'],
                    'container'=> ''
                    )
                );
                ?>
        </div>
    <?php
    }

    protected function inline_style(){
        ?>
        <style>
           .cf-plugin-nav-menu .menu {
                list-style: none;
                margin:0;
                padding:0;
                display:flex;
                gap:20px;
                              
           }
           .cf-plugin-nav-menu .menu .sub-menu{
                display:none;
           }
           .cf-plugin-nav-menu .menu .menu-item a{
                color:  #010101;
                font-family: Gilroy;
                font-size: 20px;
                font-style: normal;
                font-weight: 400;
                line-height: 32px;
                transition: all 0.3s;
           }
           .cf-plugin-nav-menu .menu .menu-item a:hover{
                color:  #298D06;
           }
           .cf-plugin-nav-menu .menu .current-menu-item a{
                color: #298D06;               
           } 
           .cf-plugin-nav-menu .menu .sub-menu .menu-item a{
                color: var(--Black, #010101);
                font-family: Gilroy;
                font-size: 20px;
                font-style: normal;
                font-weight: 400;
                line-height: 32px;
           }
        </style>
        <?php
    }


}