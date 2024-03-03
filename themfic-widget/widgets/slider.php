<?php

class Elementor_Slider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'Theslider';
    }

    public function get_title() {
        return esc_html__('Elementor Slider Widget', 'themefic_widget');
    }

    public function get_icon() {
        return 'eicon-post-slider';
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'themefic_widget'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Add controls for multiple sliders using repeater
        $this->add_control(
            'slides',
            [
                'label'   => esc_html__('Slides', 'themefic_widget'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $this->get_slider_fields(),
                'default' => [
                    [
                        'image' => [
                            'url' => 'http://placehold.it/350x300?text=1',
                        ],
                    ],
                    [
                        'image' => [
                            'url' => 'http://placehold.it/350x300?text=2',
                        ],
                    ],
                    [
                        'image' => [
                            'url' => 'http://placehold.it/350x300?text=3',
                        ],
                    ],
                    // Add more default slides as needed
                ],
                'title_field' => '{{{ image.url }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function get_slider_fields() {
        return [
            [
                'name'  => 'image',
                'label' => esc_html__('Image', 'themefic_widget'),
                'type'  => \Elementor\Controls_Manager::MEDIA,
            ],
            [
                'name'  => 'subheading',
                'label' => esc_html__('Subheading', 'themefic_widget'),
                'type'  => \Elementor\Controls_Manager::TEXT,
            ],
            [
                'name'  => 'main_heading',
                'label' => esc_html__('Main Heading', 'themefic_widget'),
                'type'  => \Elementor\Controls_Manager::TEXT,
            ],
            [
                'name'  => 'button_text',
                'label' => esc_html__('Button Text', 'themefic_widget'),
                'type'  => \Elementor\Controls_Manager::TEXT,
            ],
            // Add other controls as needed for each slide
        ];
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Render slides with repeater data
        ?>
        <section class="center slider">
            <?php foreach ($settings['slides'] as $slide) : ?>
                <div>
                    <img src="<?php echo esc_url($slide['image']['url']); ?>">
                    <h3><?php echo esc_html($slide['subheading']); ?></h3>
                    <h2><?php echo esc_html($slide['main_heading']); ?></h2>
                    <a href="#" class="your-button-class"><?php echo esc_html($slide['button_text']); ?></a>
                    <!-- Add other elements for each slide as needed -->
                </div>
            <?php endforeach; ?>
        </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_Slider_Widget());
