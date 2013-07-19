
<?php
        $this->breadcrumbs=array(
                'Articles',
        );

        $this->menu=array(
                array('label'=>'Create Article', 'url'=>array('create')),
 
        );
        ?>
    
        <strong>Mengatur Artikel</strong><br/>
        <br/>
        <?php echo CHtml::button('Tambah Artikel', array('submit' => array('article/create'))); ?>
                    <br/>
                    <img src="../images/nxp-lpc4300-family-member-table.jpg"/><br/>

        <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
                'id_article_category',
		'created_by',
		'post_date',
		'post',
		'title',
		'resume',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{delete}{update}'
		),
	),
        'htmlOptions'=>array('style'=>'width:788px')
)); ?>