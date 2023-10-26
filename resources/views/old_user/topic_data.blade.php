<style>
    th{
        min-width: 88px;
    }
</style>
<div class="page-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page_title-content">
                    <h3></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="atlaspage section-padding">
    <div class="container">
        <?php foreach ($data as $key => $value) { ?>
            <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                    <p style="text-align:center">{{ ucwords(strtolower($value->name))}}</p>
                    <table class="table" style="margin: 0px auto;">
                        <thead>
                            <tr>
                                <?php foreach ($value->finalData as $col) { ?>
                                    <th><?php echo $col->column_name; ?></th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <body>
                            <?php
                            $col = count($value->finalData);
                            //$j = 0;
                            for($j = 0; $j < count(json_decode($value->finalData[0]->values)); $j++){
                            ?>

                            <tr>

                                <?php for ($i = 0; $i < $col; $i++) {
                                    $col_values = array();
                                    $col_values = json_decode($value->finalData[$i]->values);
                                    for ($j; $j < count($col_values); $j++) { ?>
                                        <td><?php echo $col_values[$j];break; ?></td>
                                    <?php } 
                                }  ?>

                            </tr>
                            <?php }   ?>

                        </body>

                    </table>
                    <p>{{ $value->source}}</p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    anychart.onDocumentReady(function() {
        anychart.data.loadJsonFile("topic", function(data) {
            // create a chart and set loaded data
            chart = anychart.bar(data);
            chart.container("container");
            chart.draw();
        });
    });
</script>