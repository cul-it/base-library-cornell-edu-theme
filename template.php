<?php

/**
 * @file template.php
 */

/* jgr25 - add this function for menu icons */

/**
 * @file
 * menu-link.func.php
 */

/**
 * Overrides theme_menu_link().
 */
function bootstrap_cul7_menu_link(array $variables) {

  $element = $variables['element'];
  $sub_menu = '';
  /**
   * jgr25 - see - https://drupal.org/node/1940604#comment-7241152
   * look for a class called cul-icon-xxx
   * if found, add a tag like <i class="fa fa-xxx"></i> as a prefix to menu title
   */
  $item_icon = '';
  if (!empty($element['#localized_options']['attributes']['class'])) {
    $prefix = 'cul-icon';
    foreach ($element['#localized_options']['attributes']['class'] as $classname) {
      if (strncmp($classname, $prefix, strlen($prefix)) == 0) {
        $icon_id = substr($classname, strlen($prefix));
        $item_icon = '<i class="fa fa-li fa' . $icon_id . '"></i>';
        $element['#localized_options']['html'] = 'TRUE';
      }
    }
  }
  $output = l($item_icon . $element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

drupal_add_library('system', 'ui.autocomplete');
