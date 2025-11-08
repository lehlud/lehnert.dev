<?php

class Blog
{
    public readonly string $id;
    public readonly array $json;

    public function __construct(string $id, array $json)
    {
        $this->id = $id;
        $this->json = $json;
    }

    public function date(): string
    {
        return $this->json['date'];
    }

    public function title(): string
    {
        return $this->json['title'];
    }

    public function keywords(): array
    {
        return $this->json['keywords'];
    }

    public function bookmarks(): array
    {
        return $this->json['bookmarks'];
    }

    public function urls(): array
    {
        return $this->json['urls'];
    }

    public function files(): array
    {
        return $this->json['files'];
    }

    public function width(): float
    {
        return $this->json['dimensions'][0];
    }

    public function height(): float
    {
        return $this->json['dimensions'][1];
    }

    public function formatDate(): string
    {
        return date("F jS, Y", strtotime($this->date()));
    }

    public function transcript_html(): string
    {
        return file_get_contents(__DIR__."/../blog/{$this->id}/_transcript.html");
    }

    public static function get(string $id): Blog|null
    {
        if (str_contains($id, '..'))
            return null;

        $path = __DIR__ . "/../blog/$id/_definition.json";
        if (!file_exists($path))
            return null;

        try {
            $json = json_decode(file_get_contents($path), true);
            return new Blog($id, $json);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @return Blog[]
     */
    public static function getAll()
    {
        $dirs = scandir(__DIR__ . '/../blog');
        $dirs = array_filter($dirs, fn($dir) => is_dir(__DIR__ . "/../blog/$dir") && $dir !== '.' && $dir !== '..');

        $blogs = [];

        foreach ($dirs as $id) {
            $blog = Blog::get($id);
            if ($blog !== null)
                array_push($blogs, $blog);
        }

        return $blogs;
    }
}