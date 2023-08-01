<?php

namespace tests\unit\models;

use app\models\MUser;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        verify($user = MUser::findIdentity(100))->notEmpty();
        verify($user->username)->equals('admin');

        verify(MUser::findIdentity(999))->empty();
    }

    public function testFindUserByAccessToken()
    {
        verify($user = MUser::findIdentityByAccessToken('100-token'))->notEmpty();
        verify($user->username)->equals('admin');

        verify(MUser::findIdentityByAccessToken('non-existing'))->empty();
    }

    public function testFindUserByUsername()
    {
        verify($user = MUser::findByUsername('admin'))->notEmpty();
        verify(MUser::findByUsername('not-admin'))->empty();
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser()
    {
        $user = MUser::findByUsername('admin');
        verify($user->validateAuthKey('test100key'))->notEmpty();
        verify($user->validateAuthKey('test102key'))->empty();

        verify($user->validatePassword('admin'))->notEmpty();
        verify($user->validatePassword('123456'))->empty();        
    }

}
