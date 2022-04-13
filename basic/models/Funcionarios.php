<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcionarios".
 *
 * @property string $nome
 * @property string $dataNascimento
 * @property string $cpf
 */
class Funcionarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'dataNascimento', 'cpf'], 'required'],
            [['dataNascimento'], 'safe'],
            [['nome'], 'string', 'max' => 50],
            [['cpf'], 'string', 'max' => 14],
            [['nome', 'dataNascimento', 'cpf'], 'unique', 'targetAttribute' => ['nome', 'dataNascimento', 'cpf']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nome' => 'Nome',
            'dataNascimento' => 'Data Nascimento',
            'cpf' => 'Cpf',
        ];
    }
}
