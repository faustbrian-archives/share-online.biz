<?php

declare(strict_types=1);

/*
 * This file is part of Share-Online.biz PHP Client.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plients\ShareOnline\API;

use Plients\Http\HttpResponse;
use Plients\Http\PendingHttpRequest;

abstract class AbstractAPI
{
    /**
     * @var \Plients\Http\PendingHttpRequest
     */
    protected $client;

    /**
     * Create a new API class instance.
     *
     * @param \Plients\Http\PendingHttpRequest $client
     */
    public function __construct(PendingHttpRequest $client)
    {
        $this->client = $client;
    }

    protected function post(string $method, array $parameters = []): HttpResponse
    {
        return $this->client->post($method, [
            'username' => $this->client->username,
            'password' => $this->client->password,
        ] + $parameters);
    }
}
