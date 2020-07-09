<?php

include 'class/Livre.php';

$l1 = new Livre("Seigneur des Anneaux", "Tolkien", 250, 20, "25-01-2000");
$l2 = new Livre("Harry Potter", "Rowling", 158, 25, "31-08-2000");
$livre = new Livre();

echo $l1;
echo $l2;

echo $livre;