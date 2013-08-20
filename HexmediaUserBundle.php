<?php

namespace Hexmedia\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HexmediaUserBundle extends Bundle {

	public function getParent() {
		return "FOSUserBundle";
	}

}
