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

/**
 * GET /user
 */
function user() {
  redirect_to('/user/list');
}

/**
 * GET /user/list
 */
function listUser() {
  $limit = 6;
  $nbUsers = sizeof(moulinette('user list')['Users']);
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  if ($page > (($nbUsers%$limit) + 1)) { $page = 1; }
  $users = moulinette('user list --limit '.$limit.' --offset '.(($page-1)*$limit));
  set('users', $users);
  set('nbUsers', $nbUsers);
  set('limit', $limit);
  set('page', $page);
  set('title', T_('List users'));
  return render("listUser.html.php");
}

/**
 * GET /user/details
 */
function userDetails($user) {
  return moulinette('user info "'.$user.'"', true);
}

/**
 * GET /user/details
 */
function showUserAjax() {
  return '{"myMsg": "'.$_GET['user'].'!"}';
}

/**
 * POST /user/add
 */
function addUser () {
  $_SESSION['first-install'] = false;
  $username = htmlspecialchars($_POST["username"]);
  $password = '{MD5}'.base64_encode(pack('H*',md5($_POST["password"])));
  $firstname = htmlspecialchars($_POST["firstname"]);
  $lastname = htmlspecialchars($_POST["lastname"]);
  $mail = htmlspecialchars($_POST["mail"]);
  $admin = isset($_POST["isadmin"]);

  if ($_POST["password"] === $_POST["confirm"]) {
    moulinette('user create --username '.$username.
                          ' --mail '.$mail.
                          ' --firstname '.$firstname.
                          ' --lastname '.$lastname.
                          ' --password '.$password );
  } else flash('error', T_('Passwords does not match'));

  redirect_to('/user/list');
}


/**
 * DELETE /user/delete
 */
function deleteUser () {
  return '{ myMsg: "'.$_POST['donnee'].'" }';
}
