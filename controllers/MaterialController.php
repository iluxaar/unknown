<?php

namespace app\controllers;

use app\models\Material;
use app\search\MaterialSearch;
use yii\filters\VerbFilter;

/**
 * Class MaterialController
 * @package app\controllers
 *
 * Номенклатура материалов
 */
class MaterialController extends BaseController implements ControllerInterface
{
	/**
	 * @return string
	 */
	public function getModelName(): string
	{
		return Material::class;
	}
	
	/**
	 * @return string
	 */
	public function getSearchModelName(): string
	{
		return MaterialSearch::class;
	}
}
