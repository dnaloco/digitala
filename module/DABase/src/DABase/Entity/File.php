<?php
namespace DABase\Entity;

use DACore\IEntities\Base\FileInterface;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Arquivo
 *
 * @ORM\Table(name="dabase_files")
 * @ORM\Entity
 */
class File implements FileInterface
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
     * @ORM\Column(name="author", type="string", length=100, nullable=true)
     */
	protected $author;

	/**
     *
     * @ORM\Column(name="licence", type="enum_licence")
     */
	protected $licence;

	/**
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
	protected $description;

	/**
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
	protected $name;

	/**
     *
     * @ORM\Column(name="path", type="string", nullable=false)
     */
	protected $path;

	/**
     *
     * @ORM\Column(name="filetype", type="string", length=10, nullable=true)
     */
	protected $filetype;

	/**
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
	protected $createdAt;

	public function __construct(array $data)
	{
		$this->createdAt = new \DateTime("now");
		(new Hydrator\ClassMethods)->hydrate($data, $this);
	}

}