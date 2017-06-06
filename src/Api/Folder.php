<?php

/*
 * This file is part of Share-Online.biz PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\ShareOnlineBiz\Api;

use GuzzleHttp\Post\PostFile;

class Folder extends AbstractApi
{
    public function uploadSession()
    {
        $resp = $this->send('upv3_session', [
            'username' => $this->username,
            'password' => $this->password,
        ], true);
        $resp = explode(';', $resp);

        return [
            'id' => $resp[0],
            'server' => $resp[1],
        ];
    }

    public function upload($file)
    {
        $session = $this->getUploadSession();

        $params = [
            'username' => $this->username,
            'password' => $this->password,
            'upload_session' => $session['id'],
            'chunk_no' => 1,
            'chunk_number' => 1,
            'filesize' => filesize($file),
            'fn' => new PostFile('file', fopen($file, 'r')),
            'finalize' => 1,
        ];

        $resp = $this->send('http://'.$session['server'], $params, true);
        $resp = explode(';', $resp);

        return [
            'link' => $resp[0],
            'filesize' => $resp[1],
            'md5' => $resp[2],
        ];
    }

    public function status($link)
    {
        $resp = $this->send('linkcheck', ['links' => $link]);
        $resp = explode(';', $resp);

        return [
            'id' => $resp[0],
            'status' => $resp[1],
            'name' => $resp[2],
            'size' => $resp[3],
        ];
    }
}
