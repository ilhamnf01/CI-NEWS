<?php namespace App\Libraries;

class Widget
{

    public function recentPost(array $params = [])
    {
        return view('widget/recent_post', [
            'limit' => max(0, (int) ($params['limit'] ?? 5)),
        ]);
    }

}
