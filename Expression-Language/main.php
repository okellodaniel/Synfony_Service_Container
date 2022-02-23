<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

$language = new ExpressionLanguage();

echo "Evaluated Value" . $language->evaluate('10 + 12') . '\r\n';
echo "Compiled Code" . $language->compile('130%34') . '\r\n';


class Product
{
    public $name;
    public $price;
}

$product = new Product();
$product->name = 'Apple';
$product->price = '$10';

echo "Product price is  " . $language
    ->evaluate('Product.price', array('product' => $product,)) . '\r\n';
echo "Is Product higher than $10? " . $language
    ->evaluate('Product.price > 5', array('product' => $product,)) . '\r\n';
