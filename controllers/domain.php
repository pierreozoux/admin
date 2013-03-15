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
 * GET /domain
 */
function domains () {
  redirect_to('/domain/list');
}

/**
 * GET /domain/list
 */
function listDomains () {
  $domains = moulinette('domain list');
  set('domains', $domains);
  set('mainDomain', $_SESSION['mainDomain']);
  set('title', T_('List of domains'));
  return render("listDomains.html.php");
}

/**
 * GET /domain/add
 */
function addDomainForm () {
  $domains = moulinette('domain list');
  set('domains', $domains);
  set('mainDomain', $_SESSION['mainDomain']);
  set('title', T_('List of domains'));
  return render("listDomains.html.php");
}

/**
 * PUT /domain/update
 */
function updateDomains () {
  flash('success', T_('Domains successfully updated.'));

  redirect_to('/domain/list');
}

/**
 * GET /domain/changeMain
 */
function changeMainForm () {
  global $ldap;
  $domains = $ldap->findAll('(objectClass=mailDomain)');
  set('domains', $domains);
  set('mainDomain', $_SESSION['mainDomain']);
  set('title', T_('Change main domain'));
  return render("changeMainDomain.html.php");
}

/**
 * PUT /domain/changeMain
 */
function changeMain () {
  $domain = htmlspecialchars($_POST['domain']);
  exec('sudo yunohost change-domain '. $_SESSION['mainDomain'] .' '.$domain);
  $_SESSION['mainDomain'] = $domain;
  flash('success', T_('Main domain successfully changed.'));
  redirect_to('/domain/list');
}
