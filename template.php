<?php

/**
 * @file
 * template.php
 */

/**
 * Implements hook_theme()
 */
function hcbf_theme_theme() {
  $themes = array();

  $themes['user_login'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'hcbf_theme') . '/templates/system',
    'template' => 'user-login',
  );

  $themes['user_pass'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'hcbf_theme') . '/templates/system',
    'template' => 'user-pass',
  );

  return $themes;
}

/**
 * Implements hook_form_FORM_ID_alter()
 *
 * Overrides the session_limit's session_limit_user_settings form.
 */
function hcbf_theme_form_session_limit_user_settings_alter(&$form, &$form_state, $form_id) {
  $form['#prefix'] = '<div id="session_limit-wrapper" class="wrapper"><div class="container"><div class="row"><div class="col-xs-12">';
  $form['#suffix'] = '</div></div></div></div>';
}

/**
 * Implements hook_preprocess_html()
 */
function hcbf_theme_preprocess_html(&$variables) {
  drupal_add_css('//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array('type' => 'external'));
}

/**
 * Overrides the default menu_tree function for the primary nav.
 */
function hcbf_theme_menu_tree__primary(&$variables) {
  return '<ul class="menu nav navbar-nav navbar-right">' . $variables['tree'] . '</ul>';
}

/**
 * Implements hook_preprocess_page()
 */
function hcbf_theme_preprocess_page(&$variables) {
  global $user;

  $variables['copyright_year'] = date("Y");

  // Social media icons
  $menu_items = array(
    l('<i class="fa fa-envelope-square fa-3x"></i><span class="visible-xs"> Contact us</span>', 'contact', array('html' => TRUE, 'attributes' => array('title' => 'Contact us'))),
    l('<i class="fa fa-twitter-square fa-3x"></i><span class="visible-xs"> Follow us on Twitter</span>', 'https://twitter.com/hcbeerfest', array('html' => TRUE, 'attributes' => array('title' => 'Follows us on Twitter'))),
    l('<i class="fa fa-facebook-square fa-3x"></i><span class="visible-xs"> Like us on Facebook</span>', 'https://www.facebook.com/hcbeerfest', array('html' => TRUE, 'attributes' => array('title' => 'Like us on Facebook'))),
  );

  $variables['primary_navigation'] = theme('item_list', array(
    'items' => $menu_items,
    'attributes' => array('class' => array('nav', 'navbar-nav', 'navbar-right'))
  ));
}

