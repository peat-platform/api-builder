<?php

namespace app\controllers;

use app\helpers\NotifUserHelper;
use app\models\FollowUserApi;
use yii\web\Controller;

/**
 * Swagger controller
 */
class SwaggerController extends Controller
{
	/**
	 * Render the Index page. Swagger UI
	 */
	public function actionIndex()
	{
		$this->layout = 'swagger';
		return $this->render('index');
	}

	/**
	 * Reads a Swagger Json and creates a new Apis model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionRead()
	{
		$model = new Apis();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {

			$_resourcesPath = $this->_apiDomain . $this->_docPath . $this->_resourcesPath;

			$site = new FetchSwaggerCore();
			if (!$site->setResource($_resourcesPath))
				$message = "Something went wrong!";
			if (!$site->setSchemas())
				$message = "Something went wrong!";

			$myId = \Yii::$app->user->id;
			$change = new NotifUserHelper();
			$followersNotified = null;
			$followersNotified = $change->userChangedCreatedApi($myId);

			// Automatically follow the APIs I create
			$followModel = new FollowUserApi();
			$followModel->follower = $myId;
			$followModel->api = $model->id;
			$followModel->save();

			return $this->redirect(['apis/view', 'id' => $model->id, 'followersNotified' => $followersNotified]);
		} else {
			return $this->render('read', [
				'model' => $model,
			]);
		}
	}
}