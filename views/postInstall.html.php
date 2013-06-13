                <form action="/postinstall" method="post" accept-charset="utf-8" class="row" style="padding: 20px;">
                    <label for="domain" class="small-4 columns" style="text-align: right; padding-top: 7px"><span class="uppercase" style="font-size: 20px;"><?php echo T_('Domain name') ?></span> </label><input class="small-7 columns" type="text" name="domain" id="domain" placeholder="<?php echo T_('mydomain.tld') ?>" />
                    <div class="clear"></div>
                    <label for="password" class="small-4 columns" style="text-align: right; padding-top: 7px;"><span class="uppercase" style="font-size: 20px;"><?php echo T_('Admin password') ?></span> </label><input class="small-7 columns" style="float: left" type="password" name="password" id="password" />
                    <div class="clear"></div>
                    <label for="confirm" class="small-4 columns" style="text-align: right; padding-top: 7px;"><span class="uppercase" style="font-size: 20px;"><?php echo T_('Confirm password') ?></span> </label><input class="small-7 columns" style="float: left" type="password" name="confirm" id="confirm" />
                    <div class="clear spacer"></div>
                    <div class="center btn-container">
                        <input type="submit" value="<?php echo T_('Let\'s go !') ?>" class="big green button" />
                    </div>
                </form>
