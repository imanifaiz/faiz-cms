<?php

// app/start/custom_helpers.php (Included in global.php)
function dumpComments($comments, $view = 'site.layouts.comments')
{
    $commentList = '';
    foreach ($comments as $comment) {
        $commentList .= View::make($view)->with('comment', $comment);
    }
    return $commentList;
}