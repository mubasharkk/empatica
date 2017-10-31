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
     * @var string
     */
    private $appId;

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
     * @param string $appId
     * @param Carbon $createdAt
     * @param null|User $createdBy
     */
    public function __construct($id, $appId, Carbon $createdAt, User $createdBy = null)
    {
        $this->id = $id;
        $this->appId = $appId;
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
     * @return string
     */
    public function appId()
    {
        return $this->appId;
    }

    /**
     * @return User|null
     */
    public function createdBy()
    {
        return $this->createdBy;
    }

    /**
     * @param string $format
     * @return Carbon
     */
    public function createdAt($format = 'd.m.Y h:i:s')
    {
        return $this->createdAt->format($format);
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
            'app_id' => $this->appId(),
            'created_by' => $this->createdBy(),
            'created_at' => $this->createdAt()
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
