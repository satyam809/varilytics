<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varilytics</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo.jpeg') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <style>
        th {
            min-width: 70px;
        }

        td {
            _font-size: 7px;
        }
    </style>
    <div class="container" style="margin-top: 10px;">


        <div class="row" style="margin-top: 15px;">
            <div class="col-md-12">
                <?php
                $table_name = $data->name;
                //echo preg_replace('~((\w+\s){4})~', '$1' . "\n", $test);
                ?>
                <p style="text-align:center">
                    <?php
                    $arr = explode(" ", $table_name);
                    $lines = array_chunk($arr, 10);
                    foreach ($lines as $line)
                        echo implode(" ", $line) . "<br>";
                    ?>
                </p>

                <p style="text-align:end">{{ $data->unit }}</p>
                <table class="table table-bordered" style="margin: 0px auto;_white-space:nowrap;" id="tableData">

                    <body>
                        <?php
                        $rows = count($data->finalData);
                        //print_r(json_decode($value->finalData[0]->values));die;
                        // echo count(json_decode($value->finalData[0]->values));
                        // die;
                        for ($i = 0; $i < $rows; $i++) {
                        ?>

                            <tr>
                                <?php
                                $countRowValues = count(json_decode($data->finalData[$i]->values));
                                $rowValue = json_decode($data->finalData[$i]->values);
                                for ($j = 0; $j < $countRowValues; $j++) {
                                ?>

                                    <td style="text-align:center;">{{ $rowValue[$j] }}</td>

                                <?php } ?>
                            </tr>
                        <?php }   ?>

                    </body>

                </table>
                <?php if ($data->source) { ?>
                    <p>Source:{{ $data->source }}</p>
                <?php } ?>
            </div>
        </div>


    </div>
</body>

