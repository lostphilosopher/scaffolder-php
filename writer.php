<?php

/*
 * Writer is a scafolding tool for Zend Framework Apps
 *
 * templates/
 * - controller.txt
 * - model.txt
 * - view.txt
 * builder.php
 * paths.json
 * writer.php
*/

include('builder.php');

class writer
{
    protected $builder;

    function __construct($fileName, $type)
    {
        $this->fileName     = $fileName;
        $this->type         = $type;
    }    

    /*
     * Make file of specifed type along will all dependencies
     *
     * @param       string
     * @param       string
     * @params      array
     * @returns     file
     */ 
    public function make () {
        $builder = new builder($this->fileName, $this->type);
        
        // Write the file
        foreach ($builder->getFilePath() as $type => $path) {
            file_put_contents($path, $builder->getTemplate($type));        
        }
        return 'Success!';
    }
}
?>
