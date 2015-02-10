<div class="wrap">
    <h2>Volunteer Submissions <a href="http://wordpress.dev/wp-admin/post-new.php" class="add-new-h2">Download Spreadsheet</a></h2>
    <table class="wp-list-table widefat fixed posts">
    <thead>
      <tr>
        <td>Name</td>
        <td>Address</td>
        <td>Suburb</td>
        <td>Postcode</td>
        <td>Branch</td>
        <td>Email</td>
        <td>Phone</td>
      </tr>
    </thead>
    <tbody id="the-list">
      <?php foreach($volunteers as $v) { ?>
        <tr class="post-1 type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0">
          <td class="post-title page-title column-title"><?php echo $v->firstname ?> <?php echo $v->surname ?></td>
          <td><?php echo $v->address1 ?> <br> <?php echo $v->address2 ?></td>
          <td><?php echo $v->suburb ?></td>
          <td><?php echo $v->postcode ?></td>
          <td><?php echo $v->branch ?></td>
          <td><?php echo $v->email ?></td>
          <td><?php echo $v->phone_h ?></td>
        </tr>
      <?php } ?>
    </tbody>
    </table>
</div>

<div class="wrap">
    <h2>Volunteer Settings</h2>
    <form method="post" action="options.php">
        <?php @settings_fields('wp_plugin_template-group'); ?>
        <?php @do_settings_fields('wp_plugin_template-group'); ?>

        <table class="form-table">
            <tr valign="top">
                <th scope="row"><label for="setting_a">Debug</label></th>
                <td><input type="checkbox" name="vf_setting_debug" id="vf_setting_debug" value="<?php echo get_option('vf_setting_debug'); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="setting_a">Host CSS from CDN</label></th>
                <td><input type="checkbox" name="vf_setting_cdn" id="vf_setting_cdn" value="<?php echo get_option('vf_setting_cdn'); ?>" /></td>
            </tr>
        </table>

        <?php @submit_button(); ?>
    </form>
</div>