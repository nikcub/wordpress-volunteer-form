<?php
/*
Plugin Name: Volunteer Form
Plugin URL: http://www.garethwardmp.com.au/
Description: Plugin for volunteer form
Version: 1.0
Author: Nik
Author URI: http://www.nikcub.com/
*/

$vf_db_version = '0.1';
define('VF_DEBUG', true);

function vf_debug($str) {
  if(VD_DEBUG) {
    print "<pre>" . $str . "</pre>";
  }
}

function vf_init() {
  wp_register_style('vf_style_bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css');
}

function vf_menu_page() {
  if(!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
  }
  $volunteers = vf_db_fetch();
  include(sprintf("%s/templates/list.php", dirname(__FILE__)));
}

function vf_html_form() {
  wp_enqueue_style('vf_style_bootstrap');
  include(sprintf("%s/templates/form.php", dirname(__FILE__)));
}

function vf_shortcode() {
  ob_start();
  $r = vf_form_submit();
  if($r == true) {
    vf_form_confirm();
  } else {
    vf_html_form();
  }
  return ob_get_clean();
}

function vf_form_confirm() {
  print "Thank you for your submission.";
}

function vf_form_submit() {
  global $wpdb;

  $data = array(
      'firstname' => '',
      'surname' => '',
      'address1' => '',
      'address2' => '',
      'suburb' => '',
      'postcode' => '',
      'branch' => '',
      'email' => '',
      'phone_h' => '',
      'phone_w' => '',
      'phone_m' => '',
    );

  if (isset($_POST['vf-form-submit'])) {
    $data['firstname'] = $_POST['firstname'];
    $data['surname'] = $_POST['surname'];
    $data['address1'] = $_POST['address1'];
    $data['address2'] = $_POST['address2'];
    $data['suburb'] = $_POST['suburb'];
    $data['postcode'] = $_POST['postcode'];
    $data['branch'] = $_POST['branch'];
    $data['email'] = $_POST['email'];
    $data['phone_h'] = $_POST['phone_h'];
    $data['phone_w'] = $_POST['phone_w'];
    $data['phone_m'] = $_POST['phone_m'];

    $r = vf_insert_record($data);
    if($r == 1)
      return true;
    print "Error with form";
    // vf_debug()
    if(VF_DEBUG) {
      $wpdb->print_error();
      print 'error';
    }
  }

  return false;
}

function vf_init_db() {
  global $wpdb;
  global $vf_db_version;

  $table_name = $wpdb->prefix . 'volunteerinfo';

  $charset_collate = $wpdb->get_charset_collate();

  // http://buysql.com/mysql/55-edit-set-type-values.html
  $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    firstname varchar(256),
    surname varchar(256),
    address1 varchar(256),
    address2 varchar(256),
    suburb varchar(256),
    postcode varchar(256),
    branch varchar(256),
    email varchar(256),
    phone_h varchar(256),
    phone_w varchar(256),
    phone_m varchar(256),
    assist SET('canvasing', 'door knocking', 'street stalls', 'letterboxing', 'sign', 'radio', 'letters editor', 'office', 'commuter', 'polling day'),
    assist_other text,
    time_mon set('6am', '9am', '12pm', '3pm', '6pm'),
    time_tue set('6am', '9am', '12pm', '3pm', '6pm'),
    time_wed set('6am', '9am', '12pm', '3pm', '6pm'),
    time_thu set('6am', '9am', '12pm', '3pm', '6pm'),
    time_fri set('6am', '9am', '12pm', '3pm', '6pm'),
    time_sat set('6am', '9am', '12pm', '3pm', '6pm'),
    time_sun set('6am', '9am', '12pm', '3pm', '6pm'),
    url varchar(55) DEFAULT '' NOT NULL,
    UNIQUE KEY id (id)
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  $r = dbDelta($sql);

  add_option( 'vf_db_version', $vf_db_version );
}

function vf_insert_record($data) {
  global $wpdb;
  $table_name = $wpdb->prefix . 'volunteerinfo';

  if(VF_DEBUG) {
    $wpdb->show_errors();
  }

  $r = $wpdb->insert($table_name,
    array(
      'firstname' => $data['firstname'],
      'surname' => $data['surname'],
      'address1' => $data['address1'],
      'address2' => $data['address2'],
      'suburb' => $data['suburb'],
      'postcode' => $data['postcode'],
      'branch' => $data['branch'],
      'email' => $data['email']
  ));

  return $r;
}

function vf_db_fetch() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'volunteerinfo';

  if(VF_DEBUG) {
    $wpdb->show_errors();
  }
  $sql = sprintf("SELECT * FROM %s", $table_name);
  return $wpdb->get_results($sql);
}

function vf_plugin_settings_page() {
  if(!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
  }
  include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
}

function vf_add_menu() {
  add_menu_page('Volunteers', 'Volunteers', 'manage_options', 'vf-menu-handle', 'vf_menu_page');
  // add_submenu_page( 'my-top-level-handle', 'Page title', 'Sub-menu title', 'manage_options', 'my-submenu-handle', 'my_magic_function');
}

function vf_init_settings() {
  register_setting('wp_plugin_template-group', 'setting_a');
}

function vf_update_db_check() {
  global $vf_db_version;
  if ( get_site_option( 'vf_db_version' ) != $vf_db_version ) {
      vf_init_db();
  }
}

register_activation_hook(__FILE__, 'vf_init_db');
add_action('plugins_loaded', 'vf_update_db_check');
add_action('admin_init', 'vf_init');
add_action('admin_menu', 'vf_add_menu');

add_shortcode( 'volunteer_form', 'vf_shortcode' );

