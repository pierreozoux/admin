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
                <a class="blue button normal-font vpadded" href="#" onclick="user='<?=$user['Username']?>'; javascript:showModal();" title="<?= $user['Username'].' ('.$user['Fullname'].')' ?>">
                   <div class="left user-avatar">
                     <img class="stroked" src="http://dummyimage.com/80x80" />
                   </div>
                   <div class="left user-infos">
                     <div>
                         <span class="user-username"><?php echo $user['Username'];?></span>
                         <span class="user-fullname"><?php echo ' ('.$user['Fullname'].') '; ?></span>
                     </div>
                     <span class="user-mail"><?php echo $user['Mail']; ?></span>
                   </div>
                </a>
            </div>
        </li>
      <?php } ?>
    </ul>

    <!-- pagination -->
    <div class="row"> <!-- gridrow for a centered pagination list -->
      <div class="small-5 small-centered columns center">
        <ul class="pagination">
          <? if($_GET['page'] == 1){?>
            <li class="arrow unavailable"><a>&laquo;</a></li>
          <?} else { ?>
            <li class="arrow"><a href="/user/list?page=<?=$_GET['page']-1?>">&laquo;</a></li>
          <? }
          for($i = 1; $i <= ($nbUsers/$limit)+1 ; $i++ ){
          if($i == $_GET['page']){?>
              <li class="current"><a class="stroked" href="#"><?=$i?></a></li>
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
    <div class="row modal-wrapper">
      <div class="reveal-modal gridBlock stroked" id="addForm">
          <h1><?= T_('Add new user') ?></h1>
          <form action="/user/add" method="post" class="custom small-11 small-centered columns padding-kill entityForm">
            <div class="row">
              <label class="large-4 columns" for="username"><?= T_('Username') ?></label>
              <input class="large-8 columns" type="text" name="username" id="username" placeholder="<?= T_('j0hn') ?>" required />
            </div>
            <div class="row">
              <label class="large-4 columns" for="password"><?= T_('Password') ?></label>
              <input class="large-8 columns" type="password" name="password" id="password" placeholder="<?= T_('••••••••') ?>" required />
            </div>
            <div class="row">
              <label class="large-4 columns" for="confirm"><?= T_('Confirm password') ?></label>
              <input class="large-8 columns" type="password" name="confirm" id="confirm" placeholder="<?= T_('••••••••') ?>" required />
            </div>
            <br />
            <br />
            <div class="row">
              <label class="large-4 columns" for="firstname"><?= T_('Firstname') ?></label>
              <input class="large-8 columns" type="text" name="firstname" id="firstname" placeholder="<?= T_('John') ?>" required />
            </div>
            <div class="row">
              <label class="large-4 columns" for="lastname"><?= T_('Lastname') ?></label>
              <input class="large-8 columns" type="text" name="lastname" id="lastname" placeholder="<?= T_('Doe') ?>" required />
            </div>
            <div class="row">
              <label class="large-4 columns" for="mail"><?= T_('Mail') ?></label>
              <input class="large-8 columns" type="text" name="mail" id="mail" placeholder="<?= T_('john@doe.org') ?>" required />
            </div>
            <br />
            <br />
            <div class="row">
              <div class="large-6 columns">
                <div class="btn-container center">
                  <a class="big normal-font strong button" onclick="javascript:$('#addForm').foundation('reveal', 'close');"><?= T_('Cancel') ?></a>
                </div>
              </div>
              <div class="large-6 columns">
                <div class="btn-container center">
                  <input class="big normal-font strong green button" type="submit" value="<?= T_('Create') ?>" />
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
