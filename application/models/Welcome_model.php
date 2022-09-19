<?Php

    class Welcome_model extends CI_model {
        public function get_logo(){
            
                return NULL;
            }

            public function __destruct(){
                $this->db->close();
            }

    }
?>