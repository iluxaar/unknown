<?php

namespace app\commands;

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
	 * @deprecated
	 */
	public function actionScss(): void
	{
		Console::stdout("ОК \r\n");
	}
}