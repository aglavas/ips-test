<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class NoModulesTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setEnvironment('courses_case_empty');
    }

    /**
     * @test
     */
    public function user_has_not_completed_any_module()
    {
        $response = $this->post('api/module_reminder_assigner', ['contact_email' => $this->user->email]);

        $response->assertStatus(200);

        $response->assertJson([
            'success' => true,
            'message' => 'Reminder successfully added for IPA Module 1',
        ]);
    }
}
