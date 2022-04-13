<?php

namespace app\controllers;

use app\models\Funcionarios;
use app\models\FuncionariosSarch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FuncionariosController implements the CRUD actions for Funcionarios model.
 */
class FuncionariosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Funcionarios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FuncionariosSarch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Funcionarios model.
     * @param string $nome Nome
     * @param string $dataNascimento Data Nascimento
     * @param string $cpf Cpf
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nome, $dataNascimento, $cpf)
    {
        return $this->render('view', [
            'model' => $this->findModel($nome, $dataNascimento, $cpf),
        ]);
    }

    /**
     * Creates a new Funcionarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Funcionarios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'nome' => $model->nome, 'dataNascimento' => $model->dataNascimento, 'cpf' => $model->cpf]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Funcionarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nome Nome
     * @param string $dataNascimento Data Nascimento
     * @param string $cpf Cpf
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($nome, $dataNascimento, $cpf)
    {
        $model = $this->findModel($nome, $dataNascimento, $cpf);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nome' => $model->nome, 'dataNascimento' => $model->dataNascimento, 'cpf' => $model->cpf]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Funcionarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nome Nome
     * @param string $dataNascimento Data Nascimento
     * @param string $cpf Cpf
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($nome, $dataNascimento, $cpf)
    {
        $this->findModel($nome, $dataNascimento, $cpf)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Funcionarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nome Nome
     * @param string $dataNascimento Data Nascimento
     * @param string $cpf Cpf
     * @return Funcionarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nome, $dataNascimento, $cpf)
    {
        if (($model = Funcionarios::findOne(['nome' => $nome, 'dataNascimento' => $dataNascimento, 'cpf' => $cpf])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
