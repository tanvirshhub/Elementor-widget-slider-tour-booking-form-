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

    protected function render()
    {

        $this->render_booking_form();
    }

    protected function render_booking_form()
    {
?>
        <form id="booking-form">
            <div class="single-items">
                <label for="destination">Destination:</label>
                <input type="text" id="destination" placeholder="Where are you going?" name="destination" required>
            </div>
            <div class="single-items">
                <label for="check-in">Check-In Date:</label>
                <input type="date" id="check-in" name="check-in" required>
            </div>
            <div class="single-items">
                <label for="check-out">Check-Out Date:</label>
                <input type="date" id="check-out" name="check-out" required>
            </div>
            <div class="single-items">
                <label for="adults">Adults:</label>
                <input type="number" id="adults" name="adults" min="1" required>
            </div>
            <div class="single-items">
                <label for="children">Children:</label>
                <input type="number" id="children" name="children" min="0" required>
            </div>
            <button type="submit">Search Now <i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
<?php
    }

    protected function _content_template()
    {
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_booking_Widget());
