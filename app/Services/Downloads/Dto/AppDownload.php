<?php
namespace App\Services\Downloads\Dto;

use Illuminate\Contracts\Support\Arrayable;

final class AppDownload implements Arrayable, \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var Location
     */
    private $location;

    /**
     * @param int $id
     * @param string $type
     * @param Location $location
     */
    public function __construct($id, $type, Location $location)
    {
        $this->id = $id;
        $this->type = $type;
        $this->location = $location;
    }

    public function id()
    {
        return $this->id;
    }

    public function type()
    {
        return $this->type;
    }

    public function location()
    {
        return $this->location;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id(),
            'type' => $this->type(),
            'location' => $this->location()
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}