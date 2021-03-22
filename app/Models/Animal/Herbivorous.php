<?php


namespace App\Models\Animal;


class Herbivorous extends Animal
{

    function eat(): string
    {
        return 'This animal eat only herb';
    }
}