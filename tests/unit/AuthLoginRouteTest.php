<?php

use CodeIgniter\Test\FeatureTestCase;

final class AuthLoginRouteTest extends FeatureTestCase
{
    protected $migrate = true;
    protected $refresh = true;
    protected $seed    = 'App\Database\Seeds\UserSeeder';

    public function testAdminLoginRedirectsToDashboard(): void
    {
        $result = $this->post('/auth/loginProcess', [
            'username' => 'admin',
            'password' => 'admin123',
        ]);

        $this->assertTrue($result->isRedirect());
        $this->assertStringContainsString('/dashboard', $result->getHeaderLine('Location'));
    }
}
