<?php
namespace App\Entity;

class Project
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $startedAt;

    /**
 * @var \DateTime
 */
    private $fineshedAt;

    /**
     * @var string
     */
    private $image;

    /**
     * @var string[]
     */
    private $languages;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Project
     */
    public function setId(int $id): Project
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Project
     */
    public function setName(string $name): Project
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Project
     */
    public function setDescription(string $description): Project
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartedAt(): \DateTime
    {
        return $this->startedAt;
    }

    /**
     * @param \DateTime $startedAt
     * @return Project
     */
    public function setStartedAt(\DateTime $startedAt): Project
    {
        $this->startedAt = $startedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFineshedAt(): \DateTime
    {
        return $this->fineshedAt;
    }

    /**
     * @param \DateTime $fineshedAt
     * @return Project
     */
    public function setFineshedAt(\DateTime $fineshedAt): Project
    {
        $this->fineshedAt = $fineshedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Project
     */
    public function setImage(string $image): Project
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getLanguages(): array
    {
        return $this->languages;
    }

    /**
     * @param string[] $languages
     * @return Project
     */
    public function setLanguages(array $languages): Project
    {
        $this->languages = $languages;
        return $this;
    }
}