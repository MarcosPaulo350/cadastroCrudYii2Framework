<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Funcionarios */

$this->title = 'Update Funcionarios: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'nome' => $model->nome, 'dataNascimento' => $model->dataNascimento, 'cpf' => $model->cpf]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="funcionarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
