<?php

class AutoLoader
{
    public function load()
    {
        spl_autoload_register(function ($class_name) {

            $iterator = new DirectoryIterator("./");

            $dirs = [""];

            while($iterator->valid())

            {
                if($iterator->isDir() && !$iterator->isDot())

                {
                    $dirs[] = $iterator->getFilename();
                }

                $iterator->next();
            }

            foreach($dirs as $dir)
            {
                if(file_exists("./" . $dir . "/" . $class_name . ".php"))
                {
                    include_once "./" . $dir . "/" . $class_name . ".php";
                }
            }
        });
    }

}