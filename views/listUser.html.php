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
<div class="row row-tab">
	<?php foreach ($users['Domains'] as $user) { ?>
        <div class="yayaya">
            <p>Username: <?php echo $user ?></p>
		</div>
	<?php } ?>
	<div class="span6" style="text-align: center; padding-top: 10px;">
		<a class="btn btn-primary btn-large" href="/user/add"><i class="icon-plus icon-white" style="margin-top: 3px"></i> <?php echo T_('New user'); ?></a>
	</div>
</div>
