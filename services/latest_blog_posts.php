<?php

$blog_html = file_get_contents(BLOG_URL);

// disable invalid html reporting
$old_reporting = error_reporting(0);

$DOM = new DOMDocument;
$DOM->strictErrorChecking = false;
$DOM->loadHTML($blog_html, LIBXML_ERR_NONE);

error_reporting($old_reporting);

$articles = $DOM->getElementsByTagName('article');

$posts = [];

for ($i = 0; $i < $articles->length - 2; $i++) {

    $title = $articles->item($i)->getElementsByTagName('header');

    $link = $title->item(0)->getElementsByTagName('a');
    $link = $link->item(0)->attributes->getNamedItem('href')->value;

    $title = trim($title->item(0)->nodeValue);

    $time = $articles->item($i)->getElementsByTagName('time');
    $time = $time->item(0)->nodeValue;

    $author = "";
    $comments = "";
    $post = "";

    $anchors = $articles->item($i)->getElementsByTagName('a');
    $links = 0;

    for ($n = 0; $n < $anchors->length; $n++) {

        $rel = $anchors->item($n)->attributes->getNamedItem('rel');
        if ($rel != null && $rel->value == 'author') {
            $author = $anchors->item($n)->nodeValue;
            $links++;
        }

        $rel = $anchors->item($n)->attributes->getNamedItem('class');
        if ($rel != null && $rel->value == 'meta-comments-link') {
            $comments = $anchors->item($n)->nodeValue;
            $links++;
        }

        if ($links == 2) {
            break;
        }
    }

    $content = $articles->item($i)->getElementsByTagName('section')->item(0);
    $meta = $content->getElementsByTagName('p')->item(0);
    $footer = $content->getElementsByTagName('footer')->item(0);
    $content->removeChild($meta);
    $content->removeChild($footer);
    $post = trim($content->nodeValue);
    $post = substr($post, 0, strpos(wordwrap($post, BLOG_POST_CHARS_VISIBLE, "<>"), "<>"));
    $post = nl2br($post);

    $images = [];

    $imgs = $content->getElementsByTagName('img');

    for ($m = 0; $m < $imgs->length; $m++) {
        $src = $imgs->item($m)->attributes->getNamedItem('src');

        $href = $src->value;
        if (strpos($href, BLOG_POST_AUTHORS_BASE_URL) === false) {
            $images[] = $src->value;
        }

    }

    $posts[] = [
        'link' => $link,
        'title' => $title,
        'time' => $time,
        'author' => $author,
        'comments' => $comments,
        'post' => $post,
        'images' => $images];
}


