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
    <script>window.jQuery || document.write('<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/jquery-1.7.1.min.js"><\/script>')</script>-->
    <link media="all" type="text/css" href="<?php echo PUBLIC_DIR ?>/stylesheets/app.css" rel="stylesheet">
	<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/custom.modernizr.js"></script>
</head>
<body class="">
    <img src="/public/poc.png" id="poc" style="position: absolute; top: 109px; left: 130px; display: none;" />
    <nav class="tool-bar">
      <div class="tool-bar-wrapper">
        <ul class="left">
          <li class="name">
              <h1><a class="brand" href="/"><span class="logo-white">YUNOHOST</span></a></h1>
          </li>
        </ul>
        <ul class="right">
          <!--<li class=">">
            <a href="/user/list"><?php echo T_('Users') ?></a>
          </li>-->
          <li class="">
            <a href="/support" title="<?php echo T_('Support chat') ?>"><img src="http://dummyimage.com/30x30" style=""/></a>
          </li>
          <li class="text">
            <!--<a href="/logout" title="<?php echo T_('Log out') ?>"><strong><?php echo $userUid ?></strong></a>-->
            <a href="/logout" title="<?php echo T_('Logout') ?>"><strong>logout</strong></a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="clear"></div>

    <div id="container" class="row small-fix">
        <?php if (isset($flash['error'])) { ?>
            <div data-alert class="alert-box alert">
              <?php echo $flash['error'] ?>
              <a href="#" class="close">&times;</a>
            </div>
        <?php } elseif (isset($flash['notice'])) { ?>
            <div data-alert class="alert-box">
              <strong><?php echo T_('Notice') ?>:</strong> <?php echo $flash['notice'] ?>
              <a href="#" class="close">&times;</a>
            </div>
        <?php } elseif (isset($flash['success'])) { ?>
            <div data-alert class="alert-box success">
              <?php echo $flash['success'] ?>
              <a href="#" class="close">&times;</a>
            </div>
        <?php } ?>

        <nav class="section-bar">
            <ul>
                <li class="tab <?php echo ($tab == 'user') ? 'active' : '' ?>">
                    <a href="/user/list" title="<?php echo T_('Users') ?>"><img src="http://dummyimage.com/30x30" style=""/><?= T_('Users') ?></a>
                </li>
                <li class="tab">
                    <a href="/app/list" title="<?php echo T_('Apps') ?>"><img src="http://dummyimage.com/30x30" style=""/><?= T_('Apps') ?></a>
                </li>
                <li class="tab">
                    <a href="/settings" title="<?php echo T_('Settings') ?>"><img src="http://dummyimage.com/30x30" style=""/><?= T_('Settings') ?></a>
                </li>
                <li class="tab">
                    <a href="/domain/list" title="<?php echo T_('Domains') ?>"><img src="http://dummyimage.com/30x30" style=""/><?= T_('Domains') ?></a>
                </li>
                <li class="tab">
                    <a href="/monitor" title="<?php echo T_('Monitor') ?>"><img src="http://dummyimage.com/30x30" style=""/><?= T_('Monitor') ?></a>
                </li>
            </ul>
        </div>
        <div id="content">
            <div id="content-wrapper" class="stroked">
                <?php echo $content?>
            </div>
        </div>
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
      ('__proto__' in {} ? '<?php echo PUBLIC_DIR ?>/javascript/libs/zepto' : '<?php echo PUBLIC_DIR ?>/javascript/libs/jquery') +
      '.js><\/script>');
</script>

<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.alerts.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.clearing.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.cookie.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.dropdown.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.forms.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.joyride.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.magellan.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.orbit.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.placeholder.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.reveal.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.section.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.tooltips.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/foundation/foundation.topbar.js"></script>
<script>
    $(document).foundation();
</script>


<script src="<?php echo PUBLIC_DIR ?>/javascript/libs/jquery.dataTables.min.js"></script>

<!-- scripts concatenated and minified via ant build script-->
<script src="<?php echo PUBLIC_DIR ?>/javascript/plugins.js"></script>
<script src="<?php echo PUBLIC_DIR ?>/javascript/script.js"></script>

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
