<?php

namespace Pterodactyl\Exceptions\Service\User;

use Pterodactyl\Exceptions\DisplayException;

class TwoFactorAuthenticationTokenInvalid extends DisplayException
{
    /**
     * TwoFactorAuthenticationTokenInvalid constructor.
     */
    public function __construct()
    {
        parent::__construct('O token de autenticação de 2-fatores fornecido não era válido.');
    }
}
