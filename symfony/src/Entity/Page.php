<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=PageRepository::class)
 */
class Page
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $question1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $question2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $question3;

	/**
	 * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
	 * @ORM\GeneratedValue
	 *
	 * @var string A "Y-m-d H:i:s" formatted value
	 */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getQuestion1(): ?string
    {
        return $this->question1;
    }

    public function setQuestion1(string $question1): self
    {
        $this->question1 = $question1;

        return $this;
    }

    public function getQuestion2(): ?string
    {
        return $this->question2;
    }

    public function setQuestion2(string $question2): self
    {
        $this->question2 = $question2;

        return $this;
    }

    public function getQuestion3(): ?string
    {
        return $this->question3;
    }

    public function setQuestion3(string $question3): self
    {
        $this->question3 = $question3;

        return $this;
    }

	public function getCreatedAt(): ?string
	{
		return $this->createdAt->format('Y-m-d H:i:s');
	}

	public function setCreatedAt($createdAt): self
	{
		$this->createdAt = $createdAt;

		return $this;
	}
}
