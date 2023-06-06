<?php

namespace App\Enums;

use App\Traits\UseFulEnums;

enum UserType: int
{
    use UseFulEnums;

    case CUSTOMER = 1;
    case ADMIN = 28;
    case SUPER_ADMIN = 69;
}
