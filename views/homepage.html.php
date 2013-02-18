<?php 

 /**
  *  YunoHost - Self-hosting for all
  *  Copyright (C) 2012  
  *     Kload <kload@kload.fr>
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

<div class="row row-tab">
	<div class="span6"> 
		<div class="center" style="padding: 20px;">
      <img src="<?php echo PUBLIC_DIR ?>/img/logo-big.png">
      <h3>YunoHost 2.0</h3>
      <br />
      <p style="color: #666; font-style: italic">*megusta</p>
      <br />
      <br />
      <a href="/tools/upgrade" class="btn btn-inverse"><?php echo T_('System upgrade') ?><span style="margin-top: 3px; margin-left: 6px;" id="upgrade-number"><img src="/public/img/ajax-loader-white.gif" /></span></a>
    </div>
	</div>
  <div class="span6">
    <div class="well">
      <h3><?php echo T_('Quick access') ?></h3>
      <br />
      <div id="domainChecker">
        <span class="pull-left">
          <strong><?php echo T_('Public site') ?></strong> : <a href="https://<?php echo $_SESSION['mainDomain'] ?>"><?php echo $_SESSION['mainDomain'] ?></a>
        </span>
        <span class="pull-right"><img id="publicCheck" src="/public/img/ajax-loader.gif" /></span>
        <div style="clear: both; height: 5px;"></div>
        <span class="pull-left">
          <strong><?php echo T_('Applications') ?></strong> : <a href="https://apps.<?php echo $_SESSION['mainDomain'] ?>">apps.<?php echo $_SESSION['mainDomain'] ?></a>
        </span>
        <span class="pull-right"><img id="appsCheck" src="/public/img/ajax-loader.gif" /></span>
        <div style="clear: both; height: 5px;"></div>
        <span class="pull-left">
          <strong><?php echo T_('Administration') ?></strong> : <a href="https://admin.<?php echo $_SESSION['mainDomain'] ?>">admin.<?php echo $_SESSION['mainDomain'] ?></a>
        </span>
        <span class="pull-right"><img id="adminCheck" src="/public/img/ajax-loader.gif" /></span>
        <div style="clear: both; height: 5px;"></div>
        <br />
        <span id="domainNotice"><a style="color: red" href="http://wiki.yunohost.org/Setup#DNS" target="_blank"><?php echo T_('You should fix your DNS configuration.') ?></a></span>
      </div>
    </div>
  </div>
  <div class="span6">
    <div class="well">
      <h3><?php echo T_('Certification') ?></h3>
      <p style="color: #444; font-style: italic; font-size: 12px; padding-top: 5px;"><?php echo T_('To avoid untrusted security certificate warnings, you have to import certificate authority into your browser.') ?></p>
      <a href="/ca-crt.pem" class="btn btn-primary"><i class="icon-arrow-down icon-white" style="margin-top: 3px"></i> <?php echo T_('Import certificate authority') ?></a> &nbsp; <a href="http://wiki.yunohost.org/CA" title="<?php echo T_('Need help ?') ?>" target="_blank"><i class="icon-question-sign" style="margin-top: 4px"></i></a>
    </div>
  </div>
</div>
