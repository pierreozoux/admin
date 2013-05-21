<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <title>YNH | <?php echo $title ?></title>
    <link media="all" type="text/css" href="<?php echo PUBLIC_DIR ?>/stylesheets/app.css" rel="stylesheet">
	<script src="<?php echo PUBLIC_DIR ?>/js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>
</head>
<body>
    <div class="container row">
        <div class="name center">
                <h1><a class="brand logo" href="/">YUNOHOST</a></h1>
        </div>
        <div class="large-8 whitebox stroked center">
                <div class="spacer"></div>
                <form action="/tools/postinstall" method="post" accept-charset="utf-8" class="row" style="padding: 20px;">
                    <label for="domain" class="small-4 columns" style="text-align: right; padding-top: 7px"><span class="uppercase" style="font-size: 20px;"><?php echo T_('Domain name') ?></span> </label><input class="small-7 columns" type="text" name="domain" id="domain" placeholder="<?php echo T_('mydomain.tld') ?>" />
                    <div class="clear"></div>
                    <label for="password" class="small-4 columns" style="text-align: right; padding-top: 7px;"><span class="uppercase" style="font-size: 20px;"><?php echo T_('Admin password') ?></span> </label><input class="small-7 columns" style="float: left" type="password" name="password" id="password" />
                    <div class="clear spacer"></div>
                    <div class="center btn-container">
                        <input type="submit" value="<?php echo T_('Let\'s go !') ?>" class="big red button" />
                    </div>
                </form>
        </div>
    </div>

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
</body>
</html>
