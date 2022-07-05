<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class LebonCoin extends Constraint{
    public $message = 'Entrer un lien valid';

    public function validatedBy()
{
    return static::class.'Validator';
}

}