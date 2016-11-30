<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="/img/avatars/sunny.png" alt="me" class="online">
						<span>
							Admin
						</span>
						<i class="fa fa-angle-down"></i>
					</a>

				</span>
    </div>
    <!-- end user info -->

    <nav>

        <ul style="">
            <li <?php if(Yii::$app->controller->id == "feedback") echo "class='active'" ?>>
                <?php $views_count = 5; ?>
                <a href="#" title="<?= \Yii::t('app','Feedback')?>"><i class="fa fa-lg fa-fw fa-phone"></i> <?php if($views_count) { ?> <span class="badge pull-right inbox-badge margin-right-13"><?= $views_count ?></span> <?php } ?> <span class="menu-item-parent"><?= \Yii::t('app','Feedback')?></span></a>
            </li>
            <li <?php if(Yii::$app->controller->id == "company") echo "class='active'" ?>>
                <a href="<?= \yii\helpers\Url::to(['company/list']) ?>" title="<?= \Yii::t('app','Companies')?>"><i class="fa fa-lg fa-fw fa-building"></i> <span class="menu-item-parent"><?= \Yii::t('app','Companies')?></span></a>
            </li>
            <li <?php if(Yii::$app->controller->id == "agents") echo "class='active'" ?>>
                <a href="<?= \yii\helpers\Url::to(['agent/list']) ?>" title="<?= \Yii::t('app','Agents')?>"><i class="fa fa-lg fa-fw fa-building"></i> <span class="menu-item-parent"><?= \Yii::t('app','Agents')?></span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-shopping-cart"></i> <span class="menu-item-parent"><?= \Yii::t('app', 'Products'); ?></span><b class="collapse-sign"><em class="fa fa-plus-square-o"></em></b></a>
                <ul>
                    <li <?php if(Yii::$app->controller->id == "category-product") echo "class='active'" ?>>
                        <a href="<?= \yii\helpers\Url::to(['category-product/list']) ?>"><i class="fa fa-lg fa-fw fa-folder"></i> <span class="menu-item-parent"><?= \Yii::t('app', 'Product categories'); ?></span></a>
                    </li>
                    <li <?php if(Yii::$app->controller->id == "product") echo "class='active'" ?>>
                        <a href="<?= \yii\helpers\Url::to(['product/list']) ?>"><i class="fa fa-lg fa-fw fa-shopping-cart"></i> <span class="menu-item-parent"><?= \Yii::t('app', 'Product'); ?></span></a>
                    </li>
                    <li <?php if(Yii::$app->controller->id == "warehouse") echo "class='active'" ?>>
                        <a href="<?= \yii\helpers\Url::to(['warehouse/list']) ?>"><i class="fa fa-lg fa-fw fa-cubes"></i> <span class="menu-item-parent"><?= \Yii::t('app', 'Warehouses'); ?></span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-cogs"></i> <span class="menu-item-parent"><?= \Yii::t('app', 'Settings'); ?></span><b class="collapse-sign"><em class="fa fa-plus-square-o"></em></b></a>
                <ul>
                    <li <?php if(Yii::$app->controller->id == "user") echo "class='active'" ?>>
                        <a href="<?= \yii\helpers\Url::to(['user/list']) ?>"><i class="fa fa-lg fa-fw fa-users"></i> <span class="menu-item-parent"><?= \Yii::t('app', 'Users'); ?></span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>


			<span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>

</aside>