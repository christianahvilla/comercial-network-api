<?php

namespace Tests\Unit;

use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_admin_can_login_with_correct_credentials()
    {
        $this->post('http://localhost:8000/api/auth/login', [
            'email' => 'patrick.grimes@example.com',
            'password' => 'password'
        ])->assertStatus(200);
    }

    public function test_merchant_can_login_with_correct_credentials()
    {
        $this->post('http://localhost:8000/api/auth/login', [
            'email' => 'tatyana.keebler@example.org',
            'password' => 'password'
        ])->assertStatus(200);
    }

    public function test_employee_can_login_with_correct_credentials()
    {
        $this->post('http://localhost:8000/api/auth/login', [
            'email' => 'klocko.joshua@example.org',
            'password' => 'password'
        ])->assertStatus(200);
    }

    public function test_customer_can_login_with_correct_credentials()
    {
        $this->post('http://localhost:8000/api/auth/login', [
            'email' => 'hartmann.raul@example.org',
            'password' => 'password'
        ])->assertStatus(200);
    }

}
