<?php
$age = 5;

/*if (6 == $age || $age == 7){
    echo "L'enfant qui a ".$age." ans appartient à la catégorie 'Poussin'";
} else if(8 == $age || $age == 9){
    echo "L'enfant qui a ".$age." ans appartient à la catégorie 'Pupille'";
} else if (10 == $age || $age == 11){
    echo "L'enfant qui a ".$age." ans appartient à la catégorie 'Minime'";
} else if (12 > $age || $age <= 18){
    echo "L'enfant qui a ".$age." ans appartient à la catégorie 'Cadet'";
} else {
    echo "La catégorie n'est pas gérée";
} */

if ($age < 6){
    echo "La catégorie n'est pas gérée";
}else if ($age <= 7){
    echo "L'enfant qui a ".$age." ans appartient à la catégorie 'Poussin'";
} else if( $age <= 9 ){
    echo "L'enfant qui a ".$age." ans appartient à la catégorie 'Pupille'";
} else if ( $age <= 11){
    echo "L'enfant qui a ".$age." ans appartient à la catégorie 'Minime'";
} else if ($age <= 18){
    echo "L'enfant qui a ".$age." ans appartient à la catégorie 'Cadet'";
} else {
    echo "La catégorie n'est pas gérée";
}

