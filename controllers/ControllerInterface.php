<?php

namespace app\controllers;

/**
 *
 * Interface ControllerInterface
 * @package app\controllers
 *
 * Интерфейс для базовых CRUD
 */
interface ControllerInterface
{
	/**
	 * @return string
	 */
	public function getModelName(): string;
	
	/**
	 * @return string
	 */
	public function getSearchModelName(): string;
}