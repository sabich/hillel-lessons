<?php


namespace App\Models;


class Herbivorous extends Animal
{

    function eat(): string
    {
        return 'This animal eat only herb';
    }
}