<?php
namespace DABase\Entity;

use DACore\IEntities\Base\VideoInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Video
 *
 * @ORM\Table(name="dabase_videos")
 * @ORM\Entity
 */
class Video implements VideoInterface
{
	/**
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
	protected $id;

	/**
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=true)
     */
	protected $title;

	/**
     *
     * @ORM\Column(name="address", type="string", nullable=false)
     */
	protected $address;

	/**
     *
     * @ORM\Column(name="author", type="string", length=100, nullable=true)
     */
	protected $author;

	/**
     *
     * @ORM\Column(name="licence", type="enum_licence", nullable=true)
     */
	protected $licence;

	/**
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
	protected $description;

	public function __construct(array $data)
	{
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}