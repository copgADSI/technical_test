<?php

namespace App\Traits;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

/**
 *
 */
trait EmailTrait
{
	/**
	 * @param string $to
	 * @param $email
	 * @return void
	 */
	public function sendEmail(string $to, $email)
	{
		Mail::to($to)->send($email);
	}
}
