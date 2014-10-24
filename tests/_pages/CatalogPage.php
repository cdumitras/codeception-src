<?php

class CatalogPage
{
    // include url of current page
    public static $URL = '/furniture/living-room.html';
    public static $testProduct = 'Magento Red Furniture Set';
    public static $qtyInput = '#super-product-table > tbody > tr.even > td.a-center.last > input';
    public static $buyButton = '.add-to-cart button';
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