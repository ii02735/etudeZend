<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Migrations
 *
 * @ORM\Table(name="migrations")
 * @ORM\Entity
 */
class Migrations
{
    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=14, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $version;

    /**
     * @var datetime_immutable
     *
     * @ORM\Column(name="executed_at", type="datetime_immutable", nullable=false)
     */
    private $executedAt;



    /**
     * Get version.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set executedAt.
     *
     * @param datetime_immutable $executedAt
     *
     * @return Migrations
     */
    public function setExecutedAt($executedAt)
    {
        $this->executedAt = $executedAt;

        return $this;
    }

    /**
     * Get executedAt.
     *
     * @return datetime_immutable
     */
    public function getExecutedAt()
    {
        return $this->executedAt;
    }
}
