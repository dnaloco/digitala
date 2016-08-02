<?php
namespace DADummy\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


use DADummy\DesignPatterns\Observer\{PatternObserver, PatternSubject};
use DADummy\DesignPatterns\AbstractFactory\{OReillyBookFactory, SamsBookFactory};
use DADummy\DesignPatterns\Builder\{HTMLPageBuilder, HTMLPageDirector};
use DADummy\DesignPatterns\FactoryMethod\{OReillyFactoryMethod, SamsFactoryMethod};

class IndexController extends AbstractActionController
{
	private function testFactoryMethod($factoryMethodInstance)
	{
		$phpOne = $factoryMethodInstance->makePHPBook("us");
		$phpTwo = $factoryMethodInstance->makePHPBook("other");
		$phpThree = $factoryMethodInstance->makePHPBook("otherother");

		return compact('phpOne', 'phpTwo', 'phpThree');
	}

	private function testContreteFactory($bookFactoryInstance)
	{
		$phpBookOne = $bookFactoryInstance->makePHPBook();
		$phpBookTwo = $bookFactoryInstance->makePHPBook();
		$mysqlBook = $bookFactoryInstance->makeMySQLBook();

		return compact('phpBookOne', 'phpBookTwo', 'mysqlBook');
	}

	private static function printBooks($books) {
		echo '-------------------------------------------------------------------------<br>';
		foreach ($books as $book) {
			echo 'Author: ', $book->getAuthor(), '<br>';
			echo 'Title: ', $book->getTitle(), '<br>';
			echo '-------------------------------------------------------------------------<br>';
		}
	}
	
	public function indexAction()
	{
		/*$factoryMethodInstance = new OReillyFactoryMethod;
		$books = $this->testFactoryMethod($factoryMethodInstance);
		echo '-------------------------------------------------------------------------<br>';
		foreach ($books as $book) {
			echo $book;
			echo '-------------------------------------------------------------------------<br>';
		}

		$factoryMethodInstance = new SamsFactoryMethod;
		$books = $this->testFactoryMethod($factoryMethodInstance);
		echo '-------------------------------------------------------------------------<br>';
		foreach ($books as $book) {
			echo $book;
			echo '-------------------------------------------------------------------------<br>';
		}*/

		/*$pageBuilder = new HTMLPageBuilder();
		$pageDirector = new HTMLPageDirector($pageBuilder);
		$pageDirector->buildPage();
		$page = $pageDirector->getPage();
		echo 	$page->showPage();*/

		/*$bookFactoryInstance = new OReillyBookFactory();
		$books = $this->testContreteFactory($bookFactoryInstance);
		self::printBooks($books);

		$bookFactoryInstance = new SamsBookFactory();
		$books = $this->testContreteFactory($bookFactoryInstance);
		self::printBooks($books);*/
		
		//die('<br><br>Design Patterns');

		/*$hooks = new \DADummy\Hooks();

		$hooks->add('event', function () { echo 'morally disputed.'; });
		$hooks->add('event', function () { echo 'explicitly called.'; });
		$hooks->fire('event');*/
		/*$patternGossiper = new PatternSubject();
		$patternGossipFan = new PatternObserver();
		$patternGossiper->attach($patternGossipFan);

		$patternGossiper->updateFavorites('abstract factory, decorator, visitor');
		$patternGossiper->updateFavorites('abstract factory, observer, decorator');
		$patternGossiper->updateFavorites('builder, memmento, observer, proxy');
		$patternGossiper->detach($patternGossipFan);
		$patternGossiper->updateFavorites('abstract factory, observer, paisley');*/
		/*$layoutType = getenv("APPLICATION_ENV") ?? '';

		$viewModel = new ViewModel();
		$viewModel->setTemplate('layout/blog01' . $layoutType);*/

		return new ViewModel();
	}
}