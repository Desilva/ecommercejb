<div class="account-sidebar-menu <?=isset($menu)&&$menu==1?'sidebar-menu-active':''?>">
    <a href="<?php echo Yii::app()->createUrl('//account/beli')?>">Beli</a>
    <div class="account-sidebar-panah">
        &gt;
    </div>
</div>
<div class="account-sidebar-menu <?=isset($menu)&&$menu==2?'sidebar-menu-active':''?>">
    <a href="<?php echo Yii::app()->createUrl('//account/index')?>">Jual</a>
    <div class="account-sidebar-panah">
        &gt;
    </div>
</div>
<div class="account-sidebar-menu <?=isset($menu)&&$menu==3?'sidebar-menu-active':''?>">
    <a href="<?php echo Yii::app()->createUrl('//account/watchlist')?>">Watchlist</a>
    <div class="account-sidebar-panah">
        &gt;
    </div>
</div>
<div class="account-sidebar-menu <?=isset($menu)&&$menu==4?'sidebar-menu-active':''?>">
    <a href="<?php echo Yii::app()->createUrl('//account/dataDiri')?>">Data Diri</a>
    <div class="account-sidebar-panah">
        &gt;
    </div>
</div>