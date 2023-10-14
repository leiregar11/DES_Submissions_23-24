
<?php
    class Movie{
        private $name;
        private $isan;
        private $year;
        private $punctuation;
        
        public function __construct($name,$isan,$year,$punctuation){
            // echo "public function __construct(name,isan,year,punctuation){";
            $this->name=$name;
            $this->isan=$isan;
            $this->year=$year;
            $this->punctuation=$punctuation;
        }

        public function getName(){
            // echo "public function getName(){";
            return $this->name;
        }
        public function getIsan(){
            // echo "public function getIsan(){";
            return $this->isan;
        }
        public function getYear(){
            // echo "public function getYear(){";
            return $this->year;
        }
        public function getPunctuation(){
            // echo "public function getPunctuation(){";
            return $this->punctuation;
        }
        public function __toString(){
            return ($this->name)."&&".($this->isan)."&&".($this->year)."&&".($this->punctuation);
        }
    
    }
    class TopMovies{
        private $films=[];
        public function __construct($movies=""){
            if ($movies != "") {
                $moviesStr = explode("||", $movies);
                foreach ($moviesStr as $movie) {
                    $movieInfo = explode("&&", $movie);
                    $nM = new Movie($movieInfo[0], $movieInfo[1], $movieInfo[2], $movieInfo[3]);
                    if (!empty($movieInfo[1])) {
                        $this->films[$movieInfo[1]][] = $nM;
                    } 
                }
            }
        }
        ////////////////////////////////////////////////////////////////

        public function manager($film) {
            // echo "public function manager(film) {";
            $isan = $
            // echo "a";film->getIsan();
            if (strlen($isan) == 8) {
                // echo $isan;
                if (!array_key_exists($isan, $this->films)) {
                    $this->addFilm($film, $isan);
                } 
                else {
                    $this->updateOrDeleteFilm($film, $isan);
                }
                
            } else {
                throw new Exception("The ISAN must have 8 digits.");
            }
            
        }
        ////////////////////////////////////////////////////////////////
        public function addFilm($film){
            $ISAN=$film->getIsan();
            // echo "public function addFilm(film,ISAN){";
            if($film->getName()!="" || $film->getYear()!="" || $film->getPunctuation()!=""){
                $this->films[$ISAN][]=$film;
                // echo "this->films[ISAN][]=film;";
            }else{
                throw new Exception ("Fill out all the fields");
            }
        }
        public function updateOrDeleteFilm($film){
            $ISAN = $film->getIsan();
            unset($this->films[$ISAN]);
            if ($film->getName() != "" && $film->getYear() != "" && $film->getPunctuation() != "") {
                $this->films[$ISAN][] = $film; // Actualizar el valor de la clave ISAN
            }
        }
        public function printByName($name){
            $view = "<ul>";
                foreach ($this->films as $key =>$movies) {
                    
                    foreach ($movies as $movie ) {
                        
                        $name = preg_quote($name, '/');
                        $filtredName = '/' . $name . '/i';
                        if (preg_match($filtredName, $movie->getName())) {
                            $view .= "<li>";
                            $view .= " \"" . ($movie->getName()) . "\" from " . ($movie->getYear());
                            $view .= "</li>";
                        }
                    }
                
                }
            $view .= "</ul>";
        
            echo $view;
        }
        
        public function printMovies(){
            $view = "<ul>";
            foreach ($this->films as $key =>$movies) {
                $view .= "<li>";
                foreach ($movies as $movie ) {
                $view .= " \"" . ($movie->getName()) . "\" from " . ($movie->getYear());
            
                }
            
            
            $view .= "</li>";
        }
            $view .= "</ul>";
        
            echo $view;
        }

        public function getFilms(){

            $str = "";
            if (!empty($this->films)) {
                $keys = array_keys($this->films);
                $lastKey = end($keys);
                foreach ($this->films as $key =>$movies) {
                    foreach ($movies as $movie ) {
                    $str .= $movie->__toString();
                    }
                
                if ($key !== $lastKey) {

                        $str .= "||";
                    }
                }
            }
            return $str;
        }
        
}

?>
