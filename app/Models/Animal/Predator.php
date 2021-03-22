<?php


namespace App\Models\Animal;


class Predator extends Animal
{

    function eat():string
    {
        return 'This animal eat only other animal';
    }

}