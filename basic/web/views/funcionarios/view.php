<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Funcionarios */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="funcionarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'nome' => $model->nome, 'dataNascimento' => $model->dataNascimento, 'cpf' => $model->cpf], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'nome' => $model->nome, 'dataNascimento' => $model->dataNascimento, 'cpf' => $model->cpf], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'dataNascimento',
            'cpf',
        ],
    ]) ?>

</div>
