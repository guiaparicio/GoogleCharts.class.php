<?php

    /*
        CLASSE:         GoogleCharts
        FUNCAO:         O componente GoogleCharts foi desenvolvido para dinamizar o processo de utilização da API do gerador de gráficos do Google.
        PROGRAMADA POR: Guilherme Pacheco Aparício - Email: guiaparicio@gmail.com
        CRIADA EM:      17/04/2015
        VERSAO:         1.0.0
        DOCUMENTACAO:   http://172.16.1.9/wikihcb/index.php/GoogleCharts
    */

    class GoogleCharts {

        #### ATTRIBUTES ####

            private static $first = true;
            private static $count = 0;
            private $chartType;
            private $data;
            private $dataType;
            private $skipFirstRow;

        #### CONSTRUCTOR ####

            public function __construct($chartType, $skipFirstRow = false){
                $this->chartType    = $chartType;
                $this->skipFirstRow = $skipFirstRow;
                self::$count++;
            }

        #### LOADS THE DATASET AND CONVERTS IT TO THE CORRECT FORMAT ####

            public function load($data, $dataType = 'json'){
                $this->data = ($dataType != 'json') ? $this->dataToJson($data) : $data;
            }

        #### LOAD JSAPI ####

            private function initChart(){

                self::$first = false;
                $output = '';
                $output .= '<script type="text/javascript" src="https://www.google.com/jsapi"></script>'."\n";
                $output .= '<script type="text/javascript">google.load(\'visualization\', \'1.0\', {\'packages\':[\'corechart\']});</script>'."\n";

                return $output;
            }

        #### DRAWS THE CHART ####

            public function draw($div, Array $options = array()){

                $output = '';

                if(self::$first)$output .= $this->initChart();

                // START A CODE BLOCK
                $output .= '<script type="text/javascript">';

                // SET CALLBACK FUNCTION
                $output .= 'google.setOnLoadCallback(drawChart' . self::$count . ');';

                // CREATE CALLBACK FUNCTION
                $output .= 'function drawChart' . self::$count . '(){';

                $output .= 'var data = new google.visualization.DataTable(' . $this->data . ');';

                // SET THE OPTIONS
                $output .= 'var options = ' . json_encode($options) . ';';

                // CREATE AND DRAW THE CHART
                $output .= 'var chart = new google.visualization.' . $this->chartType . '(document.getElementById(\'' . $div . '\'));';
                $output .= 'chart.draw(data, options);';
                $output .= '} </script>' . "\n";

                return $output;
            }

        #### SUBSTRACTS THE COLUMN NAMES FROM THE FIRST AND SECOND ROW IN THE DATASET ####

            private function getColumns($data){

                $cols = array();

                foreach($data[0] as $key => $value){

                    if(is_numeric($key)){

                        if(is_string($data[1][$key])){
                            $cols[] = array('id' => '', 'label' => $value, 'type' => 'string');
                        } else {
                            $cols[] = array('id' => '', 'label' => $value, 'type' => 'number');
                        }

                        $this->skipFirstRow = true;

                    } else {

                        if(is_string($value)){
                            $cols[] = array('id' => '', 'label' => $key, 'type' => 'string');
                        } else {
                            $cols[] = array('id' => '', 'label' => $key, 'type' => 'number');
                        }
                    }
                }

                return $cols;
            }

        #### CONVERT ARRAY DATA TO JSON ####

            private function dataToJson($data){

                $cols = $this->getColumns($data);
                $rows = array();

                foreach($data as $key => $row){

                    if($key != 0 || !$this->skipFirstRow){

                        $c = array();

                        foreach($row as $v){
                            $c[] = array('v' => $v);
                        }

                        $rows[] = array('c' => $c);
                    }
                }

                return json_encode(array('cols' => $cols, 'rows' => $rows));
            }
    }