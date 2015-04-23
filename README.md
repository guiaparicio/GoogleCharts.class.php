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

```
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>GoogleCharts.class.php Example</title>

    <?php
    
        include('Classes/autoload.php');
        
        // PIE EXAMPLE
        GoogleCharts = new GoogleCharts('PieChart');
    
        $data = array(
            array('mushrooms', 'slices'),
            array('Item1', 2),
            array('Item2', 1),
            array('Item3', 4)
        );
        
        GoogleCharts->load($data, 'array');
    
        $options = array('title' => 'This is the graph title', 'is3D' => true, 'width' => 500, 'height' => 400);
        echo GoogleCharts->draw('graph', $options);
        
    ?>

</head>
<body>
    <div id="graph"></div>
</body>
</html>
```
