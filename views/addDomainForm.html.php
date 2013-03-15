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

 ?>

<form action="/domain/update" method="post" class="custom row row-tab entityForm">
	<div class="row">
		<div class="large-8 small-centered columns">
      <label for="domain"><?php echo T_('Domain') ?> <span>*</span></label>
        <select type="text" name="domain" id="domain">
          <?php foreach ($domains['Domains'] as $domain) { ?>
            <option value="<?php echo $domain ?>"><?php echo $domain ?></option>
          <?php } ?>
        </select> 
    </div>
    <div class="row">
      <div class="large-6 columns">
        <label for="username"><?php echo T_('Username') ?> <span>*</span></label>
        <input type="text" name="username" id="username" required />
      </div>
      <div class="large-6 columns">
        <label for="mail"><?php echo T_('Mail') ?> <span>*</span></label>
        <input type="text" name="mail" id="mail" required />
      </div>
      </div>
    <div class="row">
      <div class="large-5 columns">
        <label for="firstname"><?php echo T_('Firstname') ?> <span>*</span></label>
        <input type="text" name="firstname" id="firstname" required />
      </div>
      <div class="large-7 columns">
        <label for="lastname"><?php echo T_('Lastname') ?> <span>*</span></label>
        <input type="text" name="lastname" id="lastname" required />
      </div>
      </div>
    <div class="row">
      <div class="large-6 columns">
        <label for="password"><?php echo T_('Password') ?> <span>*</span></label>
        <input type="password" name="password" id="password" required />
      </div>
      <div class="large-6 columns">
        <label for="confirm"><?php echo T_('Confirm password') ?> <span>*</span></label>
        <input type="password" name="confirm" id="confirm" required />
      </div>
    </div>
    <div class="row">
      <div class="small-6 small-centered columns">
        <div class="row">
          <div class="small-6 columns">
            <div class="btn-container">
              <input class="big green button" type="submit" value="<?php echo T_('Create') ?>" />
            </div>
          </div>
          <div class="small-6 columns">
            <span class="uppercase">*<?php echo T_('required fields') ?></span> 
          </div>
        </div>
      </div>
    </div>
</form>
<form action="/domain/update" method="post" class="row row-tab entityForm">
	<input type="hidden" name="_method" value="PUT" id="_method">
	<?php foreach ($domains['Domains'] as $domain) { ?>
  		<input type="hidden" name="actualDomains[]" value="<?php echo $domain ?>">
  	<?php } ?>
	<div class="span6">
		<div class="well">
			<h3 class="center"><?php echo T_('Domains') ?></h3>
		    <br /><br />
		    <p class="row mailrow parentaliasrow" style="display: none;">
			    <label class="span2 labeluser" for="domains"><?php echo T_('Domain') ?></label>
			    <input class="span3" type="text" name="domains[]" placeholder="<?php echo T_('New domain name') ?>" />
			    <a href="#" class="removeAlias"><i class="icon-remove-sign"></i></a>
		    </p>
		   	<input type="hidden" name="domains[]" value="<?php echo $mainDomain ?>">
		    <?php foreach ($domains['Domains'] as $domain) { ?>
                <p class="row mailrow aliasrow">
                    <label class="span2 labeluser" for="domains"><?php echo ($domain == $mainDomain) ? T_('Main domain') : T_('Domain') ?></label>
                    <input class="span3" type="text" name="domains[]" value="<?php echo $domain ?>" <?php echo ($domain == $mainDomain) ? 'disabled' : '' ?>/>
                    <?php if ($domain != $mainDomain) { ?>
                    <a href="#" class="removeAlias"><i class="icon-remove-sign"></i></a>
                    <?php } ?>
                </p>
		    <?php } ?>
		    <p class="row" style="text-align: center;">
		    	<a class="btn" id="addAlias">
		    		<i class="icon-plus" style="margin: 2px 6px 0 0;"></i><?php echo T_('Add a domain') ?>
		    	</a>
		    	<a class="btn" href="/domain/changeMain">
		    		<i class="icon-edit" style="margin: 2px 6px 0 0;"></i><?php echo T_('Change main domain') ?>
		    	</a>
		    </p>
		   	<div style="clear: both;"></div>
			<hr>
		    <p class="row" style="text-align: center;">
		    	<input class="btn btn-primary btn-large" type="submit" value="<?php echo T_('Save') ?>" />
		    </p>
		</div>
	</div>
	<div style="clear: both;"></div>
</form>
