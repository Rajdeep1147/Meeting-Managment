<?php
namespace App\Service; 

class TestService implements TestInterface
{
    public function doSomething()
    {
        echo "This is Test Provider";
    }
}
?>