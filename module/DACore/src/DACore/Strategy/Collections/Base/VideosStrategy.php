<?php
namespace DACore\Strategy\Collections\Base;

use Doctrine\Common\Collections\ArrayCollection;

trait VideosStrategy
{

	public function getVideo($key, $video)
	{
		//$repoVideo = $this->getAnotherRepository('DACore\IEntities\Base\VideoInterface');

		if (!isset($video['title'])) {
			static::addDataError($key, static::ERROR_UNIQUE_FIELD, 'title');
			return false;
		} else {
			$video['title'] = static::checkString($key, $video['title']);
			if (!$video['title']) return false;
		}

		if (!isset($video['address'])) {
			static::addDataError($key, static::ERROR_UNIQUE_FIELD, 'address');
			return false;
		} else {
			$video['address'] = static::checkUrl($key, $video['address']);
			if (!$video['address']) return false;
		}

		if (isset($video['author'])) {
			$video['author'] = static::checkString($key, $video['author'], 'author');
			if (!$video['author']) return false;
		}

		if (isset($video['licence'])) {
			$video['licence'] = static::checkType($key, 'DABase\Enum\Licence', $video['licence'], 'licence');
			if (!$video['licence']) return false;
		}

		if (isset($video['description'])) {
			$video['description'] = static::checkString($key, $video['description'], 'description');
			if (!$video['description']) return false;
		}

		if (static::hasErrors()) return false;

		return new \DABase\Entity\Video($video);
	}

	public function getVideosCollection($key, $videos, $entity)
	{
		if (!($this instanceof \DACore\Service\AbstractCrudService))
			throw new \Exception('TO USE VideosStrategy TRAIT NEED TO BE INSTANCE OF  DACore\Service\AbstractCrudService');

		$myTraits = class_uses($this);

		if (!in_array('DACore\Strategy\Core\DataCheckerStrategy', $myTraits)) {
			throw new \Exception('TO USE VideosStrategy TRAIT NEED TO HAVE DACore\Strategy\Core\DataCheckerStrategy');
		}

		$arrVideos = new ArrayCollection();
		$key = $key . '_videos';

		if (!is_null($entity)) {
			$videosCollection = $entity->getVideos();

			foreach($videos as $video) {
				$video = $this->getVideo($key, $video);

				if (!$video) continue;

				if (is_null($video->getId())) {
					$videosCollection->add($video);
				} else {
					$video = $this->em->merge($video);
				}
				$arrVideos->add($video);

			}

			foreach($videosCollection as $video) {
				if (!$arrVideos->contains($video)) {
					$videosCollection->removeElement($video);
					$this->em->remove($video);
				}
			}

			return $videosCollection;

		}

		foreach($videos as $video) {
			$video = $this->getVideo($key, $video);

			if ($video) $arrVideos->add($video);
		}

		return $arrVideos;
	}
}