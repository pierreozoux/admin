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
    <a class="green button marged" id="addButton" onclick="showModal('addForm')"><div>+</div><?= T_('Add User') ?></a>
  </div>

  <div class="large-9 row columns list">

    <!-- foundation blockgrid for the user list -->
    <ul class="grid-list small-block-grid-1 large-block-grid-2">
      <?php foreach ($users['Users'] as $user) { ?>
        <li>
            <div class="btn-container user-container">
                <a class="blue button normal-font vpadded" onclick="showModal('userDetails', '/user/details/<?= $user['Username']?>')" title="<?= $user['Username'].' ('.$user['Fullname'].')' ?>">
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
        <ul class="pagination" <?= ($nbUsers < $limit) ? 'style="display: none"': ''?>>
          <? if($page == 1){?>
            <li class="arrow unavailable"><a>&lsaquo;</a></li>
          <?} else { ?>
            <li class="arrow"><a href="/user/list?page=<?= $page - 1?>">&lsaquo;</a></li>
          <? }
          for($i = 1; $i <= ($nbUsers%$limit) + 1; $i++ ) {
            if($i == $page) { ?>
              <li class="current"><a class="stroked" href="#"><?= $i ?></a></li>
            <? } else { ?>
              <li><a href="/user/list?page=<?= $i ?>"><?= $i ?></a></li>
            <? } 
          } if($page == ($nbUsers%$limit) + 1) { ?>
            <li class="arrow unavailable"><a>&rsaquo;</a></li>
          <?} else { ?>
            <li class="arrow"><a href="/user/list?page=<?= $page + 1?>">&rsaquo;</a></li>
          <? } ?>
        </ul>
      </div>
    </div>

  </div>
</div>

<!-- user details modal -->
<script id="userDetails" type="text/template">
  <h1>{{Username}}</h1>
  <div class="row">
    <div class="large-4 columns center">
      <img class="stroked" src="http://dummyimage.com/200x200" />
    </div>
    <div class="large-8 columns info-list">
      <div><strong><?= T_('Username') ?> :</strong> {{Username}}</div>
      <div><strong><?= T_('Fullname') ?> :</strong> {{Fullname}}</div>
      <div><strong><?= T_('Mail') ?> :</strong> <a href="mailto:{{Mail}}">{{Mail}}</a></div>
      <div class="mail-list"{{^Mail Aliases}} style="display: none"{{/Mail Aliases}}><strong><?= T_('Mail aliases') ?> :</strong>{{#Mail Aliases}} <a href="mailto:{{.}}">{{.}}</a>,{{/Mail Aliases}}
    </div>
  </div>
  <br/>
  <a href="#">edit</a>
  <br/>
  <a href="#" id="deleteWarningDisplay">delete</a>
</script>


<!-- add User Form modal -->
<script id="addForm" type="text/template">
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
</script>
