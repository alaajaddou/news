<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Google reCAPTCHA Configuration
	|--------------------------------------------------------------------------
	|
	| These keys are provided by Google reCAPTCHA.
	| You can get them at https://www.google.com/recaptcha/admin
	|
	*/

	'site_key'   => env('RECAPTCHA_SITE_KEY', ''),
	'secret_key' => env('RECAPTCHA_SECRET_KEY', ''),

	/*
	|--------------------------------------------------------------------------
	| reCAPTCHA Settings
	|--------------------------------------------------------------------------
	|
	| version: 'v2' or 'v3'
	| threshold: Only used in v3
	|
	*/

	'version'    => 'v3',
	'threshold'  => 0.6, // Only relevant for v3

];
