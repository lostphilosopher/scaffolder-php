<?php

class builder
{
    function __construct($fileName, $type)
    {
        $this->fileName         = $fileName;
        $this->type             = $type;
        $this->templatesDir     = 'templates/';
    } 

    /*
     * Returns boilder plate text with user provided name included
     *
     * @return string
     */
    public function getTemplate($type) {
       if (! $this->templatesDir || ! $this->fileName || ! $type) {
            return false;
       } 

        $contents = file_get_contents($this->templatesDir . $type . '.txt');
        $template = str_replace('%%NAME%%', $this->fileName, $contents);

        return $template;
    }

    /*
     * Returns the complete path to a file
     *
     * @return  string|false
     */
    public function getFilePath() {
        if (! $this->fileName || ! $this->type) {
            return false;
        }    

        $pathsJson  = file_get_contents('paths.json');
        $pathsArray = json_decode($pathsJson, true);
        
        // @todo optimize
        $return = array();
        foreach ($pathsArray as $types => $paths){
            if ($this->type == $types) {
                foreach ($paths as $type => $path) {
                    $return[$type] = $path . $this->fileName;
                }   
                return $return;
            }            
        }

        return false;
    }    
}

?>
