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
<header id="header-wrapper" class="wrapper">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img class="img-responsive center-block" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      </div>
    </div>
  </div>
</header>

<nav id="navbar-wrapper" class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="main-menu">
      <?php print $primary_navigation; ?>
    </div>
  </div>
</nav>

<div id="message-wrapper">
  <div class="container">
    <div class="row">
      <?php if (!$is_front): ?>
        <?php print render($title_prefix); ?>
        <?php if (!empty($title)): ?>
          <h1 class="page-header"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
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
    </div>
  </div>
</div>

<a id="main-content"></a>

<?php print render($page['content']); ?>

<footer id="footer-wrapper" class="inverse-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p class="lead">&copy; <?php print $site_name; ?> <?php print $copyright_year; ?>. All rights reserved.</p>
        <hr />
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <p>The <?php print $site_name; ?> is a part of <a href="http://ivorytowerscience.com/" title="Ivory Tower Science">Ivory Tower Science</a>, a research based non-profit that directly supports student scholarships and academic research in Fermentation Sciences.</p>
      </div>
      <div class="col-xs-12 col-sm-3">
        <h3>Get involved</h3>
        <ul class="nav nav-stacked nav-pills">
          <li><a href="/volunteer">Want to volunteer?</a></li>
          <li><a href="/breweries/register">Want to register as a brewery?</a></li>
          <li><a href="/contact">Contact us</a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-3">
        <h3>Let's connect</h3>
        <ul class="nav nav-stacked nav-pills">
          <li><a href="https://twitter.com/hcbeerfest"><i class="fa fa-twitter-square fa-2x"></i> Follow us on Twitter</a></li>
          <li><a href="https://www.facebook.com/hcbeerfest"><i class="fa fa-facebook-square fa-2x"></i> Like us on Facebook</a></li>
          <li><a href="https://github.com/HighCountryBeerFest"><i class="fa fa-github-square fa-2x"></i> Fork us on Github</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

