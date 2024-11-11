<?php

namespace app\controllers;

/**
 * Interface ControllerInterface
 * @package app\controllers
 *
 *
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