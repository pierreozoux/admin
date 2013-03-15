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
    <div class="large-2 columns">
        <div class="btn-container">
            <a class="big green button marged left" href="/domain/add"><img src="http://dummyimage.com/60x60" /></a>
        </div>
        <div class="btn-container">
            <a class="big green button marged left" href="/domain/update"><img src="http://dummyimage.com/60x60" /></a>
        </div>
    </div>
    <div class="large-10 columns">
        <div id="block-grid"> <!-- foundation blockgrid for the user list -->
            <ul class="small-block-grid-1 large-block-grid-2">
            <?php foreach ($domains['Domains'] as $domain) { ?>
                <li>
                    <div class="gridBlock stroked marged">
                        <div class="row">
                            <div class="small-8 columns">
                                <span class="upperStrong"><?=$domain?></span>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
            </ul>
        </div> <!-- /blockgrid -->
    <div class="row"> <!-- gridrow for a centered pagination list -->
        <div class="small-5 small-centered columns">
            <ul class="pagination">
              <li class="arrow unavailable"><a href="">&laquo;</a></li>
              <li class="current"><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li class="unavailable"><a href="">&hellip;</a></li>
              <li><a href="">12</a></li>
              <li><a href="">13</a></li>
              <li class="arrow"><a href="">&raquo;</a></li>
            </ul> 
        </div>
    </div>
</div>
</div>
</div>
