<?php

namespace app\modules\api\controllers;

use ApiBaseController;
use app\models\Cook;

class CookController extends ApiBaseController
{
    public function actionPopular(): array
    {
        return Cook::getPopular();
    }
}