</html>
<script>
    var row = 0;
    var cell = 0;
    var blankCell = [];
    var rowArr = [];
    var rowspan = 2;

    //alert(cell);

    $('#tableData tr').each(function(rowIndex) {
        rowArr.push(row + 1);
        //console.log(rowArr[rowArr.length]);

        var colspan = 2;
        $(this).find("td").each(function(cellIndex) {
            var prevRowData = $(this).parent('tr').prev("tr").children(`td:eq(${0})`).text();
            var prevPrevRowData = $(this).parent('tr').prev("tr").prev("tr").children(`td:eq(${0})`).text();
            var nextRowData = $(this).parent('tr').next("tr").children(`td:eq(${0})`).text();
            var nextNextRowData = $(this).parent('tr').next("tr").next("tr").children(`td:eq(${0})`).text();
            var nextNextNextRowData = $(this).parent('tr').next("tr").next("tr").next("tr").children(`td:eq(${0})`).text();
            var lastRowData = $(this).parent('tr').next("tr").next("tr").next("tr").next("tr").children(`td:eq(${0})`).text();
            var lastNextRowData = $(this).parent('tr').next("tr").next("tr").next("tr").next("tr").next("tr").children(`td:eq(${0})`).text();
            var checkColspan = $(this).parent("tr").prev("tr").children(`td:eq(${0})`).attr('colspan');
            cell = cell + 1;
            //console.log(prevRowData);
            if ($(this).text() == '') { // colspan
                blankCell.push(0);
                if (rowIndex == 0 && $(this).prev().text() != '') {
                    //console.log('test');die;
                    $(this).prev().attr('colspan', colspan++);
                    $(this).remove();

                } else if (rowIndex != 0 && cellIndex != 0) {
                    $(this).text('-');
                } else if (prevRowData != '' && checkColspan == 2) {
                    $(this).remove();
                }

            } else if (rowIndex != 0 && $(this).text() != '') {
                if (cellIndex == 0 && nextRowData == '' && nextNextRowData != '') { // rowspan
                    $(this).attr('rowspan', 2).css("padding-top", "26px");
                    $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                } else if (cellIndex == 0 && nextRowData == '' && nextNextRowData == '' && nextNextNextRowData != '') {
                    $(this).attr('rowspan', 3).css("padding-top", "45px");
                    $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                    $(this).parent('tr').next("tr").next("tr").children(`td:eq(${0})`).remove();
                } else if (cellIndex == 0 && nextRowData == "" && nextNextRowData == '' && nextNextNextRowData == '' && lastRowData != '') { // rowspan
                    $(this).attr('rowspan', 4).css("padding-top", "60px");
                    $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                    $(this).parent('tr').next("tr").next("tr").children(`td:eq(${0})`).remove();
                    $(this).parent('tr').next("tr").next("tr").next("tr").children(`td:eq(${0})`).remove();
                } else if (cellIndex == 0 && nextRowData == "" && nextNextRowData == '' && nextNextNextRowData == '' && lastRowData == '' && lastNextRowData != '') { // rowspan
                    $(this).attr('rowspan', 5).css("padding-top", "70px");
                    $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                    $(this).parent('tr').next("tr").next("tr").children(`td:eq(${0})`).remove();
                    $(this).parent('tr').next("tr").next("tr").next("tr").children(`td:eq(${0})`).remove();
                    $(this).parent('tr').next("tr").next("tr").next("tr").next("tr").children(`td:eq(${0})`).remove();
                } else {
                    blankCell.push(1);
                }
            } else if (cellIndex == 0 && $(this).text() != '' && nextRowData == "" && nextNextRowData == '' && nextNextNextRowData == '' && lastRowData == '' && lastNextRowData != '') { // rowspan
                $(this).attr('rowspan', 5).css("padding-top", "70px");
                $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                $(this).parent('tr').next("tr").next("tr").children(`td:eq(${0})`).remove();
                $(this).parent('tr').next("tr").next("tr").next("tr").children(`td:eq(${0})`).remove();
                $(this).parent('tr').next("tr").next("tr").next("tr").next("tr").children(`td:eq(${0})`).remove();
            } else if (cellIndex == 0 && $(this).text() != '' && nextRowData == "" && nextNextRowData == '' && nextNextNextRowData == '' && lastRowData != '') { // rowspan
                $(this).attr('rowspan', 4).css("padding-top", "60px");
                $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                $(this).parent('tr').next("tr").next("tr").children(`td:eq(${0})`).remove();
                $(this).parent('tr').next("tr").next("tr").next("tr").children(`td:eq(${0})`).remove();
            } else if (cellIndex == 0 && $(this).text() != '' && nextRowData == '' && nextNextRowData == '' && nextNextNextRowData != '') { // rowspan
                //console.log('test');die;
                //console.log($(this).parent('tr').next("tr").children(`td:eq(${0})`).text());die;
                $(this).attr('rowspan', 3).css("padding-top", "45px");
                $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                $(this).parent('tr').next("tr").next("tr").children(`td:eq(${0})`).remove();
                //$(this).parent('tr').next("tr").children(`td:eq(${1})`).remove();
            } else if (cellIndex == 0 && $(this).text() != '' && nextRowData == '' && nextNextRowData != '') { // rowspan

                //if (rowIndex != 1) {
                $(this).attr('rowspan', 2).css("padding-top", "26px");
                $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                // }
            } else if (cellIndex == 0 && rowIndex > 2 && nextRowData != '') {
                rowspan = 2;
            } else {
                colspan = 2;

            }
        });
        var blankData = [];
        for (var j = 0; j < blankCell.length; j++) {
            if (blankCell[j] == 0 && j != 0) {
                blankData.push(0);
            }
        }
        if (blankData.length == cell - 1) {
            if (!$(this).prev("tr").find(`td:eq(${0})`).attr('rowspan')) {
                $(this).prev("tr").next("tr").find(`td:eq(${0})`).attr('colspan', cell);
                var i = 1;
                while (cell - 1 >= i) {
                    $(this).prev("tr").next("tr").find(`td:eq(${cell - 1})`).remove();
                    cell--;
                }
            }
        } else if (blankData.length == cell) {
            $(this).prev("tr").next().remove();
        }

        cell = 0;
        blankCell.length = 0;
        blankData.length = 0;

    });
</script>