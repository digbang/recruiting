<?php
namespace Digbang;

class FileOrLink
{
    private $path;

    /**
     * FileOrLink constructor.
     *
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function isFile()
    {
        return file_exists($this->path);
    }

    public function isLink()
    {
        return filter_var($this->path, FILTER_VALIDATE_URL) !== false;
    }
}
