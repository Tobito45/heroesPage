<?php

namespace App\Helpers;

enum LoginStatus : string
{
    case FAILED_PASSWORD = 'Password is no correct';
    case FAILED_USER = 'User doesn not exists';
    case CORRECT = 'CORRECT';
}
