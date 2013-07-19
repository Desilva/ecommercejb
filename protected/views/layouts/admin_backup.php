<?php $this->beginContent('//layouts/main'); ?>
        
        <div class="menuMember">
                <ul>
                        <li><a href="?page=beli">Kategori Bisnis</a></li>
                        <li><a href="?page=beli&pageMember=bisnisFranchise">Bisnis / Franchise</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('//jbAdmin/article/') ?>">Artikel</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('//jbAdmin/admin/settings') ?>">Settings</a></li>
                </ul>
        </div>
        <div class="contentMember">
            <?php echo $content; ?>
        </div>
<?php $this->endContent(); ?>