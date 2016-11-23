<?php

/**
 * Created by PhpStorm.
 * User: Ludwig
 * Date: 23.11.2016
 * Time: 14:30
 */
class JsonParser
{
    //Holds the name of the file. For ex. string "foo.json"
    private $fileName;
    //Holds the path to the json file. For ex. string "foo/json/"
    private $path;
    //Holds the json file itself as an object.
    protected $json;

    /**
     * JsonParser constructor.
     * initializes every data field. Required for every other method. Don't use the magic php constructor!
     * @param $fileName
     * @param $path
     * @throws Exception
     */
    public function __construct($fileName, $path)
    {
        $this->fileName = $fileName;
        $this->path = $path;

        try{
            $this->loadJsonObject();
        }
        catch(Exception $e){
            //non of our business -.-
            throw $e;
        }
    }

    //load the json Object from the directory and save it in the json data field
    private function loadJsonObject(){
        //set the full directory to the file. For ex. string "foo/json/bar.json"
        $fullDir = $this->path . $this->fileName;

        //check if file exists
        if(file_exists($fullDir))
        {
            //save json object in json variable
            $this->json = json_decode(file_get_contents($fullDir));
        }
        else{
            throw new Exception('Datei existiert nicht. Es wurde hier gesucht: ' . $fullDir);
        }
    }

    /**
     * Get the json object
     * @return json-object
     * @throws Exception
     */
    public function getJson(){
        if(isset($this->json)){
            return $this->json;
        }
        else{
            throw new Exception('Sie haben kein Json File zugewiesen.');
        }
    }
}