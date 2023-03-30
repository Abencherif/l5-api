<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Abencherif\L5Api\Http\Controllers\Features\JWTAuthenticationTrait;

class AuthController extends Controller
{
    use JWTAuthenticationTrait;
}
