<?php
namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitTestInt;
use model\Trait\TraitTestString;

class UserMapping extends AbstractMapping {

use TraitTestString;
use TraitTestInt;


} // end class