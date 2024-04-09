<?php
    namespace tests\unit\controllers;

    use app\controllers\SiteController;
    use Yii;
    use Request;

    class SiteControllersTest extends \Codeception\Test\Unit
    {
        public function testActionIndex()
        {
            $controller = new SiteController('site',Yii::$app);

            $response = $controller->actionIndex();

            $this->assertStringContainsString('Congratulations!',$response);
            $this->assertStringNotContainsString('Go to the login page',$response);
        }

    }