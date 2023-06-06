<?php

namespace App\Enums;

enum UserType: int
{
    case CUSTOMER = 1;
    case ADMIN = 28;
    case SUPER_ADMIN = 69;
}
