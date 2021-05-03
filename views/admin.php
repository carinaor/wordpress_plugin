<?php
    $settings = new main\Settings();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset ($_POST['urlinput']) ) {
            $url = (string) $_POST['urlinput'];
            $settings->setUrl($url);
            echo "<div class='updated notice is-dismissible'><p>Saved</p></div>";
        }
    }
?>
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()) . ": README"; ?></h1>
    <p><span>Options</span></p>
    <form method="POST" class="form-field form-required term-name-wrap">
        <p><label for="url-page">Custom Page URL</label></p>
        <p><input type="text" name="urlinput" id="urlinput" value="<?php echo $settings->getUrl(); ?>" /></p>
        <p><button type="submit" name="savebtn" id="savebtn" class="button action save-settings">Save</button></p>
    </form>
</div>