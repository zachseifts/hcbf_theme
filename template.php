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
  $variables['copyright_year'] = date("Y");
}

