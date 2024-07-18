<?php

class Cool_Settings {
    public function __construct()
    {
        // Add the settings section
        add_action('admin_menu', array(&$this, 'add_admin_menu'));

        // Init codemirror
        add_action('admin_enqueue_scripts', array($this, 'codemirror_enqueue_scripts'));
        add_action('admin_init', array($this, 'register_settings'));

        add_action('admin_head', array(&$this, 'apply_custom_css'));
        //add_action('admin_init', array(&$this, 'register_settings'));
    }

    /**
     * Add the settings section
     *
     * @return void
     * @since 0.1.0
     */
    public function add_admin_menu(): void {
        add_options_page('Cool Styling', 'Cool Styling', 'manage_options', 'cool_styling', [$this, 'settings_page']);
    }

    /**
     * Enqueues CodeMirror scripts and styles for the admin settings page.
     *
     * @param string $hook The current admin page.
     * @return void
     * @since 0.1.0
     */
    public function codemirror_enqueue_scripts(string $hook): void
    {
        // Check if we are on the specific admin settings page
        if ($hook !== 'settings_page_cool_styling') {
            return;
        }

        // Enqueue the code editor
        $cm_settings['codeEditor'] = wp_enqueue_code_editor(array('type' => 'text/css'));

        // Enqueue the necessary scripts and styles
        wp_enqueue_script('wp-theme-plugin-editor');
        wp_enqueue_style('wp-codemirror');

        // Enqueue your custom script
        wp_enqueue_script('custom-codemirror', cool_styling_url . 'assets/scripts/styling.js', array('wp-theme-plugin-editor'), '1.0', true);

        // Localize CodeMirror settings to your custom script
        wp_localize_script('custom-codemirror', 'cm_settings', $cm_settings);
    }

    public function settings_page(): void {
        // Enqueue the scripts
        // wp_enqueue_script('cool-styling', cool_styling_url . 'assets/scripts/styling.js', array('wp-theme-plugin-editor'), '1.0', true);

        // Enqueue the styles
        wp_enqueue_style('cool-styling-css', cool_styling_url  . 'assets/css/settings-page.css');

        // Display the settings page
        require cool_styling_path . "assets/views/settings-page.php";
    }

    public function register_settings(): void
    {
        register_setting('cool_styling', 'cool_custom_css');
    }

    function apply_custom_css(): void
    {
        $custom_css = get_option('cool_custom_css');
        if (!$custom_css) return;
        echo '<style id="cool-styling-css">' . esc_html($custom_css) . '</style>';
    }
}