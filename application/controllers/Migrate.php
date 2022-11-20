<?php
    defined("BASEPATH") or exit("No direct script access allowed");

    class Migrate extends CI_Controller {

        public function __construct()
            {
            parent::__construct();

            /**
             * verifica si la peticion se realizo por consola usando el comando: php index.php migrate
             */
            $this->input->is_cli_request() 
            or exit("Execute via command line: php index.php migrate");

            $this->load->library('migration');

        }
        /**
         * Funcion que ejecuta las migracions siempre y  la variable ENVIRONMENT sea diferente a production
         *
         * @return void
         * @date: [11-07-2022]
         */
        public function index() {
            if (ENVIRONMENT !== 'production') {


                if ($this->migration->current() === FALSE) {
                    show_error($this->migration->error_string());
                } else {
                    echo "success";
                }
            } else {
                echo "error";
            }
        }
    }
?>