<?php

 /**
  *  YunoHost - Self-hosting for all
  *  Copyright (C) 2012  Kload <kload@kload.fr>
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




# ============================================================================ #
#    1. CONFIGURE LIMONADE'S OPTION                                            #
# ============================================================================ #

function configure()
{
  option('env', ENV_PRODUCTION);
  option('debug', false);
  if (preg_match('/^\/ynh\-admin/', $_SERVER['REQUEST_URI'])) { 
      option('base_uri', '/ynh-admin/');
  } else {
      option('base_uri', '/');
  }
  //option('controllers_dir', dirname(__FILE__).'/controllers');
  //option('views_dir', dirname(__FILE__).'/views');
  define('MODELS_DIR', dirname(__FILE__).'/../models');
  layout("layout.html.php");
  //option('public_dir', dirname(__FILE__).'/../../public');
  define('PUBLIC_DIR', '/ynh-admin/public');
}

/**
 * Limonade's "404" custom function
 */
function not_found($errno, $errstr, $errfile=null, $errline=null)
{
      $msg = h(rawurldecode($errstr));
      return render($msg, 'error_layout.html.php');
}


# ============================================================================ #
#    2. BEFORE ROUTING                                                         #
# ============================================================================ #

function before($route)
{
  global $config;

  /**
   * Set host
   */

  if (!isset($_SESSION['domain']))
    $_SESSION['domain'] = 'yunohost.org';

  if (!isset($_SESSION['mainDomain']))
    $_SESSION['mainDomain'] = exec('cat /etc/yunohost/current_host');


  /**
   * Locale
   */
  if (!isset($_SESSION['locale'])) {
    $locale = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $_SESSION['locale'] = strtolower(substr(chop($locale[0]),0,2));
  }

  $textdomain="yunohost";
  putenv('LANGUAGE='.$_SESSION['locale']);
  putenv('LANG='.$_SESSION['locale']);
  putenv('LC_ALL='.$_SESSION['locale']);
  putenv('LC_MESSAGES='.$_SESSION['locale']);
  T_setlocale(LC_ALL,$_SESSION['locale']);
  T_setlocale(LC_CTYPE,$_SESSION['locale']);
  $locales_dir = dirname(__FILE__).'/../i18n';
  T_bindtextdomain($textdomain,$locales_dir);
  T_bind_textdomain_codeset($textdomain, 'UTF-8');
  T_textdomain($textdomain);

  // Set the $locale variable in template
  set('locale', $_SESSION['locale']);

  /**
   * Proceed routing
   */
  function continueRouting($route) {
    //header("X-LIM-route-function: ".$route['function']);
    header("X-LIM-route-params: ".json_encode($route['params']));
    header("X-LIM-route-options: ".json_encode($route['options']));

    $_SESSION['isConnected'] = true;

    /**
     * Extract category from URI
     */
    $uri = $_SERVER['REQUEST_URI'];
    if (substr_count($uri, '/') > 1) { // more than a '/' in uri
      if (strlen(substr($uri, 1, strpos($uri, '/', 1) - 1)) == 2) { // uri contains i18n param
        $uri = substr($uri, 3);
      }
      $tab = substr($uri, 1, strpos($uri, '/', 1) - 1);
    } else {
      $tab = substr($uri, 1);
    }
    set('userUid', $_SERVER['PHP_AUTH_USER']);
    set('tab', $tab);
  }

  /**
   * Check installation
   */
  if ($_SESSION['mainDomain'] == 'yunohost.org' && sizeof($_POST) == 0) {
      die(render("postinstall.html.php", null, array('title' => T_('Configuration'))));
  } else {
      continueRouting($route);
  }
}


# ============================================================================ #
#   3. AFTER ROUTING                                                           #
# ============================================================================ #

function after($output, $route)
{
  /*
  $time = number_format( (float)substr(microtime(), 0, 10) - LIM_START_MICROTIME, 6);
  $output .= "\n<!-- page rendered in $time sec., on ".date(DATE_RFC822)." -->\n";
  $output .= "<!-- for route\n";
  $output .= print_r($route, true);
  $output .= "-->";
  */
  return $output;
}

# ============================================================================ #
#   4. OTHERS                                                                  #
# ============================================================================ #

function moulinette($command, $as_json = false) {
    exec('cd /usr/bin && sudo ./yunohost '. $command .' --admin-password "'.$_SERVER['PHP_AUTH_PW'].'"', $result, $result_code);

    if ($as_json) { 
        return end($result); 
    } elseif ($result_code == 0) {
        $result = json_decode(end($result), true);
        if (array_key_exists('success', $result)) {
            foreach ($result['success'] as $msg) {
                flash('success', $msg);
            }
            unset($result['success']);
        }
        return $result;
    } else {
        $error = json_decode(end($result), true);
        foreach ($error as $code => $msg) {
            flash('error', '<strong>'.T_('Error').' '.$code.':</strong> '.$msg);
        }
        return false;
    }
}

// Turn off all error reporting (prod: 0 | dev: E_ALL ^ E_NOTICE)
// error_reporting(0);

function sendMail ($mail, $subject, $txtMessage, $htmlMessage = null) {

  if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) {
    $lineBreak = "\r\n";
  } else {
    $lineBreak = "\n";
  }

  $boundary = "-----=".md5(rand());

  $header = "From: \"YunoHost\"<no-reply@yunohost.org>".$lineBreak;
  $header.= "Reply-to: \"No reply\"<no-reply@yunohost.org>".$lineBreak;
  $header.= "MIME-Version: 1.0".$lineBreak;
  $header.= "Content-Type: multipart/alternative;".$lineBreak." boundary=\"$boundary\"".$lineBreak;

  $message = $lineBreak."--".$boundary.$lineBreak;
  $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$lineBreak;
  $message.= "Content-Transfer-Encoding: 8bit".$lineBreak;
  $message.= $lineBreak.$txtMessage.$lineBreak;
  $message.= $lineBreak."--".$boundary.$lineBreak;

  if (isset($htmlMessage)) {
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$lineBreak;
    $message.= "Content-Transfer-Encoding: 8bit".$lineBreak;
    $message.= $lineBreak.$htmlMessage.$lineBreak;
    $message.= $lineBreak."--".$boundary."--".$lineBreak;
  }

  $message.= $lineBreak."--".$boundary."--".$lineBreak;

  return mail($mail, $subject, $message, $header);
}
