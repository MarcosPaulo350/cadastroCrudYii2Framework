<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FuncionariosSarch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Funcionarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Funcionarios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'dataNascimento',
            'cpf',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Funcionarios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'nome' => $model->nome, 'dataNascimento' => $model->dataNascimento, 'cpf' => $model->cpf]);
                 }
            ],
        ],
    ]); ?>


</div>
