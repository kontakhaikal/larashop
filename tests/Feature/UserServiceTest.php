<?php

use App\Dto\RegisterUserRequest;
use App\Services\UserService;

afterEach(fn () => $this->clearDatabase());

it('can register admin', function () {
    $service = app(UserService::class);

    $id = $service->registerAdmin(
        RegisterUserRequest::validateAndCreate([
            'username' => 'nssdnfer',
            'password' => 'sfnernfr',
        ])
    );

    $this->assertDatabaseHas('users', [
        'id' => $id,
    ]);
});

it('can register customer', function () {
    $service = app(UserService::class);

    $id = $service->registerCustomer(
        RegisterUserRequest::validateAndCreate([
            'username' => 'nssdnfer sndnsdfsdfd',
            'password' => 'sfnernfrifnerinfioerf',
        ])
    );

    $this->assertDatabaseHas('users', [
        'id' => $id,
    ]);
});
