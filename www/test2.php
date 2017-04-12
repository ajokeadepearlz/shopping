<?php

include Product;

$prod new Product("book", "things fall apart", "500");

$price = $prod->getPrice();

echo $price;



