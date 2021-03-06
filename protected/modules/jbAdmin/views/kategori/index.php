<?php
  $this->menu = $menu;
?>
<style>
a.viewSubKategori img{
    width: 30px;
    height: 30px;
    margin-left: 2px;
    position:absolute;
    margin-top: -1px;
}
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
<script>
    function getSubIndustri(id)
    {
        try{
            /*  Extract the Primary Key from the CGridView's clicked row */
            var myPK = id;

            /* If $.fn.yiiGridView.getSelection(id) can not find PK, then return. */
            if(isNaN(myPK)){
                return;
            };

//                    /*Display the loading.gif file via jquery and CSS*/
            $("#industriGrid").addClass("grid-view-loading");

            /* Call the Ajax function to update the Child CGridView via the
             controller’s actionAdmin */
            var request = $.ajax({ 
              url: "<?php echo Yii::app()->createUrl('//jbAdmin/kategori/getSubIndustriGrid') ?>",
              type: "GET",
              cache: false,
              data: {id : myPK},
              dataType: "html" 
            });

            /* See "Url Problems" at this same location in 
             "Our own Ajax - Method-1".*/

            request.done(function(response) { 
                try{
                    /*since you are updating innerHTML, make sure the
                    received data does not contain any javascript - for
                    security reasons*/
                    if (response.indexOf('<script') == -1){
                        /*update the view with the data received
                         from the server*/
                        document.getElementById('subIndustriList').innerHTML = response;
                    }
                    else {
                        throw new Error('Invalid Javascript in Response - possible hacking!');
                    }
                }
                catch (ex){
                    alert(ex.message); /*** Send this to the server for
                     logging when in production ***/
                }
                finally{
                    /*Remove the loading.gif file via jquery and CSS*/
                    $("#industriGrid").removeClass("grid-view-loading");

                    /*clear the ajax object after use*/
                    request = null;
                }
            });

            request.fail(function(jqXHR, textStatus) {
                try{
                    throw new Error('Request failed: ' + textStatus );
                }
                catch (ex){
                    alert(ex.message); /*** Send this to the server for
                     logging when in production ***/
                }
                finally{
                    /*Remove the loading.gif file via jquery and CSS*/
                    $("#industriGrid").removeClass("grid-view-loading");

                    /*clear the ajax object after use*/
                    request = null;
                }
            });
        }
        catch (ex){
            alert(ex.message); /*** Send this to the server for logging when in
                       production ***/
        }
    }
    
</script>
<div class="account-header">
  MENGATUR KATEGORI
</div>
<div class="account-jual-category">
  <form>
    <?php echo CHtml::button('Tambah Kategori', array('submit' => array('kategori/create'), 'class'=>'account-jual-add')); ?>
  </form>
</div>
<div class="account-beli-table">
  <?php
    $this->widget('zii.widgets.grid.CGridView', array(
      'id'=>'industriGrid',
      'dataProvider' => $model,
      'itemsCssClass' => 'table table-bordered table-striped table-hover',
      'summaryText' => '',
      'ajaxUpdate'=>'subIndustriGrid',
      'columns' => array(
          'industri',
          'keterangan',
          array(
              'class' => 'CButtonColumn',
              'id'=>'industriGridColumn',
              'htmlOptions' => array('style' => 'width: 85px'),
              'header' => 'Tindakan',
              'template' => '{update}{delete}{viewSubKategori}',
              'deleteButtonLabel'=>'Hapus',
              'updateButtonLabel'=>'Ubah',
              'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/icon-delete.png',
              'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/icon-edit.png',
              'deleteConfirmation' => 'PERHATIAN: Dengan menghapus industri ini maka bisnis/franchise yang menggunakan nya harus di set ulang ke industri baru. Apakah anda yakin?',
              'afterDelete'=>'function(link,success,data){ 
                                  afterDeleteAction();
                               }',
              'buttons' => array(
                  'viewSubKategori' => array(
                      'label' => 'Lihat Sub-Kategori',
                      'imageUrl' => Yii::app()->request->baseUrl . '/images/asset/icon-subfolder.png',
                      'options' => array('class' => 'viewSubKategori'),
                      'url' => '$data->id', 
                      'click'=> "function(e){ e.preventDefault(); getSubIndustri($(this).attr('href'))}"

                  )
              ),
          ),
      ),
    ));
  ?>      
</div>
<div class="account-beli-table" id="subIndustriList">
  <?php
    $this->widget('zii.widgets.grid.CGridView', array(
      'id'=>'subIndustriGrid',
      'dataProvider' => $subkategori,
      'itemsCssClass' => 'table table-bordered table-striped table-hover',
      'summaryText' => '',
      'ajaxUpdate'=>'subIndustriGrid',
      'enableSorting' => false,
      'columns' => array(
          'sub_industri',
          'keterangan',
          array(
              'class' => 'CButtonColumn',
              'id'=>'subIndustriGridColumn',
              'header' => 'Tindakan',
              'template' => '{update}{delete}',
              'deleteButtonLabel'=>'Hapus',
              'updateButtonLabel'=>'Ubah',
              'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/icon-delete.png',
              'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/icon-edit.png',
              'deleteConfirmation' => 'PERHATIAN: Dengan menghapus sub industri ini maka bisnis/franchise yang menggunakan nya harus di set ulang ke sub industri baru. Apakah anda yakin?',
          ),
      ),
  ));

  ?>    
</div>
<script>
    function afterDeleteAction()
    {
        $('#subIndustriGridTambahButton').hide();
    }
            
</script>


