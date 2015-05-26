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
  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    else {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
      $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';

      // Check if this element is nested within another.
      if ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] > 1)) {
        // Generate as dropdown submenu.
        $element['#attributes']['class'][] = 'dropdown-submenu';
      }
      else {
        // Generate as standard dropdown.
        $element['#attributes']['class'][] = 'dropdown';
        $element['#localized_options']['html'] = TRUE;
        $element['#title'] .= ' <span class="caret"></span>';
      }

      // Set dropdown trigger element to # to prevent inadvertant page loading
      // when a submenu link is clicked.
      $element['#localized_options']['attributes']['data-target'] = '#';
    }
  }
  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }

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
