<?php
    namespace tests\unit\models;

    use app\models\SignupForm;

    class SignupFormTest extends \Codeception\Test\Unit
    {
        public function testRules(){
            $model = new SignupForm();

            $model->username = "dev01";
            $model->email = "dev01@mail.com";
            $model->password = "123456";
            $this->assertTrue($model->validate());

            $model->username = "12";
            $this->assertTrue($model->validate());

            $model->username = str_repeat('a',255);
            $this->assertTrue($model->validate());

            $model->username = "1";
            $this->assertFalse($model->validate());

            $model->username = str_repeat('a',256);
            $this->assertFalse($model->validate());

            $model->username = null;
            $this->assertFalse($model->validate());

            $model->username = "";
            $this->assertFalse($model->validate());

            $model->password = null;
            $this->assertFalse($model->validate());

            $model->password = "";
            $this->assertFalse($model->validate());

            $model->password = str_repeat('a',5);
            $this->assertFalse($model->validate());
        }

        public function testSignup() {
            $model = new SignupForm();

            //success
            $model->username = "dev01";
            $model->email = "dev01@mail.com";
            $model->password = "123456";

            $user = $model->signup();
            $this->assertNotEmpty($user->username);

            //fail
            $model->username = "";
            $user = $model->signup();
            $this->assertNull($user);
        }
    }