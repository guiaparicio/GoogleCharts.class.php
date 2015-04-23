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

## Example

```html

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP class for Google Chart Tools</title>

    <?php

    include('Classes/autoload.php');
    
    // demonstration of pie chart and simple array
    $chart = new GoogleCharts('PieChart');

    $data = array(
        array('mushrooms', 'slices'),
        array('onions', 2),
        array('olives', 1),
        array('cheese', 4)
    );
    $chart->load($data, 'array');

    $options = array('title' => 'pizza', 'is3D' => true, 'width' => 500, 'height' => 400);
    echo $chart->draw('pizza', $options);
    
    ?>

</head>
<body>

<div id="pizza"></div>

</body>
</html>

```

