<?php

class Deck {
    public readonly string $id;
    public readonly array $json;

    public function __construct(string $id, array $json)
    {
        $this->id = $id;
        $this->json = $json;
    }

    private array|null $cached_card_file_names = null;

    public function title(): string {
        return $this->json['title'];
    }

    public function requireMathJax(): bool {
        if (!isset($this->json['requireMathJax'])) return false;
        return $this->json['requireMathJax'] || false;
    }
    /**
     * @return DeckCard[]
     */
    public function getCards(): array {
        return [];
    }

    /**
     * @return string[]
     */
    public function getCardFileNames(): array {
        if ($this->cached_card_file_names) return $this->cached_card_file_names;

        $card_file_names = scandir(__DIR__."/../www/decks/$this->id/cards");
        $card_file_names = array_filter($card_file_names, fn($file) => str_ends_with($file, '.htm') && is_file(__DIR__."/../www/decks/$this->id/cards/$file"));
        $card_file_names = array_values($card_file_names);

        $this->cached_card_file_names = $card_file_names;
        return $card_file_names;
    }

    /**
     * @return string[]
     */
    public function getCardIds(): array {
        $ids = array_map(
            fn($file) => substr($file, 0, -4),
            $this->getCardFileNames(),
        );

        $ids = array_values($ids);

        return $ids;
    }

    public function getCardCount(): int {
        return count($this->getCardFileNames());
    }

    public function getCard(string $id): DeckCard|null {
        if (str_contains($id, '..'))
            return null;

        $card_file_name = "$id.htm";
        $card_file_path = __DIR__."/../www/decks/$this->id/cards/$card_file_name";

        if (!is_file($card_file_path))
            return null;

        $card_html = file_get_contents($card_file_path);
        [$front_html, $back_html] = explode('-----', $card_html);

        $front_html = trim($front_html);
        $back_html = trim($back_html);

        return new DeckCard($id, $front_html, $back_html);
    }

    public static function get(string $id): Deck|null {
        if (str_contains($id, '..'))
            return null;
        
        $dirPath = __DIR__ . "/../www/decks/$id";
        $dirJsonPath = "$dirPath/_deck.json";

        if (!is_file($dirJsonPath))
            return null;

        $json = json_decode(file_get_contents($dirJsonPath), true);
        return new Deck($id, $json);
    }

    /**
     * @return Deck[]
     */
    public static function getAll(): array {
        $dirs = scandir(__DIR__.'/../www/decks/');
        $dirs = array_filter($dirs, fn($dir) => is_dir(__DIR__ . "/../www/decks/$dir") && $dir !== '.' && $dir !== '..');

        $decks = [];
        foreach ($dirs as $id) {
            $deck = Deck::get($id);
            if ($deck) array_push($decks, $deck);
        }

        return $decks;
    }
}

class DeckCard {
    public readonly string $id;
    public readonly string $front_html, $back_html;

    public function __construct(string $id, string $front_html, string $back_html)
    {
        $this->id = $id;
        $this->front_html = $front_html;
        $this->back_html = $back_html;
    }
}