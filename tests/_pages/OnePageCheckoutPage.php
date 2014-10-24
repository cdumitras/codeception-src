<?php

class OnePageCheckoutPage
{
    // include url of current page
    public static $URL = '/checkout/onepage';
    public static $billingNextStep = '#billing-buttons-container button';
    public static $shippingNextStep = '#shipping-method-buttons-container button';
    public static $paymentNextStep = '#payment-buttons-container button';
    public static $paymentMethodCheck = '#p_method_checkmo';
    public static $orderButton = '#review-buttons-container button';

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

    public function checkout()
    {
        $I = $this->AcceptanceTester;
        $I->click(OnePageCheckoutPage::$billingNextStep);
        $I->waitForElementVisible(OnePageCheckoutPage::$shippingNextStep);
        $I->click(OnePageCheckoutPage::$shippingNextStep);
        $I->waitForElementVisible(OnePageCheckoutPage::$paymentNextStep);
        $I->click(OnePageCheckoutPage::$paymentMethodCheck);
        $I->click(OnePageCheckoutPage::$paymentNextStep);
        $I->waitForElementVisible(OnePageCheckoutPage::$orderButton);
        $I->click(OnePageCheckoutPage::$orderButton);
        sleep(30);

        return $this;
    }

}