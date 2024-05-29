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
				'label' => esc_html__( 'Menu Style', 'cf-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'cf-plugin-space-between',
			[
				'label' => esc_html__( 'Space Between', 'cf-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .cf-plugin-nav-menu .menu' => 'column-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'cf-plugin-Vertical-Space',
			[
				'label' => esc_html__( 'Vertical Space', 'cf-plugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .cf-plugin-nav-menu .menu' => 'row-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'cf-plugin-link-hover-effect',
			[
				'label' => esc_html__( 'Link Hover Effect', 'cf-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'none' => esc_html__( 'None', 'cf-plugin' ),
					'underline'  => esc_html__( 'Underline', 'cf-plugin' ),
					'overline' => esc_html__( 'Overline', 'cf-plugin' ),
					'line-through' => esc_html__( 'line through', 'cf-plugin' ),
				],
				'selectors' => [
					'{{WRAPPER}} .cf-plugin-nav-menu .menu .menu-item a:hover' => 'text-decoration: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .cf-plugin-nav-menu .menu .menu-item a',
			]
		);

        // Items Active Hover and Normal Style Start 
        $this->start_controls_tabs(
			'style_tabs'
		);

            // Normal Style start
            $this->start_controls_tab(
                'style_normal_tab',
                [
                    'label' => esc_html__( 'Normal', 'textdomain' ),
                ]
            );
            $this->add_control(
                'text_normal_color',
                [
                    'label' => esc_html__( 'Text Color', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cf-plugin-nav-menu .menu .menu-item a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'normal_background',
                    'types' => [ 'classic', 'gradient' ],
                    'exclude' => ['image'],
                    'selector' => '{{WRAPPER}} .cf-plugin-nav-menu .menu .menu-item a',
                ]
            );
            $this->add_control(
                'cf-plugin_padding',
                [
                    'label' => esc_html__( 'Padding', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%'],
                    'default' => [
                        'top' => 0,
                        'right' => 0,
                        'bottom' => 0,
                        'left' => 0,
                        'unit' => 'px',
                        'isLinked' => true,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .cf-plugin-nav-menu .menu .menu-item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'cf-plugin_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%'],
                    'default' => [
                        'top' => 0,
                        'right' => 0,
                        'bottom' => 0,
                        'left' => 0,
                        'unit' => 'px',
                        'isLinked' => true,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .cf-plugin-nav-menu .menu .menu-item a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            // Normal Style End

            // ---------------------------------------------
            // Hover Style start
            $this->start_controls_tab(
                'style_Hover_tab',
                [
                    'label' => esc_html__( 'Hover', 'textdomain' ),
                ]
            );
            $this->add_control(
                'text_hover_color',
                [
                    'label' => esc_html__( 'Text Color', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cf-plugin-nav-menu .menu .menu-item a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'hover_background',
                    'types' => [ 'classic', 'gradient' ],
                    'exclude' => ['image'],
                    'selector' => '{{WRAPPER}} .cf-plugin-nav-menu .menu .menu-item a:hover',
                ]
            );
            $this->end_controls_tab();
            // Hover Style End

            // ---------------------------------------------
            // Active Style start
            $this->start_controls_tab(
                'style_active_tab',
                [
                    'label' => esc_html__( 'Active', 'textdomain' ),
                ]
            );
            $this->add_control(
                'text_active_color',
                [
                    'label' => esc_html__( 'Text Color', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cf-plugin-nav-menu .menu .current-menu-item a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'active_background',
                    'types' => [ 'classic', 'gradient' ],
                    'exclude' => ['image'],
                    'selector' => '{{WRAPPER}} .cf-plugin-nav-menu .menu .current-menu-item a',
                ]
            );
            $this->end_controls_tab();
            // Active Style End

            // ------------------------------------------------

            $this->end_controls_tabs();
            // Items Active Hover and Normal Style End
            // ========================================================



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
                flex-wrap:wrap;
                              
           }
           .cf-plugin-nav-menu .menu .sub-menu{
                display:none;
           }
           .cf-plugin-nav-menu .menu .menu-item a{
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