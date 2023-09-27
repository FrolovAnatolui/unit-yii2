<?php

namespace app\controllers;
use Yii;
use app\models\ClaimForm;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Claim;

class ClaimController extends Controller
{
    public function actionIndex()
    {
        $query = Claim::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $claims = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'claims' => $claims,
            'pagination' => $pagination,
        ]);
    }

    public function actionClaim()
    {
        $model = new ClaimForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены
            $claim = new Claim();
            $claim->name = $model->name;
            $claim->phone = $model->phone;
            $claim->email = $model->email;
            // делаем что-то полезное с $model ...

            if ($claim->save()) {
                // Запись успешно сохранена

                // Возвращаем пользователю подтверждение сохранения
                return $this->render('claim-confirm', ['model' => $model]);
            }
//            return $this->render('claim-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('claim', ['model' => $model]);
        }
    }
}
