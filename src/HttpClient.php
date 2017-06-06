<?php

/*
 * This file is part of Share-Online.biz PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\ShareOnline;

use BrianFaust\Unified\AbstractHttpClient;
use BrianFaust\ShareOnline\Request\Modifiers\ApiKeyModifier;

class HttpClient extends AbstractHttpClient
{
    protected $options = [
        'base_uri' => 'https://www.share-online.com/vtapi/v2/',
        'headers' => [
           'User-Agent' => 'ShareOnline-PHP-Client/0.1.0',
        ],
    ];

    protected $requestModifiers = [ApiKeyModifier::class];
}
