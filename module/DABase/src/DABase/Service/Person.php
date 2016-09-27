<?php 
namespace DABase\Service;

use DACore\Service\AbstractCrudService;

use DACore\Upload\MyUploadAwareInterface;
use DACore\Strategy\{DataCheckerStrategyInterface, DataCheckerStrategy};
use DACore\Strategy\Collections\{
    AddressesInterface,AddressesStrategy,
    DocumentsInterface,DocumentsStrategy,
    EmailsInterface,EmailsStrategy,
    SocialNetworksInterface,SocialNetworksStrategy,
    TelephonesInterface,TelephonesStrategy
};

class Person extends AbstractCrudService
{
	use DataCheckerStrategy;

    use AddressesStrategy;
    use DocumentsStrategy;
    use EmailsStrategy;
    use SocialNetworksStrategy;
    use TelephonesStrategy;

	protected $uploadManager;

	public function setUploadManager(\DACore\Upload\MyAbstractUpload $uploadManager)
	{
		$this->uploadManager = $uploadManager;
	}

	public function getUploadManager()
	{
		return $this->uploadManager;
	}

	public function prepareDataToInsert(array $data)
    {
    	return $data;
    }

	public function prepareDataToUpdate(array $data)
	{
		$data = array_filter($data);

		$entity = null;
		if (isset($data['id'])) {
			$entity = $this->getRepository()->find($data['id']);

		}

		// limpar valores nulos e vazios
		$data = array_filter($data);

		// isso aqui não vai para o update obviamente
		if (isset($data['createdAt'])) unset($data['createdAt']);
		if (isset($data['updatedAt'])) unset($data['updatedAt']);

		$key = 'person';

		if (!isset($data['name'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'name');
		} else {
			$data['name'] = static::checkNameWithSpecials($key, $data['name']);
		}

		if (isset($data['gender'])) {
			$data['gender'] = static::checkType($key, 'DACore\Enum\GenderType', $data['gender']);
		}

		// birthdate
		if (isset($data['birthdate'])) {
			$mindate = new \DateTime();
			$mindate->modify('-150 year');

			$maxdate = new \DateTime();
			$maxdate->modify('-12 year');
			$data['birthdate'] = static::checkDateBetween($key, $data['birthdate'], 'birthdate', $mindate, $maxdate);
		}

		if (isset($data['description'])) {
			$data['description'] = static::checkString($key, $data['description'], 'description');
		}

		if (isset($data['photo']) && isset($data['photo']['uploaded']) && isset($data['name'])) {

			$imgData = [
				'title' => 'Foto de ' . $data['name'],
				'author' => 'Foto do proprietário da conta',
				'licence' => static::checkType($key, 'DACore\Enum\Licence', 'Attribution-NonCommercial-NoDerivs'),
				'description' => 'Imagem de foto do usuário fornecida pelo próprio.',
				'name' => $data['name'],
				'path' => './build/uploads/person/photos/',
			];

			$data['photo'] = $this->getUploadManager()->getPhoto($key, $data['photo']['uploaded'], $imgData);
		}

		if (isset($data['emails'])) {

			$repoEmail = $this->getAnotherRepository('\DABase\Entity\Email');
			$data['emails'] = static::getEmailsCollection($key, $data['emails'], $repoEmail);

		}

		if (isset($data['addresses'])) {
			$data['addresses'] = static::getAddressesCollection($key, $data['addresses']);
		}

		if (isset($data['telephones'])) {
			$repoTelephones = $this->getAnotherRepository('\DABase\Entity\Email');
			$data['telephones'] = static::getTelephonesCollection($key, $data['telephones'], $entity);
		}

		if (isset($data['socialNetworks'])) {
			$repoSocial = $this->getAnotherRepository('DABase\Entity\SocialNetwork');
			$data['socialNetworks'] = static::getSocialNetworksCollection($key, $data['socialNetworks'], $repoSocial);
		}

		if (isset($data['documents'])) {
			$data['documents'] = static::getDocumentsCollection($key, $data['documents']);
		}

		$data = array_filter($data);

		return $data;
	}
}