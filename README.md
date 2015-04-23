# GoogleCharts.class.php
Simple class to generate graphics with the Google Chart API.

## Charts types

* AreaChart
* BarChart
* BubbleChart
* CandlestickChart
* ColumnChart
* ComboChart
* Gauge
* GeoChart
* LineChart
* PieChart
* ScatterChart
* SteppedAreaChart
* Table
* TreeMap

## Example PieChart

```
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PieChart Example</title>

    <?php
    
        include('GoogleCharts.class.php');
        
        $GoogleCharts = new GoogleCharts('PieChart');
    
        $data = array(
            array('mushrooms', 'slices'),
            array('Item1', 2),
            array('Item2', 1),
            array('Item3', 4)
        );
        
        $GoogleCharts->load($data, 'array');
    
        $options = array('title' => 'This is the graph title', 'is3D' => true, 'width' => 500, 'height' => 400);
        echo $GoogleCharts->draw('pie', $options);
        
    ?>

</head>
<body>
    <div id="pie"></div>
</body>
</html>
```
[DEMO](https://guilhermeaparicio.com.br/github/GoogleCharts.class.php/PieChart.php)

## Example LineChart

```
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>LineChart Example</title>

    <?php

        include('GoogleCharts.class.php');
    
        $GoogleCharts = new GoogleCharts('LineChart');
    
        $data = array(
            'cols' => array(
                array('id' => '', 'label' => 'Year', 'type' => 'string'),
                array('id' => '', 'label' => 'item1', 'type' => 'number'),
                array('id' => '', 'label' => 'item2', 'type' => 'number')
            ),
            'rows' => array(
                array('c' => array(array('v' => '2010'), array('v' => 80), array('v' => 100))),
                array('c' => array(array('v' => '2011'), array('v' => 40), array('v' => 50))),
                array('c' => array(array('v' => '2012'), array('v' => 60), array('v' => 200))),
                array('c' => array(array('v' => '2013'), array('v' => 102), array('v' => 100))),
                array('c' => array(array('v' => '2014'), array('v' => 400), array('v' => 600))),
                array('c' => array(array('v' => '2015'), array('v' => 300), array('v' => 400)))
            )
        );
        
        $GoogleCharts->load(json_encode($data));
    
        $options = array('title' => 'This is the graph title', 'theme' => 'maximized', 'width' => 500, 'height' => 200);
        echo $GoogleCharts->draw('line', $options);

    ?>

</head>
<body>
    <div id="line"></div>
</body>
</html>
```
[DEMO](https://guilhermeaparicio.com.br/github/GoogleCharts.class.php/LineChart.php)
