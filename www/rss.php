<?php

require_once __DIR__ . "/lib/_index.php";

$blogs = Blog::getAll();
usort($blogs, function ($a, $b) {
    return strtotime($b->date()) - strtotime($a->date());
});

header("Content-Type: application/xml");

echo '<?';
?>xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
<channel>
    <title>lehnert.dev Blog</title>
    <link>https://lehnert.dev</link>
    <description>Personal Blog of Ludwig Lehnert</description>
    <language>en-us</language>
    <lastBuildDate><?= date(DATE_RSS) ?></lastBuildDate>

    <?php foreach ($blogs as $blog): ?>
    <item>
        <title><?= htmlspecialchars($blog->title()) ?></title>
        <link><?= htmlspecialchars("https://lehnert.dev/blog/{$blog->id}") ?></link>
        <guid><?= htmlspecialchars("https://lehnert.dev/blog/{$blog->id}") ?></guid>
        <pubDate><?= date(DATE_RSS, strtotime($blog->date())) ?></pubDate>
        <content:encoded><![CDATA[
            <?= $blog->transcript_html() ?>
        ]]></content:encoded>
    </item>
    <?php endforeach; ?>
</channel>
</rss>
