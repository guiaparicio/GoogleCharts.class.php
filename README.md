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
                array('id' => '', 'label' => 'Car', 'type' => 'string'),
                array('id' => '', 'label' => 'Numbers', 'type' => 'number')
            ),
            'rows' => array(
                array('c' => array(array('v' => '2010'), array('v' => 'Bugatti Veyron'), array('v' => 100))),
                array('c' => array(array('v' => '2011'), array('v' => 'Ferrari Enzo'), array('v' => 50))),
                array('c' => array(array('v' => '2012'), array('v' => 'Camaro SS'), array('v' => 200))),
                array('c' => array(array('v' => '2013'), array('v' => 'Lamborghini Aventador'), array('v' => 100))),
                array('c' => array(array('v' => '2014'), array('v' => 'Lamborghini Veneno'), array('v' => 600))),
                array('c' => array(array('v' => '2015'), array('v' => 'Hennessey Venom GT'), array('v' => 400)))
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
