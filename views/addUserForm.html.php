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
<div class="row">
<div class="small-8 small-centered columns">

 <form action="/user/add" method="post" class="custom row row-tab entityForm">
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
		<div class="large-4 columns">
            <label for="username"><?php echo T_('Username') ?> <span>*</span></label>
            <input type="text" name="username" id="username" required />
        </div>
		<div class="large-2 columns">
            <div class="span3">
                <label style="text-align: right" for="isadmin"><strong><?php echo T_('Administrator') ?></strong></label>
                <input type="checkbox" name="isadmin" id="isadmin" />
            </div>
        </div>
		<div class="large-6 columns">
            <label for="mail"><?php echo T_('Mail') ?> <span>*</span></label>
            <input type="text" name="mail" id="mail" required />
        </div>
    </div>
	<div class="row">
		<div class="large-6 columns">
            <label for="firstname"><?php echo T_('Firstname') ?> <span>*</span></label>
            <input type="text" name="firstname" id="firstname" required />
        </div>
		<div class="large-6 columns">
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
            <div style="clear: both;"></div>
            <hr>
        <p class="row" style="text-align: center;">
            <span>*</span> <small><?php echo T_('required fields') ?></small>
        </p>
        <p class="row" style="text-align: center;">
        <div class="btn-container">
            <input class="medium green button" type="submit" value="<?php echo T_('Create') ?>" />
        </div>
        </p>
		</div>
	</div>
	<div style="clear: both;"></div>
</form>
</div>
</div>
