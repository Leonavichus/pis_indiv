<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\db\Query;

use app\models\Req1Form;
use app\models\Req2Form;
use app\models\Req3Form;
use app\models\Req4Form;
use app\models\Req5Form;
use app\models\Req6Form;
use app\models\Req7Form;
use app\models\Req8Form;
use app\models\Req9Form;
use app\models\Req10Form;
use app\models\Req11Form;
use app\models\Req12Form;
use app\models\Req13Form;
use app\models\Req14Form;

class RequestController extends Controller
{
    public function actionReq1()
    {
        //1.Получить перечень видов изделий отдельной категории и в целом, собираемых указанным цехом, предприятием. 
        $model = new Req1Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->category = '%';
            $model->workshop = '%';
            $model->company = '%';
        }
        $query = (new Query())
            ->select('product.name as pname, category.name as cname, sector.name as sname, workshop.name as wname, company.name as coname')
            ->from('log')
            ->innerJoin('product', 'log.id_product = product.id')
            ->innerJoin('category', 'product.id_category = category.id')
            ->innerJoin('sector', 'sector.id = log.id_sector')
            ->innerJoin('workshop', 'workshop.id = sector.id_workshop')
            ->innerJoin('company', 'company.id = workshop.id_company')
            ->where(['like', 'product.id_category', $model->category, false])
            ->andWhere(['like', 'sector.id_workshop', $model->workshop, false])
            ->andWhere(['like', 'workshop.id_company', $model->company, false]);
        $search = $query->all();
        return $this->render('req1', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //2.Получить число и перечень изделий отдельной категории и в целом, собранных указанным цехом, участком, предприятием в целом за определенный отрезок времени.
    public function actionReq2()
    {
    }

    //3.Получить данные о кадровом составе цеха, предприятия в целом и по указанным категориям инженерно-технического персонала и рабочих.
    public function actionReq3()
    {
        $model = new Req3Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->post = '%';
            $model->workshop = '%';
            $model->company = '%';
        }
        $query = (new Query())
            ->select('workers.fullname, post.name as pname, sector.name as sname, workshop.name as wname, company.name as coname')
            ->from('workers')
            ->innerJoin('post', 'post.id = workers.id_post')
            ->innerJoin('sector', 'sector.id = workers.id_sector')
            ->innerJoin('workshop', 'workshop.id = sector.id_workshop')
            ->innerJoin('company', 'company.id = workshop.id_company')
            ->where(['like', 'workers.id_post', $model->post, false])
            ->andWhere(['like', 'sector.id_workshop', $model->workshop, false])
            ->andWhere(['like', 'workshop.id_company', $model->company, false]);
        $search = $query->all();
        return $this->render('req3', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //4.Получить число и перечень участков указанного цеха, предприятия в целом и их начальников. 
    public function actionReq4()
    {
    }

    //5.Получить перечень работ, которые проходит указанное изделие.
    public function actionReq5()
    {
        $model = new Req5Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->product = '%';
            $model->work = '%';
        }
        $query = (new Query())
            ->select('product.name as pname, work_prod.name as wname')
            ->from('prod_work')
            ->innerJoin('product', 'product.id = prod_work.id_product')
            ->innerJoin('work_prod', 'work_prod.id = prod_work.id_work')
            ->where(['like', 'prod_work.id_work', $model->work, false])
            ->andWhere(['like', 'prod_work.id_product', $model->product, false]);
        $search = $query->all();
        return $this->render('req5', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //6.Получить состав бригад указанного участка, цеха. 
    public function actionReq6()
    {
        $model = new Req6Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->sector = '%';
            $model->workshop = '%';
        }
        $query = (new Query())
            ->select('brigade.name as bname, workers.fullname, sector.name as sname, workshop.name as wname')
            ->from('workers')
            ->innerJoin('brigade', 'brigade.id = workers.id_brigade')
            ->innerJoin('sector', 'sector.id = workers.id_sector')
            ->innerJoin('workshop', 'workshop.id = sector.id_workshop')
            ->where(['like', 'workers.id_sector', $model->sector, false])
            ->andWhere(['like', 'sector.id_workshop', $model->workshop, false]);
        $search = $query->all();
        return $this->render('req6', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //7.Получить перечень мастеров указанного участка, цеха. 
    public function actionReq7()
    {
        $model = new Req7Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->sector = '%';
            $model->workshop = '%';
        }
        $query = (new Query())
            ->select('workers.fullname, post.name as pname, sector.name as sname, workshop.name as wname')
            ->from('workers')
            ->innerJoin('post', 'post.id = workers.id_post')
            ->innerJoin('sector', 'sector.id = workers.id_sector')
            ->innerJoin('workshop', 'workshop.id = sector.id_workshop')
            ->where(['like', 'workers.id_sector', $model->sector, false])
            ->andWhere(['like', 'sector.id_workshop', $model->workshop, false])
            ->andWhere(['like', 'workers.id_post', '7', false]);
        $search = $query->all();
        return $this->render('req7', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //8.Получить перечень изделий отдельной категории и в целом, собираемых в настоящий момент указанным участком, цехом, предприятием. 
    public function actionReq8()
    {
        $model = new Req8Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->sector = '%';
            $model->workshop = '%';
            $model->company = '%';
        }
        $query = (new Query())
            ->select('product.name as pname, category.name as cname, sector.name as sname, workshop.name as wname, company.name as coname')
            ->from('log')
            ->innerJoin('product', 'log.id_product = product.id')
            ->innerJoin('category', 'product.id_category = category.id')
            ->innerJoin('sector', 'sector.id = log.id_sector')
            ->innerJoin('workshop', 'workshop.id = sector.id_workshop')
            ->innerJoin('company', 'company.id = workshop.id_company')
            ->where(['like', 'log.id_sector', $model->sector, false])
            ->andWhere(['like', 'sector.id_workshop', $model->workshop, false])
            ->andWhere(['like', 'workshop.id_company', $model->company, false])
            ->andWhere(['like', 'isReady', '0', false]);
        $search = $query->all();
        return $this->render('req8', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //9.Получить состав бригад, участвующих в сборке указанного изделия. 
    public function actionReq9()
    {
        $model = new Req9Form();
        if (!$model->load(Yii::$app->request->post())) {
            $model->product = '%';
        }

        $query = (new Query())
            ->select('');
        $search = $query->all();

        return $this->render('req9', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //10.Получить перечень испытательных лабораторий, участвующих в испытаниях некоторого конкретного изделия. 
    public function actionReq10()
    {
    }

    //11.Получить перечень изделий отдельной категории и в целом, проходивших испытание в указанной лаборатории за определенный период. 
    public function actionReq11()
    {
    }

    //12.Получить перечень испытателей, участвующих в испытаниях указанного изделия, изделий отдельной категории и в целом в указанной лаборатории за определенный период. 
    public function actionReq12()
    {
    }

    //13.Получить состав оборудования, использовавшегося при испытании указанного изделия, изделий отдельной категории и в целом в указанной лаборатории за определенный период. 
    public function actionReq13()
    {
    }

    //14.Получить число и перечень изделий отдельной категории и в целом, собираемых указанным цехом, участком, предприятием в настоящее время. 
    public function actionReq14()
    {
    }
}
