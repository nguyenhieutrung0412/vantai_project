<?php
// Instantiate, passing the array of names and the directory you want copied
///$c = new CopyDirectory(['London', 'New-York', 'Seattle'], 'location/of/your/directory/');
// Call copy() to copy the directory
//$c->copy();

class CopyDirectory
{
    private $imageNames; // array
    private $directory; // string

    /**
     * Constructor sets the imageNames and the directory to duplicate
     * @param array
     * @param string
     */
    public function __construct($imageNames, $directory)
    {
        $this->imageNames = $imageNames;
        $this->directory = $directory;
    }

    /**
     * Method to copy all files within a directory
     */
    public function copy()
    {   
        // Iterate over your imageNames
        foreach ($this->imageNames as $name) {
            // Locate all the files in a directory (array_slice is removing the trailing ..)
            foreach (array_slice(scandir($this->directory),2) as $file) {
                // Generates array of path information
                $pathInfo = pathinfo($this->directory . $file);

                // Copy the file, renaming with $name appended
                copy($this->directory . $file, $this->directory . $pathInfo['filename'] . '-' . $name .'.'. $pathInfo['extension']);
            }
        }       
    }
}