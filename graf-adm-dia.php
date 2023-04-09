<style>
#grafD {
  width: 100%;
  height: 500px;
  background-color: rgba(192, 208, 241, 0.712);
  border-style: 10px;
  border-radius:60px;
}
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("grafD");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(am5percent.PieChart.new(root, {
  radius: am5.percent(90),
  innerRadius: am5.percent(50),
  layout: root.horizontalLayout
}));

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(am5percent.PieSeries.new(root, {
  name: "Series",
  valueField: "sales",
  categoryField: "country"
}));

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll([

  <?php
    $lista = topDezAdmDia($_SESSION['id']);
    // Recebe cada produto vendido da lista e transforma o NOME em uma CHAVE e a QUANTIDADE em um VALOR no Json.
    while($dados=$lista->fetch_array()){
      $nomeProduto = $dados['nomeProd'];
      $quantidade = $dados['qtd_total']; ?>

      {country: "<?=$nomeProduto;?>",
        sales: <?=$quantidade;?>
      }, 

    <?php } ?>

]);

// Disabling labels and ticks
series.labels.template.set("visible", false);
series.ticks.template.set("visible", false);

// Adding gradients
series.slices.template.set("strokeOpacity", 0);
series.slices.template.set("fillGradient", am5.RadialGradient.new(root, {
  stops: [{
    brighten: -0.8
  }, {
    brighten: -0.8
  }, {
    brighten: -0.5
  }, {
    brighten: 0
  }, {
    brighten: -0.5
  }]
}));

// Create legend
// https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
var legend = chart.children.push(am5.Legend.new(root, {
  centerY: am5.percent(50),
  y: am5.percent(50),
  marginTop: 15,
  marginBottom: 15,
  layout: root.verticalLayout
}));

legend.data.setAll(series.dataItems);


// Play initial series animation
// https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
series.appear(1000, 100);

}); // end am5.ready()
</script>

<!-- HTML -->
