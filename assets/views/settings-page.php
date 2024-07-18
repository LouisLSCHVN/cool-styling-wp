<div class="wrap">
    <h1>Cool Styling</h1>
    <div id="cool-button-container">
            <button class="button" id="cool-preview-changes">Preview Changes</button>
            <button class="button" id="cool-selector">Select Element</button>
            <button class="button" id="cool-css-export">Export</button>
    </div>
    <form method="post" action="options.php">
        <textarea id="cool_codemirror_textarea" name="cool_custom_css"><?php echo esc_textarea(get_option('cool_custom_css')); ?></textarea>
        <?php
        settings_fields('cool_styling');
        do_settings_sections('cool_styling');
        submit_button('Saves Changes');
        ?>
    </form>
    <hr />
    <section class="cool-styles-container">
        <div class="card">
            <h1>Headings</h1>
            <div class="cool-title-container">
                <h1>h1</h1>
                <h2>h2</h2>
                <h3>h3</h3>
                <h4>h4</h4>
                <h5>h5</h5>
                <h6>h6</h6>
            </div>
        </div>
        <div class="card">
            <div id="post-body" class="metabox-holder columns-2">
                <div id="post-body-content">
                    <strong>Standard style</strong>
                    <div class="notice notice-error inline">
                        <p>
                            class ".notice-error" with paragraph and ".inline" class
                        </p>
                    </div>
                    <div class="notice notice-warning inline">
                        <p>
                            class ".notice-warning" with paragraph and ".inline" class
                        </p>
                    </div>
                    <div class="notice notice-success inline">
                        <p>
                            class ".notice-success" with paragraph and ".inline" class
                        </p>
                    </div>
                    <div class="notice notice-info is-dismissible inline">
                        <p>
                            class ".notice-info" with paragraph include ".is-dismissible" and ".inline" class
                        </p>
                    </div>
                    <div class="notice notice-info inline">
                        <p>
                            class ".notice-info" with paragraph and ".inline" class
                        </p>
                    </div>
                </div>
                <p>Add <code>.notice-alt</code> for full background color</p>
                </div>
            </div>
        <div class="card">
            <h2>Buttons</h2>
            <p>Use core function to create buttons: <code>submit_button( $text = null, $type = 'primary', $name = 'submit', $wrap = true, $other_attributes = null )</code></p>
            <br>
                <input class="button-primary" type="submit" name="Example" value="Example Primary Button" />
            <br>
            <br>
                <button class="button-cancel" type="submit">Example Cancel Button</button>
            <br>
                <br>
                <button class="button-disabled" type="submit">Example Disable Button</button>
            <br>
                <br>
                <input class="button-secondary" type="submit" value="Example Secondary Button" />
            <br>
                <br>
            <a class="button-secondary" href="#" title="Title for Example Link Button">Example Link Button</a>
        </div>
        <div class="card">
            <h2>Card</h2>
            <div class="card">
                <h2 class="title">Main Content Title</h2>
                <p>WordPress started in 2003 with a single bit of code to enhance the typography of everyday writing and with fewer users than you can count on your fingers and toes. Since then it has grown to be the largest self-hosted blogging tool in the world, used on millions of sites and seen by tens of millions of people every day.</p>
            </div>
        </div>
        <div class="card">
            <h2>Form Elements: Fieldset and Input Field</h2>
            <fieldset>
                <legend class="screen-reader-text"><span>Fieldset Example</span></legend>
                <label for="users_can_register">
                    <input name="" type="checkbox" id="users_can_register" value="1" />
                    <span>Checkbox description with legend class .screen-reader-text</span>
                </label>
            </fieldset>
            <fieldset>
                <legend class="screen-reader-text"><span>input type="radio"</span></legend>
                <label title='g:i a'>
                    <input type="radio" name="example" value="option1" />
                    <span>Radio description with legend class .screen-reader-text</span>
                </label><br>
                <label title='g:i a'>
                    <input type="radio" name="example" value="option2" />
                    <span>Radio description #2 with legend class .screen-reader-text</span>
                </label>
            </fieldset>
        </div>
        <div class="card">
            <h2>Form Elements: Input Fields</h2>
            <input type="text" value=".regular-text" class="regular-text" /><br>
            <input type="text" value=".small-text" class="small-text" /><br>
            <input type="text" value=".large-text" class="large-text" /><br>
            <input type="text" value=".all-options" class="all-options" /><br>
            <input type="text" value="This is what text looks like here…" class="regular-text" />
            <span class="description">This is a description for a form element.</span><br>
            <input type="text" value="…and text formatted as code." class="regular-text code" /><br>
        </div>
        <div class="card">
            <h2>Form Elements: Select</h2>
            <select name="" id="">
                <option selected="selected" value="">Example option</option>
                <option value="">Example option</option>
            </select>
        </div>
        <div class="card">
            <h2>Form Elements: Textarea</h2>
            <textarea id="" name="" cols="80" rows="10">no class</textarea><br>
            <textarea id="" name="" cols="80" rows="10" class="large-text">.large-text</textarea><br>
            <textarea id="" name="" cols="80" rows="10" class="all-options">.all-options</textarea>
        </div>
        <div class="card">
            <h2>Menu Bubble</h2>
            <ul id="adminmenu">
                <li style="padding:1em;">
                    <span class="update-plugins count-123"><span class="plugin-count">123</span></span>
                </li>
            </ul>
        </div>
        <div class="card">
            <h2>Pagination</h2>
            <div class="tablenav">
                <div class="tablenav-pages">
                    <span class="displaying-num">Example markup for <em>n</em> items</span>
                    <a class='first-page disabled' title='Go to first page' href='#'>&laquo;</a>
                    <a class='prev-page disabled' title='Go to previous page' href='#'>&lsaquo;</a>
                    <span class="paging-input"><input class='current-page' title='Current page' type='text' name='paged' value='1' size='1' /> of <span class='total-pages'>5</span></span>
                    <a class='next-page' title='Go to next page' href='#'>&rsaquo;</a>
                    <a class='last-page' title='Go to last page' href='#'>&raquo;</a>
                </div>
            </div>
        </div>
        <div class="card">
            <h2>Tables</h2>
            <p><strong>Table with class <code>form-table</code></strong></p>
            <table class="form-table">
                <tr>
                    <th class="row-title">Table header cell #1</th>
                    <th>Table header cell #2</th>
                </tr>
                <tr valign="top">
                    <td scope="row">Table data cell #1, with label</td>
                    <td>Table Cell #2</td>
                </tr>
                <tr valign="top" class="alternate">
                    <td scope="row">Table Cell #3, with label and class <code>alternate</code></td>
                    <td>Table Cell #4</td>
                </tr>
                <tr valign="top">
                    <td scope="row">Table Cell #5, with label</td>
                    <td>Table Cell #6</td>
                </tr>
            </table>
            <br class="clear" />
            <p><strong>Table with class <code>widefat</code></strong></p>
            <table class="widefat">
                <thead>
                <tr>
                    <th class="row-title">Table header cell #1</th>
                    <th>Table header cell #2</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="row-title">Table Cell #1, with label</td>
                    <td>Table Cell #2</td>
                </tr>
                <tr class="alternate">
                    <td class="row-title">Table Cell #3, with label and class <code>alternate</code></td>
                    <td>Table Cell #4</td>
                </tr>
                <tr>
                    <td class="row-title">Table Cell #5, without label</td>
                    <td>Table Cell #6</td>
                </tr>
                <tr class="alt">
                    <td class="row-title">Table Cell #7, without label and with class <code>alt</code></td>
                    <td>Table Cell #8</td>
                </tr>
                <tr class="form-invalid">
                    <td class="row-title">Table Cell #9, without label and with class <code>form-invalid</code></td>
                    <td>Table Cell #10</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th class="row-title">Table header cell #1</th>
                    <th>Table header cell #2</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="card">
            <h2>Tabs</h2>
            <h2 class="nav-tab-wrapper">
                <a href="#" class="nav-tab">Tab #1</a>
                <a href="#" class="nav-tab nav-tab-active">Tab #2</a>
                <a href="#" class="nav-tab">Tab #3</a>
            </h2>
        </div>
    </section>
</div>