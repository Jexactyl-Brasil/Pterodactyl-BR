<?php

namespace Pterodactyl\Http\Middleware\Admin\Servers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Pterodactyl\Models\Server;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ServerInstalled
{
    /**
     * Checks that the server is installed before allowing access through the route.
     */
    public function handle(Request $request, \Closure $next): mixed
    {
        /** @var \Pterodactyl\Models\Server|null $server */
        $server = $request->route()->parameter('server');

        if (!$server instanceof Server) {
            throw new NotFoundHttpException('Nenhum recurso do servidor foi localizado nos parâmetros da solicitação.');
        }

        if (!$server->isInstalled()) {
            throw new HttpException(Response::HTTP_FORBIDDEN, 'O acesso a este recurso não é permitido devido ao estado atual da instalação.');
        }

        return $next($request);
    }
}
