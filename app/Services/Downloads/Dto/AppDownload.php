<?php
namespace App\Services\Downloads\Dto;

use Carbon\Carbon;
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
     * @var Carbon
     */
    private $createdAt;

    /**
     * @var array
     */
    private $coordinates;

    /**
     * @param int $id
     * @param string $type
     * @param Location $location
     * @param Carbon $createdAt
     * @param array $coordinates
     */
    public function __construct($id, $type, Location $location, Carbon $createdAt, array $coordinates = [])
    {
        $this->id = $id;
        $this->type = $type;
        $this->location = $location;
        $this->createdAt = $createdAt;
        $this->coordinates = $coordinates;
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

    public function coordinates()
    {
        return $this->coordinates;
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
            'location' => $this->location(),
            'coordinates' => $this->coordinates(),
            'created' => $this->createdAt()
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @return Carbon
     */
    public function createdAt()
    {
        return $this->createdAt;
    }
}