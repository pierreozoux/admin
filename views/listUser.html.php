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
  <div class="btn-container left add-btn-container">
  <a class="green button marged" href="#" id="addButton" data-reveal-id="addForm"><div style="font-size: 100px; line-height: 80px; height: 80px; width: 80px;">+</div><?= T_('Add User') ?></a>
  </div>
  <div class="large-9 row columns list">


    <!-- foundation blockgrid for the user list -->
    <ul class="grid-list small-block-grid-1 large-block-grid-2">
      <?php foreach ($users['Users'] as $user) { ?>
        <li>
            <div class="btn-container user-container">
                <a class="blue button normal-font vpadded" href="#" onclick="user='<?=$user['Username']?>'; javascript:showModal();" style="width: 100%">
                   <div class="left">
                     <img class="stroked" src="http://dummyimage.com/80x80" />
                   </div>
                   <div class="left" style="margin-left: 25px; line-height: 35px; margin-top: 10px;">
                     <strong><?php echo $user['Username'];?></strong>
                     <span><?php echo ' ('.$user['Fullname'].') '; ?></span>
                     <br/>
                     <span><?php echo $user['Mail']; ?></span>
                   </div>
                </a>
            </div>
        </li>
      <?php } ?>
    </ul>

    <!-- pagination -->
    <div class="row"> <!-- gridrow for a centered pagination list -->
      <div class="small-5 small-centered columns">
        <ul class="pagination">
          <? if($_GET['page'] == 1){?>
            <li class="arrow unavailable"><a>&laquo;</a></li>
          <?} else { ?> 
            <li class="arrow"><a href="/user/list?page=<?=$_GET['page']-1?>">&laquo;</a></li>
          <? }
          for($i = 1; $i <= ($nbUsers/$limit)+1 ; $i++ ){
          if($i == $_GET['page']){?>
              <li class="current"><a href="#"><?=$i?></a></li>
          <? } else { ?>
          <li><a href="/user/list?page=<?=$i?>"><?=$i?></a></li>
          <? } }
          if($_GET['page'] == ($nbUsers/$limit)+1){?>
            <li class="arrow unavailable"><a>&raquo;</a></li>
          <?} else { ?> 
            <li class="arrow"><a href="/user/list?page=<?=$_GET['page']+1?>">&raquo;</a></li>
          <? } ?>
        </ul> 
      </div>
    </div>

    <!-- user details modal -->
    <div class="reveal-modal gridBlock stroked" id="userDetails">
      <span></span>
      <br/>
      <a href="#">edit</a>
      <br/>
      <a href="#" id="deleteWarningDisplay">delete</a>
    </div>


    <!-- user deletion warning modal -->
    <div class="reveal-modal gridBlock stroked" id="userDeleteWarning">
      <span><?=T_('Delete user ')?><span class="upperStrong" id="userToDelete"></span><?=T_(' ? Are you sure ?')?></span>
      <br/>
      <a href="#" id="deleteUser">delete</a>
    </div>

    <!-- add User Form (hidden at start reveal modal foundation) -->
    <div class="row">
      <div class="reveal-modal gridBlock stroked" id="addForm">
        <div class="small-11 small-centered columns">
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
                  <div class="large-6 columns">
                    <div class="btn-container">
                      <input class="big green button" type="submit" value="<?php echo T_('Create') ?>" />
                    </div>
                  </div>
                  <div class="large-6 columns">
                    <span class="uppercase">*<?php echo T_('required fields') ?></span> 
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


  </div>
</div>
