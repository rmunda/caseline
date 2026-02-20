<?php
// app/Enums/UserRole.php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Advocate  = 'advocate';
}
