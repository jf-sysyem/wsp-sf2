<?php

namespace WSP\AdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WSPAdminBundle extends Bundle {

    public function getParent() {
        return 'MetronicAdminBundle';
    }

}
