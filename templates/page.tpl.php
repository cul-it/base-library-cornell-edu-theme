<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<div class="hero">
  <div class="cornell-identity">
    <div class="container">
      <div class="row">
        <div class="cornell-logo">
          <a href="http://www.cornell.edu"><img src="/sites/all/themes/engineering/img/cornell.gif" alt="Cornell University"></a>
        </div>
        <div class="global-menu">
          <div class="navbar">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-nav">
                <span class="sr-only">Menu</span>
                <i class="fa fa-bars"></i>
              </button>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-search">
                <span class="sr-only">Search</span>
                <i class="fa fa-search"></i>
              </button>
            </div>
            <?php if (!empty($page['global_nav'])): ?>
              <div class="collapse navbar-collapse hidden-xs" id="menu">
                <?php print render($page['global_nav']); ?>
                <!-- <ul class="nav navbar-nav main-nav">
                <li><a href="#">Optional</a></li>
                <li><a href="#">Global</a></li>
                <li><a href="#">Level</a></li>
                <li><a href="#">Navigation</a></li>
                </ul> -->
              </div><!-- /.navbar-collapse -->
            <?php endif; ?>
          </div>
        </div>
      </div>  
    </div>
  </div>
  <header>
    <?php if (!empty($page['mobile_nav'])): ?>
      <div id="mobile-nav" class="collapse">
        <?php print render($page['mobile_nav']); ?>
          <!-- <ul class="nav navbar-nav main-nav">
          <li><a href="#">Optional</a></li>
          <li><a href="#">Global</a></li>
          <li><a href="#">Level</a></li>
          <li><a href="#">Navigation</a></li>
          <li><a href="/sub">Menu item</a></li>
          <li><a href="/sub">Menu item</a></li>
          <li><a href="/sub">Menu item</a></li>
          <li><a href="/sub">Menu item</a></li>
          <li><a href="/sub">Menu item</a></li>
          <li><a href="/sub">Menu item</a></li>
        </ul> -->
      </div>
    <?php endif; ?>
    
    <?php if (!empty($page['mobile_search'])): ?>
      <div id="mobile-search" class="collapse">
        <?php print render($page['mobile_search']); ?>
        <!-- <form class="form-inline clearfix">
          <div class="form-group">
            <label for="search" class="sr-only">Search</label>
            <input type="text" class="form-control" id="search" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-search">
            <span class="sr-only">Search</span>
            <i class="fa fa-search"></i>
          </button>
        </form> -->
      </div>
    <?php endif; ?>
    <div class="container">
      <div class="row">
        <div class="library-brand">
          <a class="cul-brand" href="http://www.library.cornell.edu">Cornell University Library</a>
          <?php if (!empty($site_name)): ?>
            <a class="brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
          <?php endif; ?>
        </div>
        <?php if (!empty($page['search'])): ?>
          <div class="header-search hidden-xs">
            <?php print render($page['search']); ?>
            <!-- <form class="form-inline">
              <div class="form-group">
                <label for="search" class="sr-only">Search</label>
                <input type="text" class="form-control" id="search" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-search">
                <span class="sr-only">Search</span>
                <i class="fa fa-search"></i>
              </button>
            </form> -->
          </div>
        <?php endif; ?>
      </div>
    </div>
  </header>
  <?php if (!empty($page['main_nav'])): ?>
    <nav class="navbar hidden-xs">
      <div class="container">
        <div class="navbar-nav">
          <?php print render($page['main_nav']); ?>
          <!-- <ul class="nav navbar-nav">
            <li><a href="/sub">Menu item</a></li>
            <li><a href="/sub">Menu item</a></li>
            <li><a href="/sub">Menu item</a></li>
            <li><a href="/sub">Menu item</a></li>
            <li><a href="/sub">Menu item</a></li>
            <li><a href="/sub">Menu item</a></li>
          </ul> -->
        </div>
      </div>
    </nav>
  <?php endif; ?>
</div>

<div class="main-content">
  <div class="container">
    <?php if (!empty($page['sidebar'])): ?>
    <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <div class="row"> 
        <div class="main-text">
          <?php print render($title_prefix); ?>
          <?php if (!empty($title)): ?>
            <h1><?php print $title; ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php print $messages; ?>
          <?php if (!empty($tabs)): ?>
            <?php print render($tabs); ?>
          <?php endif; ?>
          <?php if (!empty($page['help'])): ?>
            <?php print render($page['help']); ?>
          <?php endif; ?>
          <?php if (!empty($action_links)): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          <?php if(drupal_is_front_page()) {
            unset($page['content']['system_main']['default_message']);
          }?>
          <?php print render($page['content']); ?>
        </div>
        <div class="sidebar">
          <?php print render($page['sidebar']); ?>
          <!-- <h2 class="block-title">Section header</h2>
          <ul class="nav">
            <li><a href="#"><i class="fa fa-chevron-right"></i>Sub page</a></li>
            <li><a href="#"><i class="fa fa-chevron-right"></i>Sub page</a></li>
            <li><a href="#"><i class="fa fa-chevron-right"></i>Sub page</a></li>
            <li><a href="#"><i class="fa fa-chevron-right"></i>Sub page</a></li>
            <li><a href="#"><i class="fa fa-chevron-right"></i>Sub page</a></li>
          </ul> -->
        </div>
      </div>
    <?php else: ?>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php if(drupal_is_front_page()) {
        unset($page['content']['system_main']['default_message']);
      }?>
      <?php print render($page['content']); ?>
    <?php endif; ?>

  </div>
</div>

<footer>
  <div class="container">
    <?php print render($page['footer']); ?>
    <!-- <ul class="nav">
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
    </ul>
    <p>&copy; 2015, Cornell University Library | <a href="#">Privacy</a></p> -->
  </div>
</footer>