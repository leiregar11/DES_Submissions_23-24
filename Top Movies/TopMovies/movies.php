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
        public function printTable(){
            // echo "public function __toString(){";
            return "<td> ".($this->name)."</td> <td> ".($this->isan)."</td><td> ".($this->year)."</td><td> ".($this->punctuation)."</td>";
        }
        public function __toString(){
            return ($this->name)."&&".($this->isan)."&&".($this->year)."&&".($this->punctuation);
        }
    
    }
    class TopMovies{
        private $films=[];
        public function __construct($movies=""){
            if($movies != ""){
                $moviesStr=explode("||",$movies);
                foreach($moviesStr as $movie){
                    $movieInfo=explode("&&", $movie);
                    $nM= new Movie ($movieInfo[0],$movieInfo[1],$movieInfo[2],$movieInfo[3]);
                    $this->films[$movieInfo[1]]=$nm;
                }
            }
        }
        ////////////////////////////////////////////////////////////////

        public function manager($film) {
            // echo "public function manager(film) {";
            $isan = $film->getIsan();
            if (strlen($isan) == 8) {
                // echo $isan;
                if (!array_key_exists($isan, $this->films)) {
                    $this->addFilm($film, $isan);
                } else {
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
            $ISAN=$film->getIsan();
            if($film->getName()!="" || $film->getYear()!="" || $film->getPunctuation()!=""){
                $this->films[$ISAN][]=$film;
            }else{
                unset($this->films[$ISAN]);
            }
        }
        public function printFilms($name){
            foreach ($this->films as $film ) {
                if (strcasecmp($name, $film->getName()) === 0) {
                    // echo $film->__toString();
                } else {
                    echo "La palabra '$palabraBuscada' no está en el string.";
                }
            }
        }

        public function getFilms(){
            $str = "";
            if (!empty($this->films)) {
                $keys = array_keys($this->films);
                $lastKey = end($keys);
                // echo "antes del for $str";
                foreach ($this->films as $key => $movie) {
                // echo "antes la cadena $str";
                // $str .= $movie->__toString();
                $str .= "hola";
                $str += "hola2";
                // // echo "despes la cadena $str";
                if ($key !== $lastKey) {
                // // echo "en el if $str";

                        // $str .= "||";
                        $str .= "||";
                    }
                }
                // echo "despues del for $str";
            }
            return $str;
        }
        
}
