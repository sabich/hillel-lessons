<?php


namespace App\Models;


class Predator extends Animal
{

    function eat():string
    {
        return 'This animal eat only other animal';
    }

}