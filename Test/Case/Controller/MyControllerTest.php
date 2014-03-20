<?php

App::uses('MyController', 'Tools.Controller');

class MyControllerTest extends ControllerTestCase {

	public $MyController;

	public $fixtures = array('core.comment');

	public function setUp() {
		parent::setUp();

		$this->MyController = new MyController(new CakeRequest, new CakeResponse);
	}

	public function testObject() {
		$this->assertTrue(is_object($this->MyController));
		$this->assertInstanceOf('MyController', $this->MyController);
	}

	public function testDisableCache() {
		$this->MyController->disableCache();
		$result = $this->MyController->response->header();
		$expected = array('Pragma', 'Expires', 'Last-Modified', 'Cache-Control');
		$this->assertEquals($expected, array_keys($result));
	}

	public function testPaginate() {
		$this->MyPaginationTestController = new MyPaginationTestController(new CakeRequest, new CakeResponse);
		$this->MyPaginationTestController->constructClasses();
		$result = $this->MyPaginationTestController->paginate();
		$this->assertNotEmpty($result);
	}

}

class MyPaginationTestController extends MyController {

	public $uses = array('Comment');

}
