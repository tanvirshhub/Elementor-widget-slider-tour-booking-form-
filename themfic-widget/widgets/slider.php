<?php

class Elementor_Slider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'elementor_slider_widget';
    }

    public function get_title() {
        return esc_html__( 'Elementor Slider Widget', 'themefic_widget' );
    }

    public function get_icon() {
        return 'eicon-slides';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_slides',
            [
                'label' => esc_html__( 'Slides', 'themefic_widget' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'themefic_widget' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'overlay_color',
            [
                'label' => esc_html__( 'Overlay Color', 'themefic_widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-slide .overlay' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_control(
            'icon_list',
            [
                'label' => esc_html__( 'Icon List', 'themefic_widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'icon',
                        'label' => esc_html__( 'Icon', 'themefic_widget' ),
                        'type' => \Elementor\Controls_Manager::ICON,
                    ],
                    [
                        'name' => 'text',
                        'label' => esc_html__( 'Text', 'themefic_widget' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Your Text Here', 'themefic_widget' ),
                    ],
                ],
                'default' => [
                    [
                        'icon' => 'fa fa-star',
                        'text' => esc_html__( 'Star', 'themefic_widget' ),
                    ],
                    [
                        'icon' => 'fa fa-heart',
                        'text' => esc_html__( 'Heart', 'themefic_widget' ),
                    ],
                    // Add more default items as needed
                ],
            ]
        );

        $repeater->add_control(
            'subheading',
            [
                'label' => esc_html__( 'Subheading', 'themefic_widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Your Subheading Here', 'themefic_widget' ),
            ]
        );

        $repeater->add_control(
            'main_heading',
            [
                'label' => esc_html__( 'Main Heading', 'themefic_widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Your Main Heading Here', 'themefic_widget' ),
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'themefic_widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Read More', 'themefic_widget' ),
            ]
        );

        $repeater->add_control(
            'share_icons',
            [
                'label' => esc_html__( 'Share Icons', 'themefic_widget' ),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $repeater->add_control(
            'before_button_text',
            [
                'label' => esc_html__( 'Before Button Text', 'themefic_widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Before', 'themefic_widget' ),
            ]
        );

        $repeater->add_control(
            'next_button_text',
            [
                'label' => esc_html__( 'Next Button Text', 'themefic_widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Next', 'themefic_widget' ),
            ]
        );

        $this->add_control(
            'slides',
            [
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ main_heading }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="slick-slider">
        <?php foreach ( $settings['slides'] as $slide ) : ?>
            <div class="slick-slide">
                <?php if ( ! empty( $slide['image']['url'] ) ) : ?>
                    <div class="slide-image" style="background-image: url('<?php echo esc_url( $slide['image']['url'] ); ?>');">
                        <div class="overlay" style="background-color: <?php echo esc_attr( $slide['overlay_color'] ); ?>;"></div>
                    </div>
                <?php endif; ?>
                <h3><?php echo esc_html( $slide['subheading'] ); ?></h3>
                <h2><?php echo esc_html( $slide['main_heading'] ); ?></h2>
                <ul class="icon-list">
                    <?php foreach ( $slide['icon_list'] as $item ) : ?>
                        <li>
                            <i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
                            <?php echo esc_html( $item['text'] ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="#" class="your-button-class"><?php echo esc_html( $slide['button_text'] ); ?></a>

                <?php if ( ! empty( $slide['share_icons']['value'] ) ) : ?>
                    <div class="share-icons"><?php echo $slide['share_icons']['value']; ?></div>
                <?php endif; ?>

                <button class="before-button"><?php echo esc_html( $slide['before_button_text'] ); ?></button>
                <button class="next-button"><?php echo esc_html( $slide['next_button_text'] ); ?></button>
            </div>
        <?php endforeach; ?>
        </div>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor_Slider_Widget() );
