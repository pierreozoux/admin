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


/**
 * GET /
 */
function home() {
  redirect_to('/user/list');
  //set('tab', 'home');
  //set('title', T_('Welcome !'));
  //return render("homepage.html.php");
}

/**
 * GET /login
 */
function login() {
  set('title', T_('Authentication'));
  return render("login.html.php", "emptyLayout.html.php");
}

/**
 * POST /login
 */
function doLogin() {
  $ldapconn = ldap_connect('localhost') or die("Could not connect to LDAP server.");
  ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
  if (ldap_bind($ldapconn, 'cn=admin,dc=yunohost,dc=org', $_POST['password'])) {
      $_SESSION['isConnected'] = true;
      $_SESSION['pwd'] = $_POST['password'];
      redirect_to('/user/list');
  } else {
      flash('error', T_('Wrong password'));
      redirect_to('/login');
  }
}

/**
 * GET /logout
 */
function logout() {
  $_SESSION['isConnected'] = false;

  redirect_to('/user/list');
}

/**
 * GET /postinstall
 */
function postInstall() {
  set('title', T_('Post-Install'));
  return render("postInstall.html.php", "emptyLayout.html.php");
}

/**
 * POST /postinstall
 */
function doPostInstall() {
  if ($_POST["password"] === $_POST["confirm"]) {
      $_SESSION['pwd'] = 'yunohost';
      if (moulinette('tools postinstall --domain "'. $_POST["domain"] .'" --password "'. $_POST["password"] .'"')) {
          $_SESSION['isConnected'] = true;
          $_SESSION['pwd'] = $_POST['password'];
      }
  } else {
      flash('error', T_("Passwords doesn't match"));
  }
  redirect_to('/');
}

/**
 * GET /lang/:locale
 */
function changeLocale ($locale = 'en') {
  switch ($locale) {
    case 'fr':
      $_SESSION['locale'] = 'fr';
      break;

    default:
      $_SESSION['locale'] = 'en';
      break;
  }
  if(!empty($_GET['redirect_to']))
    redirect_to($_GET['redirect_to']);
  else
    redirect_to('/user/list');
}

/**
 * GET /images/:name/:size
 */
function image_show() {
  $ext = file_extension(params('name'));
  $filename = option('public_dir').basename(params('name'), ".$ext");
  if(params('size') == 'thumb') $filename .= ".thb";
  $filename .= '.jpg';

  if(!file_exists($filename)) halt(NOT_FOUND, "$filename doesn't exists");
  render_file($filename);
}

/**
 * GET /images/*.jpg/:size
 */
function image_show_jpeg_only() {
  $ext = file_extension(params(0));
  $filename = option('public_dir').params(0);
  if(params('size') == 'thumb') $filename .= ".thb";
  $filename .= '.jpg';

  if(!file_exists($filename)) halt(NOT_FOUND, "$filename doesn't exists");
  render_file($filename);
}
