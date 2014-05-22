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
 * Implements hook_preprocess_page()
 */
function hcbf_theme_preprocess_page(&$variables) {
  global $user;

  $variables['copyright_year'] = date("Y");

  // Build the admin menu items
  $admin_items = array();

  if (module_exists('hcbf_volunteers')) {
    if (in_array('Volunteer Manager', array_values($user->roles))) {
      $admin_items[] = l('<i class="fa fa-cog fa-3x"></i> ' . t('Manage Volunteers'), 'volunteer/manage', array('html' => TRUE));
    }
  }

  if (module_exists('hcbf_breweries')) {
    if (in_array('Brewery Manager', array_values($user->roles))) {
      $admin_items[] = l('<i class="fa fa-cog fa-3x"></i> ' . t('Manage Breweries'), 'breweries/manage', array('html' => TRUE));
    }
  }

  // Social media icons
  $social_media_items = array(
    l('<i class="fa fa-twitter-square fa-3x"></i>', 'https://twitter.com/hcbeerfest', array('html' => TRUE)),
    l('<i class="fa fa-facebook-square fa-3x"></i>', 'https://www.facebook.com/hcbeerfest', array('html' => TRUE)),
  );

  $menu_items = array_merge($admin_items, $social_media_items);

  $variables['primary_navigation'] = theme('item_list', array(
    'items' => $menu_items,
    'attributes' => array('class' => array('nav', 'navbar-nav', 'navbar-right'))
  ));
}

