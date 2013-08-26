<?php

namespace Hexmedia\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Hexmedia\UserBundle\Entity\User;

/**
 * UserAddress Entity
 *
 * @ORM\Table(name = "user_address")
 * @ORM\Entity(repositoryClass = "Hexmedia\UserBundle\Repository\Doctrine\UserRepository")
 */
class UserAddress
{

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="country", type="string", length=255)
	 */
	private $country;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="region", type="string", length=255)
	 */
	private $region;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="city", type="string", length=255)
	 */
	private $city;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="street", type="string", length=255)
	 */
	private $street;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="house", type="string", length=255)
	 */
	private $house;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="local", type="string", length=255)
	 */
	private $local;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="created", type="datetime")
	 *
	 */
	private $created;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="modified", type="datetime")
	 */
	private $modified;

	/**
	 * @var User
	 *
	 * @ORM\ManyToOne(targetEntity="Hexmedia\UserBundle\Entity\User")
	 */
	private $user;

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 * @return UserAddress
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set country
	 *
	 * @param string $country
	 * @return UserAddress
	 */
	public function setCountry($country)
	{
		$this->country = $country;

		return $this;
	}

	/**
	 * Get country
	 *
	 * @return string
	 */
	public function getCountry()
	{
		return $this->country;
	}

	/**
	 * Set region
	 *
	 * @param string $region
	 * @return UserAddress
	 */
	public function setRegion($region)
	{
		$this->region = $region;

		return $this;
	}

	/**
	 * Get region
	 *
	 * @return string
	 */
	public function getRegion()
	{
		return $this->region;
	}

	/**
	 * Set city
	 *
	 * @param string $city
	 * @return UserAddress
	 */
	public function setCity($city)
	{
		$this->city = $city;

		return $this;
	}

	/**
	 * Get city
	 *
	 * @return string
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * Set street
	 *
	 * @param string $street
	 * @return UserAddress
	 */
	public function setStreet($street)
	{
		$this->street = $street;

		return $this;
	}

	/**
	 * Get street
	 *
	 * @return string
	 */
	public function getStreet()
	{
		return $this->street;
	}

	/**
	 * Set house
	 *
	 * @param string $house
	 * @return UserAddress
	 */
	public function setHouse($house)
	{
		$this->house = $house;

		return $this;
	}

	/**
	 * Get house
	 *
	 * @return string
	 */
	public function getHouse()
	{
		return $this->house;
	}

	/**
	 * Set local
	 *
	 * @param string $local
	 * @return UserAddress
	 */
	public function setLocal($local)
	{
		$this->local = $local;

		return $this;
	}

	/**
	 * Get local
	 *
	 * @return string
	 */
	public function getLocal()
	{
		return $this->local;
	}

	/**
	 * Set created
	 *
	 * @param \DateTime $created
	 * @return UserBillingData
	 */
	public function setCreated($created)
	{
		$this->created = $created;

		return $this;
	}

	/**
	 * Get created
	 *
	 * @return \DateTime
	 */
	public function getCreated()
	{
		return $this->created;
	}

	/**
	 * Set modified
	 *
	 * @param \DateTime $modified
	 * @return UserBillingData
	 */
	public function setModified($modified)
	{
		$this->modified = $modified;

		return $this;
	}

	/**
	 * Get modified
	 *
	 * @return \DateTime
	 */
	public function getModified()
	{
		return $this->modified;
	}

	/**
	 * Set user
	 *
	 * @param User $user
	 * @return UserAddress
	 */
	public function setUser(User $user)
	{
		$this->user = $user;

		return $this;
	}

	/**
	 * Get user
	 *
	 * @return User
	 */
	public function getUser()
	{
		return $this->user;
	}

	/**
	 * Set locale for translations
	 *
	 * @param string $locale
	 * @return Product
	 */
	public function setTranslatableLocale($locale)
	{
		$this->locale = $locale;
		return $this;
	}

}

