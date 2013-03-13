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
<div id="block-grid">
    <ul class="small-block-grid-1 large-block-grid-2">
        <?php foreach ($users as $user) { ?>
           <li>
                <div class="gridBlock">
                    <div class="row">
                        <div class="small-4 columns">
                            <img class="right stroked" src="http://dummyimage.com/75x75" />
                        </div>
                        <div class="small-8 columns">
                            <span><?php echo $user['Username']; echo ' ('.$user['Fullname'].') '; ?></span>
                            <br/>
                            <span><?php echo $user['Mail']; ?></span>
                        </div>
                    </div>
                </div>
           </li>
        <?php } ?>
    </ul>
    <div class="span6" style="text-align: center; padding-top: 10px;"> 
        <a class="btn btn-primary btn-large" href="/user/add"><i class="icon-plus icon-white" style="margin-top: 3px"></i> <?php echo T_('New user'); ?></a>
	</div>
</div>
