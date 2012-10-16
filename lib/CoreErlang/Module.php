<?php

namespace CoreErlang;

class Module extends GrandProgenitor implements ICompile
{
    private $atom;

    private $attributes;
    private $funs;



    public function __construct(File $file, $name)
    {
        parent::__construct($file);

        $atom = null;
        if (  $name instanceof Atom  ) {
            $atom = $name;
        } elseif (  is_string($name)  ) {
            $atom = new Atom($file, $this, $name);
        }
        Exception::throwIfEquals(null, $atom);

        $this->atom = $atom;

        $this->attributes = array();
        $this->funs       = array();
    }



//@TODO
//    public function attribute()
//    {
//        $attribute = new Attribute($this->file, $this);
//
//        $this->attributes[] = $attribute;
//
//        return $attribute;
//    }

//@TODO
//    public function fun($name, $params=array())
//    {
//        $fun = new Fun($this->file, $this, $name, $params);
//
//        $this->funs[] = $fun;
//
//        return $fun;
//    }

    public function compile($fd, $indentation_level = 0)
    {
        // module
        fwrite($fd, 'module ');
        $this->atom->compile($fd);
        fwrite($fd, ' ');


        // Funs declarations
//        fwrite($fd, '[');
//        if (  is_array($this->funs) && !empty($this->funs)  ) {
//            $first_iteration = true;
//            foreach ($this->funs AS $fun) {
//
//                $s = (  ($first_iteration)?(''):(', ')  )
//                   . '\''
//                   . $fun->getFname()
//                   . '\'/'
//                   . $fun->numVars()
//                   ;
//
//                fwrite($fd, $s);
//
//                $first_iteration = false;
//            } // foreach
//        }
//        fwrite($fd, ']'."\n");

        // attributes.
//        fwrite($fd, 'attributes [');
//        if (  is_array($this->attributes) && !empty($this->attributes)  ) {
//            $first_iteration = true;
//            foreach ($this->attributes AS $attribute) {
//
//                if (  ! $first_iteration  ) {
//                    fwrite($fd, ', ');
//                }
//
//                $attribute->compile($fd);
//
//                $first_iteration = false;
//            } // foreach
//        }
//        fwrite($fd, ']'."\n");


        // funs
//        if (  is_array($this->funs) && !empty($this->funs)  ) {
//            $first_iteration = true;
//            foreach ($this->funs AS $fun) {
//
//                $fun->compile($fd, 1);
//
//                $first_iteration = false;
//            } // foreach
//        }


        // end
        fwrite($fd, 'end'."\n");
    }
}

