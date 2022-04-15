<?
require_once 'Animals/Animal.php';
require_once 'Resources/IResource.php';

class Farm {
    private $animals;
    private $resources;

    public function __construct()
    {
       $this->animals = array();
       $this->resources = array();
    }

    // public function getCountAndTypeAnimals() {
    //     $countAndTypes = [];
    //     foreach ($this->animals as $anim) {
    //         if(isset($countAndTypes[get_class($anim)])) {
    //             $countAndTypes[get_class($anim)]++;
    //         } else {
    //             $countAndTypes[get_class($anim)] = 1;
    //         }
    //     }

    //     return $countAndTypes;
    // }

    public function getCountAndTypeAnimals() {
        $countAndTypes = [];
        foreach ($this->animals as $anim) {
            if(isset($countAndTypes[$anim->__toString()])) {
                $countAndTypes[$anim->__toString()]++;
            } else {
                $countAndTypes[$anim->__toString()] = 1;
            }
        }

        return $countAndTypes;
    }

    public function getCountAndTypeResources() {
        $countAndTypes = [];
        foreach($this->animals as $anim) {
            $resourceArray = $anim->getResource();
            foreach ($resourceArray as $r) {
                if(isset($countAndTypes[$r->__toString()])) {
                    $countAndTypes[$r->__toString()]++;
                } else {
                    $countAndTypes[$r->__toString()] = 1;
                }
            }
        }
        $this->addGeneralResource($countAndTypes);
        return $countAndTypes;
    }

    public function getAtWeek() {
        $resourcesAtWeek = array();
        for ($i = 0; $i < 7; $i++) {
            foreach ($this->getCountAndTypeResources() as $key => $value) {
                if(!isset($resourcesAtWeek[$key])) 
                {
                    $resourcesAtWeek[$key] = 0;
                }
                $resourcesAtWeek[$key] += $value;
            }
        }
        return $resourcesAtWeek;
    }

    public function addAnimal(Animal $a) 
    {
        array_push($this->animals, $a);
    }

    private function addGeneralResource($r) {
        foreach ($r as $key => $value) {
            if(!isset($this->resources[$key])) {
                $this->resources[$key] = 0;
            }
            $this->resources[$key] += $value;
        }
    }

    public function getGeneralResources() {
        return $this->resources;
    }

    public function addAnimalAtCount(String $a, $c) {
        for($i = 0; $i < $c; $i++) {
            $this->addAnimal(new $a);
        }
    }
}
