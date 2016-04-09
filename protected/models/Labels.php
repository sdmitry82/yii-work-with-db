<?php

/**
 * This is the model class for table "labels_db".
 *
 * The followings are the available columns in table 'labels_db':
 * @property integer $id
 * @property string $table
 * @property string $field
 * @property string $label
 */
class Labels extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'labels_db';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('table, field', 'required'),
			array('label', 'required', 'message'=>'Параметр Label не может быть пустым.'),
			array('table, field, label', 'length', 'max'=>100, 'message'=>'Длинна Label не может быть больше 100 символов.'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, table, field, label', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'table' => 'View name',
			'field' => 'Field',
			'label' => 'Label',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('table',$this->table,true);
		$criteria->compare('field',$this->field,true);
		$criteria->compare('label',$this->label,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Labels the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}