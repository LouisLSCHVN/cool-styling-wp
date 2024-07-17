<div class="wrap">
    <h1>Cool Styling</h1>
    <div class="cool-button-container">
        <form method="post" action="options.php">
            <textarea id="cool_codemirror_textarea" name="cool_custom_css"><?php echo esc_textarea(get_option('cool_custom_css')); ?></textarea>
            <?php
            settings_fields('cool_styling');
            do_settings_sections('cool_styling');
            submit_button('Saves Changes');
            ?>
        </form>
        <button class="button" id="cool-preview-changes">Preview Changes</button>
        <button class="button" id="cool-selector">Select Element</button>
        <button class="button" id="cool-css-export">Export</button>
    </div>
</div>