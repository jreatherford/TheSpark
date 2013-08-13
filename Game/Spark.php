<?php
/*******************************************************************************
 * THE SPARK
 * James Reatherford (2013)
 * ----------------------------------------------------------------------------
 * The spark is a PHP script that searches the gatherer for planechase cards
 * and stores a link to their image/page to a file.  It then comes with a
 * function that displays a random card.
 ******************************************************************************/

class Spark {

    //This represents the pattern for the search page url
    const url_pattern = "http://gatherer.wizards.com/Pages/Search/Default.aspx?output=spoiler&method=visual&type=+%40(+%5bPlane%5d)&special=true";
    
    //direct url replacements for links
    const img_header = "http://gatherer.wizards.com/";
    const url_header = "http://gatherer.wizards.com/pages/";
    
    //this is where the cards are stored
    const library = "library.dat";
    
    public static function Scour()
    {
       
        //get all the info from the search page
        $page_html = file_get_contents(self::url_pattern);
        
        /*
         * This is the part of the code where it gets a little hackish
         * Basically, we have all the info we need, but we need to modify it
         * before it will be usefull...
         */
        
        //change the relative links to direct links
        $page_html = str_replace("../../",self::img_header,$page_html);
        $page_html = str_replace("../",self::url_header,$page_html);
        
        //Ensure all images are the same size
        $page_html = str_replace(' alt=', ' class="card-img" alt=', $page_html);
        
        //Make the links to the gather page open in a new tab/window
        $page_html = str_replace('href=', 'target="_blank" href=', $page_html);
        
        /*
         * Ok, now that the information is edited, we can fetch it
         */
        
        //mine the info from the cards and store it in an array
        preg_match_all("#<a\sid.+\/></a>#",$page_html,$cards);
        $cards = $cards[0]; //preg_match_all puts the data in a multidimensional
                            //array.  I am just getting the needed data

        //now, store away the information
        file_put_contents (self::library,serialize($cards));
    }
    
    public static function Draw ()
    {
        //if there is no library, create one
        // if (file_exists(self::library) == false)
            Spark::Scour();
        
        $cards = unserialize(file_get_contents(self::library));
        
        return $cards[array_rand($cards)];
    }
    
}
?>

