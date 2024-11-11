<?php

namespace app\models;

use Yii;
use yii\base\InvalidConfigException;

/**
 * This is the model class for table "finance".
 *
 * @property int $id
 * @property int $type_id Статья
 * @property int $user_id Мастер
 * @property int|null $material_id Материал
 * @property int|null $visit_id Запись (учет расхода на процедуре)
 * @property int $sum Сумма
 * @property string $created_at Время создания
 * @property string|null $comment Комментарий
 *
 * @property Material $material
 * @property FinanceType $type
 * @property User $user
 * @property Visit $visit
 */
class Finance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'user_id', 'sum'], 'required'],
            [['type_id', 'user_id', 'material_id', 'visit_id', 'sum'], 'integer'],
            [['created_at'], 'safe'],
            [['comment'], 'string'],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::class, 'targetAttribute' => ['material_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => FinanceType::class, 'targetAttribute' => ['type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'type_id' => Yii::t('app', 'Статья'),
            'user_id' => Yii::t('app', 'Добавил'),
	        'user.name' => Yii::t('app', 'Добавил'),
            'material_id' => Yii::t('app', 'Материал'),
	        'material.name' => Yii::t('app', 'Материал'),
            'visit_id' => Yii::t('app', 'Запись'),
            'sum' => Yii::t('app', 'Сумма'),
            'created_at' => Yii::t('app', 'Время создания'),
            'comment' => Yii::t('app', 'Комментарий'),
	        'financeType' => Yii::t('app', 'Тип'),
        ];
    }

    /**
     * Gets query for [[Material]].
     *
     * @return \yii\db\ActiveQuery|\app\query\MaterialQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::class, ['id' => 'material_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery|\app\query\FinanceTypeQuery
     */
    public function getType()
    {
        return $this->hasOne(FinanceType::class, ['id' => 'type_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\app\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
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
     * @return \app\query\FinanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\query\FinanceQuery(get_called_class());
    }

}
