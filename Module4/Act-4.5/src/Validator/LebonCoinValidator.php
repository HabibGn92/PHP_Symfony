<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class LebonCoinValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if ( !str_starts_with($value,'https://www.leboncoin.fr/categorie/identifiant.htm/') ) {
            $this->context->buildViolation($constraint->message)
            ->addViolation();
        }
    }
}