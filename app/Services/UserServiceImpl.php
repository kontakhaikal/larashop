<?php

namespace App\Services;

use App\Dto\RegisterUserRequest;
use App\Exceptions\RegisterAdminException;
use App\Models\Admin;
use App\Models\Customer;


class UserServiceImpl implements UserService
{

    function registerAdmin(RegisterUserRequest $request): string
    {
        if (Admin::count() > 0) {
            throw new RegisterAdminException('Admin already exists');
        };
        $admin = Admin::create($request->all());
        $admin->save();
        return $admin->id;
    }

    function registerCustomer(RegisterUserRequest $request): string
    {
        $customer = Customer::create($request->all());
        $customer->save();
        return $customer->id;
    }
}
