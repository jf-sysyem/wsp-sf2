<?php

namespace WSP\ACLBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WSPACLBundle extends Bundle {

    public function getParent() {
        return 'JFACLBundle';
    }

}
