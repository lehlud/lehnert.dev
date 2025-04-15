<?php

class Blog
{
    public readonly string $id;
    public readonly string $title;
    public readonly string $date;
    public readonly array $files;

    public function __construct(string $id, string $title, string $date, array $files)
    {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->files = $files;
    }

    public function formatDate(): string
    {
        return date("F jS, Y", strtotime($this->date));
    }

    public function getSVGs(): array
    {
        return array_map(function ($file) {
            $svg = file_get_contents(__DIR__ . '/../blog/' . $file);

            if (str_starts_with($svg, '<?xml')) {
                $svg = preg_replace('/^\s*<\?xml[^>]+>\s*/', '', $svg);
            }

            return $svg;
        }, $this->files);
    }

    public static function get(string|int $id): Blog|null
    {
        $path = __DIR__ . "/../blog/$id.json";
        if (!file_exists($path))
            return null;

        try {
            $json = json_decode(file_get_contents($path), true);
            return new Blog($id, $json['title'], $json['date'], $json['files']);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @return Blog[]
     */
    public static function getAll()
    {
        $files = scandir(__DIR__ . '/../blog');
        $files = array_filter($files, function ($file) {
            return str_ends_with($file, '.json');
        });

        $ids = array_map(function ($file) {
            return str_replace('.json', '', $file);
        }, $files);

        $blogs = [];

        foreach ($ids as $id) {
            $blog = Blog::get($id);
            if ($blog !== null)
                array_push($blogs, $blog);
        }

        return $blogs;
    }
}