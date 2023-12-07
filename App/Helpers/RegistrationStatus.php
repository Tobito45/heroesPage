<?php

namespace App\Helpers;

enum RegistrationStatus: string {
    case FAILED_EMAIL = 'This email already exists';
    case FAILED_LOGIN = 'This login already exists';
    case FAILED_LOGIN_EMAIL = 'Such user already exists';
    case CORRECT = 'CORRECT';
}