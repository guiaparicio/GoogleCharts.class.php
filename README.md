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
    
        include('Classes/autoload.php');
        
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
## Example LineChart

```
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>LineChart Example</title>

    <?php

        include('Classes/autoload.php');
    
        $GoogleCharts = new GoogleCharts('LineChart');
    
        $data = array(
            'cols' => array(
                array('id' => '', 'label' => 'Year', 'type' => 'string'),
                array('id' => '', 'label' => 'Net income', 'type' => 'number'),
                array('id' => '', 'label' => 'Revenue', 'type' => 'number')
            ),
            'rows' => array(
                array('c' => array(array('v' => '1990'), array('v' => 150), array('v' => 100))),
                array('c' => array(array('v' => '1995'), array('v' => 300), array('v' => 50))),
                array('c' => array(array('v' => '2000'), array('v' => 180), array('v' => 200))),
                array('c' => array(array('v' => '2005'), array('v' => 400), array('v' => 100))),
                array('c' => array(array('v' => '2010'), array('v' => 300), array('v' => 600))),
                array('c' => array(array('v' => '2015'), array('v' => 350), array('v' => 400)))
            )
        );
        
        $GoogleCharts->load(json_encode($data));
    
        $options = array('title' => 'revenue', 'theme' => 'maximized', 'width' => 500, 'height' => 200);
        echo $GoogleCharts->draw('line', $options);

    ?>

</head>
<body>
    <div id="line"></div>
</body>
</html>
```
