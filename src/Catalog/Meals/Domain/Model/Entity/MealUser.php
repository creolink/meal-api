<?php

namespace App\Meal\Domain\Model\Entity;

use App\Security\Domain\Model\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
class MealUser extends User
{
}
