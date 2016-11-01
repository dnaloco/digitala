<?php
namespace DAErp\Service\Product;

use DACore\Service\AbstractCrudService;
use Doctrine\Common\Collections\ArrayCollection;
use DACore\Upload\MyUploadAwareInterface;

use DACore\Strategy\Core\{DataCheckerStrategyInterface, DataCheckerStrategy};
use DACore\Strategy\Collections\Erp\Product\{
	FeaturesInterface,FeaturesStrategy,
	ProductsInterface,ProductsStrategy,
	ProductRatingsInterface,ProductRatingsStrategy,
	ProductReferenceInterface, ProductReferenceStrategy
};

use DACore\Strategy\Collections\Base\{
    ImagesInterface,ImagesStrategy,
    VideosInterface,VideosStrategy
};

class Product extends AbstractCrudService
implements
MyUploadAwareInterface,

DataCheckerStrategyInterface,

FeaturesInterface,
ImagesInterface,
VideosInterface,
ProductsInterface,
ProductRatingsInterface,
ProductReferenceInterface
{
	use DataCheckerStrategy;

	use FeaturesStrategy;
	use ImagesStrategy;
	use VideosStrategy;
	use ProductsStrategy;
	use ProductRatingsStrategy;
	use ProductReferenceStrategy;

	protected $uploadManager;

	public function setUploadManager(\DACore\Upload\MyAbstractUpload $uploadManager)
	{
		$this->uploadManager = $uploadManager;
	}

	public function getUploadManager()
	{
		return $this->uploadManager;
	}

	public function insert(array $data)
	{
		$entity = parent::insert($data);

		/*$prodId = $entity->getId();
		$deptId = $entity->getDepartment() ? $entity->getDepartment()->getId() : 0;
		$categId = $entity->getCategory() ? $entity->getCategory()->getId() : 0;

		$ref = static::generateReference($deptId, $categId, $prodId);

		$entity->setReference($ref);
		$this->em->persist($entity);
		$this->em->flush();*/

		return $entity;
	}

	public function prepareData(array $data)
	{
		$productId = null;
		$entity = null;
		if (isset($data['id'])) {
			$productId = $data['id'];

			$entity = $this->em->getReference('DAErp\Entity\Product\Product', $productId);

		}

		if(isset($data['createdAt'])) unset($data['createdAt']);
		if(isset($data['updatedAt'])) unset($data['updatedAt']);

		$key = 'product';

		if (!isset($data['title'])) {
			static::addDataError($key, $data['title'], 'title');
		} else {
			$data['title'] = static::checkString($key, $data['title'], 'title');
		}

		if (isset($data['subtitle'])) {
			$data['subtitle'] = static::checkString($key, $data['subtitle'], 'subtitle');
		}

		if (isset($data['manufacturer'])) {
			if (isset($data['manufacturer']['id'])) $data['manufacturer'] = $data['manufacturer']['id'];
			$repoManuf = $this->getAnotherRepository('DACore\IEntities\Erp\Manufacturer\ManufacturerInterface');
			$data['manufacturer'] = static::checkReference($key, $data['manufacturer'], 'manufacturer', $repoManuf);
		}

		if (isset($data['seoDescription'])) {
			$data['seoDescription'] = static::checkString($key, $data['seoDescription'], 'seoDescription');
		}

		if (isset($data['description'])) {
			$data['description'] = static::checkString($key, $data['description'], 'description');
		}

		if (isset($data['briefDescription'])) {
			$data['briefDescription'] = static::checkString($key, $data['briefDescription'], 'briefDescription');
		}

		if (isset($data['department'])) {
			if (isset($data['department']['id'])) $data['department'] = $data['department']['id'];
			$repoDept = $this->getAnotherRepository('DACore\IEntities\Erp\Product\DepartmentInterface');
			$data['department'] = static::checkReference($key, $data['department'], 'department', $repoDept);
		}

		if (isset($data['category'])) {
			if (isset($data['category']['id'])) $data['category'] = $data['category']['id'];
			$repoCateg = $this->getAnotherRepository('DACore\IEntities\Erp\Product\CategoryInterface');
			$data['category'] = static::checkReference($key, $data['category'], 'category', $repoCateg);
		}

		if (isset($data['features'])) {
			if (empty($data['features'])) {
				if ($entity) $entity->getFeatures()->clear();
				unset($data['features']);
			} else {
				$data['features'] = static::getFeaturesReferences($key, $data['features'], 'features');
			}
		}

		if (isset($data['images']) && isset($data['images']['uploadeds']) && isset($data['title'])) {

			if ($entity && $entity->getImages()->count() != 0) {
				foreach($entity->getImages() as $image) {
					$this->getUploadManager()->removeImage($image);
					$this->em->remove($image);
				}

			}

			$productImages = new ArrayCollection();

			foreach($data['images']['uploadeds'] as $img) {
				$imgData = [
					'title' => 'Foto de ' . $data['title'],
					'author' => 'Foto do proprietário da conta',
					'licence' => static::checkType($key, 'DABase\Enum\Licence', 'Attribution-NonCommercial-NoDerivs'),
					'description' => 'Imagem de foto do usuário fornecida pelo próprio.',
					'name' => $data['title'],
					'path' => './build/uploads/products/images/',
				];

				$img = $this->getUploadManager()->getImage($key, $img['name'], $imgData, 'images');

				$productImages->add($img);
			}

			$preupFolder = $this->getUploadManager()->getPreUploadFolder();

			$this->getUploadManager()->clearPath($preupFolder);

			$data['images'] = $productImages;
		}

		if (isset($data['images']) && is_array($data['images']) && isset($data['images']) && !isset($data['images']['uploadeds'])) {

			if (empty($data['images']) && $entity) {

				$entity->getImages()->clear();
			} else
				$data['images'] = $entity->getImages();
		}

		if (isset($data['videos'])) {
			if (empty($data['videos'])) {
				if ($entity) $entity->getVideos()->clear();
				unset($data['videos']);
			} else {
				$data['videos'] = static::getVideosCollection($key, $data['videos'], $entity);
			}

		}

		if (isset($data['unitType'])) {
			$data['unitType'] = static::checkType($key, 'DAErp\Enum\UnitType', $data['unitType'], 'unitType');
		}

		if (isset($data['weight'])) {
			$data['weight'] = static::checkNumber($key, $data['weight'], 'weight');
		}

		if (isset($data['dimensionLength'])) {
			$data['dimensionLength'] = static::checkNumber($key, $data['dimensionLength'], 'dimensionLength');
		}

		if (isset($data['dimensionHeight'])) {
			$data['dimensionHeight'] = static::checkNumber($key, $data['dimensionHeight'], 'dimensionHeight');
		}

		if (isset($data['dimensionWidth'])) {
			$data['dimensionWidth'] = static::checkNumber($key, $data['dimensionWidth'], 'dimensionWidth');
		}
		
		if (isset($data['isHighlighted'])) {
			$data['isHighlighted'] = static::checkBoolean($key, $data['isHighlighted'], 'isHighlighted');
		}

		if (isset($data['isLaunch'])) {
			$data['isLaunch'] = static::checkBoolean($key, $data['isLaunch'], 'isLaunch');
		}

		if ($entity) {
			$prodId = $entity->getId();
			$deptId = $entity->getDepartment() ? $entity->getDepartment()->getId() : 0;
			$categId = $entity->getCategory() ? $entity->getCategory()->getId() : 0;
			$ref = static::generateReference($deptId, $categId, $prodId);

			$data['reference'] = $ref;
		}
		$data = array_filter($data);

		if (static::hasErrors()) {
			$data['errors'] = [];
			$data['errors'] = static::getErrors();
		}

		return $data;
	}
}