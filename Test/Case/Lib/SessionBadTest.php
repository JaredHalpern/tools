<?php

App::uses('CakeSession', 'Model/Datasource');

/**
 * This does not work. CakeSession::delete() doesn't work relyably anymore.
 */
class SessionBadTest extends CakeTestCase {

	public $fixtures = array('core.cake_session');

	public function setUp() {
		parent::setUp();

		// Used to work in CakePHP <= 2.4
		CakeSession::delete('Auth');
	}

	/**
	 * @return void
	 */
	public function testAccess() {
		$result = CakeSession::read('Auth');
		$this->assertNull($result);

		CakeSession::write('Auth', 'something');

		$result = CakeSession::read('Auth');
		$this->assertNotNull($result);
	}

	/**
	 * @return void
	 */
	public function testAccessAgain() {
		$result = CakeSession::read('Auth');
		$this->assertNull($result);

		CakeSession::write('Auth', 'something');

		$result = CakeSession::read('Auth');
		$this->assertNotNull($result);
	}

}
