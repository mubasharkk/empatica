<?php
namespace App\Services\MobileApp\Dto;

use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;

final class MobileApp implements \JsonSerializable, Arrayable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var boolean
     */
    private $status;

    /**
     * @var null|User
     */
    private $createdBy;

    /**
     * @var Carbon
     */
    private $createdAt;

    /**
     * @param int $id
     * @param string $status
     * @param Carbon $createdAt
     * @param null|User $createdBy
     */
    public function __construct($id, $status, Carbon $createdAt, User $createdBy = null)
    {
        $this->id = $id;
        $this->status = $status;
        $this->createdBy = $createdBy;
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return boolean
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return User|null
     */
    public function createdBy()
    {
        return $this->createdBy;
    }

    /**
     * @return Carbon
     */
    public function createdAt()
    {
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function createdTimestamp()
    {
        return $this->createdAt()->timestamp;
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
            'status' => $this->status(),
            'created_by' => $this->createdBy(),
            'created_at' => $this->createdAt()->format('d.m.Y h:i:s')
        ];
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
