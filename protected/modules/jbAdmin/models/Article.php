<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property integer $id_article_category
 * @property integer $id_article_category_pembaca
 * @property string $created_by
 * @property string $post_date
 * @property string $post
 * @property string $title
 * @property string $resume
 *
 * The followings are the available model relations:
 * @property MArticleCategoryPembaca $idArticleCategoryPembaca
 * @property MArticleCategory $idArticleCategory
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_article_category, id_article_category_pembaca, created_by, post_date, post, title, resume', 'required'),
			array('id_article_category, id_article_category_pembaca', 'numerical', 'integerOnly'=>true),
			array('created_by', 'length', 'max'=>10),
			array('title', 'length', 'max'=>255),
			array('resume', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_article_category, id_article_category_pembaca, created_by, post_date, post, title, resume', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idArticleCategoryPembaca' => array(self::BELONGS_TO, 'ArticleCategoryPembaca', 'id_article_category_pembaca'),
			'idArticleCategory' => array(self::BELONGS_TO, 'ArticleCategory', 'id_article_category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
					return array(
			'id' => 'ID',
			'id_article_category' => 'Kategori',
			'id_article_category_pembaca' => 'Kategori Pembaca',
			'created_by' => 'Dibuat Oleh',
			'post_date' => 'Tanggal',
			'post' => 'Post',
			'title' => 'Judul',
			'resume' => 'Resume',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_article_category',$this->id_article_category);
		$criteria->compare('id_article_category_pembaca',$this->id_article_category_pembaca);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('post_date',$this->post_date,true);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('resume',$this->resume,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}