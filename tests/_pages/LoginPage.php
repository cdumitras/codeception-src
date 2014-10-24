<?php

class LoginPage
{
    // include url of current page
    public static $URL = '/customer/account/login/';

    public static $emailField = '#email';

    public static $passwordField = '#pass';

    public static $loginButton = '#send2';

    /**
     * @var AcceptanceTester
     */
    protected $AcceptanceTester;

    public function __construct(AcceptanceTester $I)
    {
        $this->AcceptanceTester = $I;
    }

    public static function of(AcceptanceTester $I)
    {
        return new static($I);
    }

    public function login($name, $password)
    {
        $I = $this->AcceptanceTester;

        $I->amOnPage(self::$URL);
        $I->fillField(LoginPage::$emailField, $name);
        $I->fillField(LoginPage::$passwordField, $password);
        $I->click(LoginPage::$loginButton);
        $I->canSeeElement('#my-orders-table');

        return $this;
    }
    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: EditPage::route('/123-post');
     */
     public static function route($param)
     {
        return static::$URL.$param;
     }


}