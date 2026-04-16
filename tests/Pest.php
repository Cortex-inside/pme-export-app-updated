<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/*
|--------------------------------------------------------------------------
| Pest Configuration
|--------------------------------------------------------------------------
| This file is the entry point for Pest PHP tests. Configure global
| helpers, expectations, or dataset here.
|
*/

uses(TestCase::class)->in('Feature');
uses(TestCase::class)->in('Unit');
