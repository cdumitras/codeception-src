<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('make a new order');
LoginPage::of($I)->login('demo@pentalog.fr', '1234567');
$I->amOnPage(CatalogPage::$URL);
$I->click(CatalogPage::$testProduct);
$I->fillField(CatalogPage::$qtyInput, 1);
$I->click(CatalogPage::$buyButton);
$I->click(ShoppingCartPage::$checkoutButton);
OnePageCheckoutPage::of($I)->checkout();
$I->makeScreenshot('ordersuccess2');