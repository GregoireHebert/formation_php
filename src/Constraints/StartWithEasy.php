<?php

declare(strict_types=1);

namespace App\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 */
class StartWithEasy extends Constraint
{
}
