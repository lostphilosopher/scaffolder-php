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
    public function getTemplate() {
       // if (! $this->type || ! file_exists($this->templatesDir . $this->type)) {
       //     return false;
       // } 

        $contents = file_get_contents($this->templatesDir . $this->type . '.txt');
echo $contents;
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
        $pathsArray = json_decode($pathsJson);
        // @todo optimize
        foreach ($pathsArray as $type => $path){
            if ($this->type == $type) {
                return $path . $this->fileName;
            }               
        }

        return false;
    }    
}

?>
