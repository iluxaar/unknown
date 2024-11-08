<?php

namespace app\jobs;

use yii\base\BaseObject;
use yii\mail\MessageInterface;
use yii\queue\JobInterface;

/**
 * Class MailSendJob
 * @package app\jobs
 */
class MailSendJob extends BaseObject implements JobInterface
{
	/**
	 * @var MessageInterface
	 */
	public $message;
	
	/**
	 * @param $queue
	 * @return void
	 */
	public function execute($queue): void
	{
		$this->message->send();
	}
}