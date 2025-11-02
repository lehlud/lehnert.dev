<?php

require_once __DIR__ . "/lib/_index.php";

$blogs = Blog::getAll();

header("Content-Type: application/xml");

echo '<?';
?>xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://lehnert.dev/</loc>
        <lastmod>2025-11-02</lastmod>
        <changefreq>monthly</changefreq>
        <priority>1.0</priority>
    </url>


    <?php foreach ($blogs as $blog): ?>
        <url>
            <loc>https://lehnert.dev/blog/<?= $blog->id ?>/</loc>
            <!-- <lastmod><?= $blog->date() ?></lastmod> -->
            <priority>0.8</priority>
        </url>
    <?php endforeach; ?>

    <url>
        <loc>https://lehnert.dev/imprint/</loc>
        <lastmod>2025-04-16</lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.5</priority>
    </url>

    <url>
        <loc>https://lehnert.dev/privacy/</loc>
        <lastmod>2025-11-02</lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.5</priority>
    </url>
</urlset>