<?php

namespace App\tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase 
{

    protected function createAuthenticatedClient($username = 'user', $password = 'password')
    {
        $client = static::createClient();
        $client->request(
          'POST',
          '/api/login_check',
          [],
          [],
          ['CONTENT_TYPE' => 'application/json'],
          json_encode([
            'username' => $username,
            'password' => $password,
          ])
        );
    
        $data = json_decode($client->getResponse()->getContent(), true);
    
        $client->setServerParameter('HTTP_Authorization', sprintf('Bearer %s', $data['token']));
    
        return $client;
    }

    public function testSuccessAuthentication(){
        $client = static::createClient();
        $client->request(
          'POST',
          '/api/login_check',
          [],
          [],
          ['CONTENT_TYPE' => 'application/json'],
          json_encode([
            'username' => 'rania@talan.com',
            'password' => 'rania123',
          ])
        );
        $this->assertResponseStatusCodeSame(200);
    }

    public function testFailedAuthentication()
    {
      $client = static::createClient();
      $client->request(
        'POST',
        '/api/login_check',
        [],
        [],
        ['CONTENT_TYPE' => 'application/json'],
        json_encode([
          'username' => 'kenza@talan.com',
          'password' => 'fakePassword',
        ])
      );
      $this->assertResponseStatusCodeSame(401);
    }

    public function testGetUsers() 
    {
      $client = $this->createAuthenticatedClient('rania@talan.com','rania123');
      $client->request('Get', '/api/users');
      $this->assertResponseStatusCodeSame(200);
    }

    public function testGetUserById()
    {
      $client = $this->createAuthenticatedClient('rania@talan.com','rania123');
      $client->request('Get', '/api/user/1');
      $this->assertResponseStatusCodeSame(200);
    }

    public function testGetInexistantUser()
    {
      $client = $this->createAuthenticatedClient('rania@talan.com','rania123');
      $client->request('Get', '/api/user/20');
      $this->assertResponseStatusCodeSame(404);
    }

    public function testPostUser()
    {
      $client = $this->createAuthenticatedClient('rania@talan.com','rania123');
      $client->request(
        'POST',
        '/api/user',
        [],
        [],
        ['CONTENT_TYPE' => 'application/json'],
        json_encode([
          'email' => 'user_name@talan.com',
          'name' => 'userName',
          'roles' => ["ROLE_USER"],
          'password' => "user_name123",
        ])
      );
      $this->assertResponseStatusCodeSame(201);
    }

    public function testEditUser() 
    {
      $client = $this->createAuthenticatedClient('rania@talan.com','rania123');
      $client->request(
        'PUT',
        '/api/user/4',
        [],
        [],
        ['CONTENT_TYPE' => 'application/json'],
        json_encode([
          'email' => 'habib@talan.com',
          'name' => 'habib',
          'roles' => ["ROLE_USER"],
          'password' => "habib123",
        ])
      );
      $this->assertResponseStatusCodeSame(200);
    }

    public function testDeleteUser() 
    {
      $client = $this->createAuthenticatedClient('rania@talan.com','rania123');
      $client->request('Delete', '/api/user/11');
      $this->assertResponseStatusCodeSame(200);
    }

    public function testDeleteInexistantUser()
    {
      $client = $this->createAuthenticatedClient('rania@talan.com','rania123');
      $client->request('Delete', '/api/user/20');
      $this->assertResponseStatusCodeSame(404);
    }
}