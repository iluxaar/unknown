<?php

namespace app\modules\v1;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0',
    title: 'API клиент',
)]
#[OA\Server(url: 'https://unknown.lc/v1', description: 'Локальный сервер')]
#[OA\SecurityScheme(
    securityScheme: 'apiKey',
    type: 'apiKey',
    name: 'access-token',
    in: 'query',
)]
class OpenApi
{

}
