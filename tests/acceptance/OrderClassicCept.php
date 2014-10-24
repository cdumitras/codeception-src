<?php

// Login
$I = new AcceptanceTester($scenario);
$I->wantTo('make a new order with all the steps in the same test');
$I->amOnPage('/customer/account/login/');
$I->fillField('#email', 'demo@pentalog.fr');
$I->fillField('#pass', '1234567');
$I->click('#send2');
$I->canSeeElement('#my-orders-table');

// Catalog
$I->amOnPage('/furniture/living-room.html');
$I->click('Magento Red Furniture Set');
$I->fillField('#super-product-table > tbody > tr.even > td.a-center.last > input', 1);
$I->click('.add-to-cart button');

// Shoppingcart
$I->click('.totals > ul:nth-child(2) > li:nth-child(1) > button:nth-child(1)');

// One page checkout
$I->click('#billing-buttons-container button');
$I->waitForElementVisible('#shipping-method-buttons-container button');
$I->click('#shipping-method-buttons-container button');
$I->waitForElementVisible('#payment-buttons-container button');
$I->click('#p_method_checkmo');
$I->click('#payment-buttons-container button');
$I->waitForElementVisible('#review-buttons-container button');
$I->click('#review-buttons-container button');
sleep(30);

// Order success
$I->makeScreenshot('ordersuccess');

