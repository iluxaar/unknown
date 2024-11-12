<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Class ConvertController
 * @package app\commands
 */
class ConvertController extends Controller
{
	/**
	 * @return void
	 */
	public function actionScss(): void
	{
		$from = Yii::getAlias('@app') . '/assets/main/css/site.scss';
		$to = Yii::getAlias('@app') . '/web/css/site.css';
		shell_exec("sass {$from} {$to} --style=compressed");
		
		Console::stdout("ОК \r\n");
	}
}