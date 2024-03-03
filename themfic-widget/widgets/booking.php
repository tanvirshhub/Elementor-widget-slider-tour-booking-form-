<?php

class Elementor_booking_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'tour_booking';
    }

    public function get_title()
    {
        return 'Tour Booking';
    }

    public function get_icon()
    {
        return 'eicon-booking';
    }

    public function get_categories()
    {
        return ['general'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_booking_style',
            [
                'label' => esc_html__('Booking Form Style', 'your-text-domain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label' => esc_html__('Label Color', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-items label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'input_color',
            [
                'label' => esc_html__('Input Color', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-items input' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Button Color', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Button Background Color', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_booking_content',
            [
                'label' => esc_html__('Booking Form Content', 'your-text-domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'destination_label',
            [
                'label' => esc_html__('Destination Label', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Destination:', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'check_in_label',
            [
                'label' => esc_html__('Check-In Date Label', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Check-In Date:', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'check_out_label',
            [
                'label' => esc_html__('Check-Out Date Label', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Check-Out Date:', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'adults_label',
            [
                'label' => esc_html__('Adults Label', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Adults:', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'children_label',
            [
                'label' => esc_html__('Children Label', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Children:', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Search Now', 'your-text-domain'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $this->render_booking_form();
    }

    protected function render_booking_form()
    {
        $settings = $this->get_settings_for_display();
?>
        <style>
            .single-items label {
                color: <?php echo esc_attr($settings['label_color']); ?>;
            }

            .single-items input {
                color: <?php echo esc_attr($settings['input_color']); ?>;
            }

            button {
                color: <?php echo esc_attr($settings['button_color']); ?>;
                background-color: <?php echo esc_attr($settings['button_bg_color']); ?>;
            }
        </style>

        <form id="booking-form">
            <div class="single-items">
                <label for="destination"><?php echo esc_html($settings['destination_label']); ?></label>
                <input type="text" id="destination" placeholder="Where are you going?" name="destination" required>
            </div>
            <div class="single-items">
                <label for="check-in"><?php echo esc_html($settings['check_in_label']); ?></label>
                <input type="date" id="check-in" name="check-in" required>
            </div>
            <div class="single-items">
                <label for="check-out"><?php echo esc_html($settings['check_out_label']); ?></label>
                <input type="date" id="check-out" name="check-out" required>
            </div>
            <div class="single-items">
                <label for="adults"><?php echo esc_html($settings['adults_label']); ?></label>
                <input type="number" id="adults" name="adults" min="1" required>
            </div>
            <div class="single-items">
                <label for="children"><?php echo esc_html($settings['children_label']); ?></label>
                <input type="number" id="children" name="children" min="0" required>
            </div>
            <div class="single-items">
                <label for="children"><?php echo esc_html($settings['children_label']); ?></label>
                <input type="number" id="children" name="children" min="0" required>
            </div>
            <button type="submit"><?php echo esc_html($settings['button_text']); ?> <i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
<?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_booking_Widget());
