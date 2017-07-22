<?php

/*
 * This file is part of Share-Online.biz PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\ShareOnlineBiz\API;

use BrianFaust\Http\HttpResponse;
use GuzzleHttp\Post\PostFile;

class Folder extends AbstractAPI
{
    public function uploadSession(): HttpResponse
    {
        $response = $this->post('upv3_session.php');

        list($ip, $server) = explode(';', $resp);

        return compact('ip', 'server');
    }

    public function upload($file): HttpResponse
    {
        $session = $this->uploadSession();

        $params = [
            'username'       => $this->username,
            'password'       => $this->password,
            'upload_session' => $session['id'],
            'chunk_no'       => 1,
            'chunk_number'   => 1,
            'filesize'       => filesize($file),
            'fn'             => new PostFile('file', fopen($file, 'r')),
            'finalize'       => 1,
        ];

        $response = $this->post('http://'.$session['server'], $params, true);

        list($link, $filesize, $md5) = explode(';', $response);

        return compact('link', 'filesize', 'md5');
    }

    public function status(string $link): HttpResponse
    {
        $response = $this->post('linkcheck.php', ['links' => $link]);

        list($id, $status, $name, $size) = explode(';', $response);

        return compact('id', 'status', 'name', 'size');
    }
}
