<?php


declare(strict_types=1);

class Guestbook
{
    const MAX_POSTS = 21;

    private string $authorFn;
    private string $authorLn;
    private string $title;
    private string $content;
    private string $postdate;



    /**
     * Guestbook constructor.
     * @param string $authorFn
     * @param string $authorLn
     * @param string $title
     * @param string $content
     * @param string $postdate
     * @throws Exception
     */
    public function __construct(string $authorFn, string $authorLn, string $title, string $content)
    {
        $currentDate = new DateTime("now", new DateTimeZone('Europe/Brussels'));

        $this->authorFn = $authorFn;
        $this->authorLn = $authorLn;
        $this->title = $title;
        $this->content = $content;
        $this->postdate = $currentDate->format('Y-m-d H:i:s');

    }

    public static function getPosts(): array
    {
        $guestbookItems = [];

        foreach (Poster::get() as $guestbookItem) {
            $guestbookItems[] = $guestbookItem;
        }
        return array_slice(array_reverse($guestbookItems), 0, self::MAX_POSTS - 1);
    }

    /**
     * @return string
     */
    public function getAuthorFn(): string
    {
        return $this->authorFn;
    }

    /**
     * @return string
     */
    public function getAuthorLn(): string
    {
        return $this->authorLn;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getPostdate(): string
    {
        return $this->postdate;
    }

    public function savePost(): void
    {
        Poster::save($this);
    }

}