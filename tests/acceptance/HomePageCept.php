<?php
$scenario->env(array('default', 'firefox', 'french', 'french-firefox'));
$I = new AcceptanceTester($scenario);
$I->wantTo('Test HomePage');
$I->amOnPage('/');
$I->see('Welcome');
$I->makeScreenshot('test');
