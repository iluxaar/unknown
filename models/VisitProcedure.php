<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visit_procedure".
 *
 * @property int $id
 * @property int $visit_id ID визита
 * @property int $service_id ID процедуры
 * @property string|null $anatomical_zone Анатомическая зона
 * @property string|null $material Материалы
 * @property int $sum Сумма
 *
 * @property Service $service
 * @property Visit $visit
 */
class VisitProcedure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visit_procedure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['visit_id', 'service_id', 'sum'], 'required'],
            [['visit_id', 'service_id', 'sum'], 'integer'],
            [['material'], 'string'],
            [['anatomical_zone'], 'string', 'max' => 255],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::class, 'targetAttribute' => ['service_id' => 'id']],
            [['visit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Visit::class, 'targetAttribute' => ['visit_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'visit_id' => Yii::t('app', 'ID визита'),
            'service_id' => Yii::t('app', 'Процедура'),
            'anatomical_zone' => Yii::t('app', 'Анатомическая зона'),
            'material' => Yii::t('app', 'Материалы'),
            'sum' => Yii::t('app', 'Сумма'),
        ];
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery|\app\query\ServiceQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }

    /**
     * Gets query for [[Visit]].
     *
     * @return \yii\db\ActiveQuery|\app\query\VisitQuery
     */
    public function getVisit()
    {
        return $this->hasOne(Visit::class, ['id' => 'visit_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\query\VisitProcedureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\query\VisitProcedureQuery(get_called_class());
    }
}
