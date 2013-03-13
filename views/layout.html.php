<?php

 /**
  *  YunoHost - Self-hosting for all
  *  Copyright (C) 2012
  *     Kload <kload@kload.fr>
  *     Guillaume DOTT <github@dott.fr>
  *
  *  This program is free software: you can redistribute it and/or modify
  *  it under the terms of the GNU Affero General Public License as
  *  published by the Free Software Foundation, either version 3 of the
  *  License, or (at your option) any later version.
  *
  *  This program is distributed in the hope that it will be useful,
  *  but WITHOUT ANY WARRANTY; without even the implied warranty of
  *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  *  GNU Affero General Public License for more details.
  *
  *  You should have received a copy of the GNU Affero General Public License
  *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
  */

 ?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $locale ?>"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>YNH <?php echo (isset($title)) ? "| ".$title : "" ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo PUBLIC_DIR ?>/js/libs/jquery-1.7.1.min.js"><\/script>')</script>-->
    <link media="all" type="text/css" href="<?php echo PUBLIC_DIR ?>/stylesheets/app.css" rel="stylesheet">
	<script src="<?php echo PUBLIC_DIR ?>/js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>
</head>
<body class="">
    <div id="top-bar-container" class="fixed">
      <nav class="top-bar">
        <div class="top-bar-wrapper">
          <ul class="title-area">
            <li class="name">
                <h1><a class="brand" href="/">YUNOHOST</a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
          </ul>
          <div class="top-bar-section">
            <ul class="right">
              <li class="<?php echo ($tab == 'user') ? 'active' : '' ?>">
                <a href="/user/list"><?php echo T_('Users') ?></a>
              </li>
              <li class="<?php echo ($tab == 'domain') ? 'active' : '' ?>">
                <a href="/domain/list"><?php echo T_('Domains') ?></a>
              </li>
              <li class="<?php echo ($tab == 'app') ? 'active' : '' ?>">
                <a href="/app/list"><?php echo T_('Applications') ?></a>
              </li>
              <li class="">
                <a href="/logout" title="<?php echo T_('Log out') ?>"><strong><?php echo $userUid ?></strong></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <div id="container" class="row small-fix">

      <?php echo $content?>

    </div> <!-- /container -->


<script type="text/javascript">
  // i18n
  var dataTable_i18n = {
    "sSearch": "<i class='icon-search' style='z-index: 100'></i>",
    "sInfo": "<?php echo T_('Showing _START_ to _END_ of _TOTAL_'); ?>",
    "sInfoFiltered": "<?php echo T_('(filtered from _MAX_ total entries)'); ?>",
  };
</script>


<script type="text/javascript">
      document.write('<script src=' +
      ('__proto__' in {} ? '<?php echo PUBLIC_DIR ?>/js/libs/zepto' : '<?php echo PUBLIC_DIR ?>/js/libs/jquery') +
      '.js><\/script>');
</script>

<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.alerts.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.clearing.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.cookie.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.dropdown.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.forms.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.joyride.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.magellan.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.orbit.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.placeholder.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.reveal.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.section.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.tooltips.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/libs/foundation/foundation.topbar.js"></script>
<script>
    $(document).foundation();
</script>


<script src="<?php echo PUBLIC_DIR ?>/js/libs/jquery.dataTables.min.js"></script>

<!-- scripts concatenated and minified via ant build script-->
<script src="<?php echo PUBLIC_DIR ?>/js/plugins.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/js/script.js"></script>

<?php if (isset($_SESSION['chat'])) { ?>
  <script type="text/javascript">
    jQuery.ajaxSetup({cache: true});
    jQuery.getScript("https://static.jappix.com/php/get.php?l=<?php echo $locale ?>&t=js&g=mini.xml", function() {
      MINI_GROUPCHATS = ["support@conference.yunohost.org"];
      HOST_ANONYMOUS = "yunohost.org";
      HOST_MUC = "conference.yunohost.org";
      HOST_BOSH = "http://yunohost.org/http-bind/";
      LOCK_HOST = 'off';
      MINI_ANIMATE = true;
      MINI_ANONYMOUS = true;
      launchMini(false, true, 'yunohost.org');
    });
  </script>
<?php } ?>



<!-- end scripts-->
</body>
</html>
