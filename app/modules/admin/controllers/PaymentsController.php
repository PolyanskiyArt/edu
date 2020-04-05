<?php

namespace app\modules\admin\controllers;

use app\models\Payment;
use app\modules\admin\forms\PaymentForm;
use app\modules\admin\models\PaymentSearch;
use app\traits\controllers\FindModelOrFail;
use Yii;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for User model.
 */
class PaymentsController extends Controller
{
    use FindModelOrFail;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->modelClass = PaymentForm::class;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Payment models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaymentSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider ->setSort([
            'attributes' => [
                'student_id',
                'payed_at',
                'sum',
                'course_group_id',
                'approved_at' => [
                    'default' => SORT_ASC,
                ],
                'approved_by',
            ],
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists Payment models.
     *
     * @return mixed
     */

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id), // $searchModel
        ]);
    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);

        $model->student_id;

        $model->approved_at = date('Y-m-d H:i:s');
        $model->approved_by = Yii::$app->user->id;

        $model->save(true, ['approved_at', 'approved_by']);

        return $this->redirect(['index']);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        // TODO: добавить удаление файла - скана чека

        return $this->redirect(['index']);
    }

}
