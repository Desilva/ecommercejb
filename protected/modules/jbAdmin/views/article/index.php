<style>
a.update img{
    width: 25px;
    height: 25px;
    margin-left: 2px;
}
a.delete img{
    width: 25px;
    height: 25px;
    margin-left: 2px;
}
</style>
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

        <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
        'itemsCssClass' => 'table table-striped',
        'summaryText' => '',
	'dataProvider'=>$model,
	'columns'=>array(
                array(
                            'name'=> 'Kategori',
                            'value'=> '$data->idArticleCategory->category'
                        ),
		'created_by',
		 array(
                            'name'=> 'post_date',
                            'value'=> 'Yii::app()->dateFormatter->format("y-MM-dd", strtotime($data->post_date))'
                        ),
                array(
                        'name' => 'post',
                        'type' => 'raw', //because of using html-code <br/>
                        //call the controller method gridProduct for each row
                        'value' => array($this, 'gridDeskripsi'),
                    ),
		'title',
		'resume',
		array(
                        'class' => 'CButtonColumn',
                        'header' => 'Tindakan',
                        'template' => '{update}{delete}',
                        'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/icon/trash.png',
                        'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/icon/write.png',
                    ),
	),
        'htmlOptions'=>array('style'=>'width:788px')
)); ?>