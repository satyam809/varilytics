<style>
    th {
        _min-width: 88px;
    }

    .table tr td,
    .table tr th {
        padding: 5px 5px;
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
    <div class="container-fluid">
        <?php foreach ($data as $key => $value) { ?>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $table_name = $value->name;
                    ?>
                    <p style="text-align:center;font-weight: bold;"> <?php
                                                                        $arr = explode(" ", $table_name);
                                                                        $lines = array_chunk($arr, 10);
                                                                        foreach ($lines as $line)
                                                                            echo implode(" ", $line) . "<br>";
                                                                        ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align:end;"><button onclick="downloadTable(<?php echo $key; ?>)" class="btn btn-primary">Download</button></div>
            </div>
            <div class="row" style="margin-top: 15px;">
                <div class="col-md-12" style="overflow-x: auto;">

                    <table class="table table-bordered tableData" style="margin: 0px auto;" id="table<?php echo $key; ?>">

                        <body>
                            <?php
                            $rows = count($value->finalData);
                            //print_r(json_decode($value->finalData[0]->values));die;
                            // echo count(json_decode($value->finalData[0]->values));
                            // die;
                            for ($i = 0; $i < $rows; $i++) {
                            ?>

                                <tr>
                                    <?php
                                    $countRowValues = count(json_decode($value->finalData[$i]->values));
                                    $rowValue = json_decode($value->finalData[$i]->values);
                                    for ($j = 0; $j < $countRowValues; $j++) {
                                    ?>

                                        <td style="text-align:center;vertical-align: middle;">{{ $rowValue[$j] }}</td>

                                    <?php } ?>
                                </tr>
                            <?php }   ?>

                        </body>

                    </table>
                    <?php if ($value->source != '') { ?>
                        <p>Source:{{ $value->source }}</p>
                    <?php } ?>
                </div>
            </div>
            <br>
        <?php } ?>
    </div>
</div>
<script>
    var row = 0;
    var cell = 0;
    var blankCell = [];
    var rowArr = [];
    var rowspan = 2;

    //alert(cell);

    $('.tableData tr').each(function(rowIndex) {
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
                    $(this).attr('rowspan', 2);
                    $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                } else if (cellIndex == 0 && nextRowData == '' && nextNextRowData == '' && nextNextNextRowData != '') {
                    $(this).attr('rowspan', 3);
                    $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                    $(this).parent('tr').next("tr").next("tr").children(`td:eq(${0})`).remove();
                } else if (cellIndex == 0 && nextRowData == "" && nextNextRowData == '' && nextNextNextRowData == '' && lastRowData != '') { // rowspan
                    $(this).attr('rowspan', 4).css("padding-top", "30px");
                    $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                    $(this).parent('tr').next("tr").next("tr").children(`td:eq(${0})`).remove();
                    $(this).parent('tr').next("tr").next("tr").next("tr").children(`td:eq(${0})`).remove();
                } else if (cellIndex == 0 && nextRowData == "" && nextNextRowData == '' && nextNextNextRowData == '' && lastRowData == '' && lastNextRowData != '') { // rowspan
                    $(this).attr('rowspan', 5).css("padding-top", "35px");
                    $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                    $(this).parent('tr').next("tr").next("tr").children(`td:eq(${0})`).remove();
                    $(this).parent('tr').next("tr").next("tr").next("tr").children(`td:eq(${0})`).remove();
                    $(this).parent('tr').next("tr").next("tr").next("tr").next("tr").children(`td:eq(${0})`).remove();
                } else {
                    blankCell.push(1);
                }
            } else if (cellIndex == 0 && $(this).text() != '' && nextRowData == "" && nextNextRowData == '' && nextNextNextRowData == '' && lastRowData == '' && lastNextRowData != '') { // rowspan
                $(this).attr('rowspan', 5);
                $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                $(this).parent('tr').next("tr").next("tr").children(`td:eq(${0})`).remove();
                $(this).parent('tr').next("tr").next("tr").next("tr").children(`td:eq(${0})`).remove();
                $(this).parent('tr').next("tr").next("tr").next("tr").next("tr").children(`td:eq(${0})`).remove();
            } else if (cellIndex == 0 && $(this).text() != '' && nextRowData == "" && nextNextRowData == '' && nextNextNextRowData == '' && lastRowData != '') { // rowspan
                $(this).attr('rowspan', 4);
                $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                $(this).parent('tr').next("tr").next("tr").children(`td:eq(${0})`).remove();
                $(this).parent('tr').next("tr").next("tr").next("tr").children(`td:eq(${0})`).remove();
            } else if (cellIndex == 0 && $(this).text() != '' && nextRowData == '' && nextNextRowData == '' && nextNextNextRowData != '') { // rowspan
                //console.log('test');die;
                //console.log($(this).parent('tr').next("tr").children(`td:eq(${0})`).text());die;
                $(this).attr('rowspan', 3);
                $(this).parent('tr').next("tr").children(`td:eq(${0})`).remove();
                $(this).parent('tr').next("tr").next("tr").children(`td:eq(${0})`).remove();
                //$(this).parent('tr').next("tr").children(`td:eq(${1})`).remove();
            } else if (cellIndex == 0 && $(this).text() != '' && nextRowData == '' && nextNextRowData != '') { // rowspan

                //if (rowIndex != 1) {
                $(this).attr('rowspan', 2);
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

    function downloadTable(id) {
        $.ajax({
            url: "/check_customer",
            method: "POST",
            dataType: "JSON",
            data: {
                email: "{{ session()->get('login_email') }}"
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            },
            success: function(data) {
                console.log(data);
                if (data.status == true) {
                    var csv = [];
                    var rows = $(`#table${id}`).find('tr');

                    rows.each(function(index, row) {
                        var rowData = [];
                        $(row).find('th, td').each(function() {
                            rowData.push($(this).text());
                        });
                        csv.push(rowData.join(','));
                    });

                    // Create a Blob object from the CSV data
                    var blob = new Blob([csv.join('\n')], {
                        type: 'text/csv;charset=utf-8;'
                    });

                    // Create a temporary anchor element to trigger the download
                    var link = document.createElement('a');
                    link.href = URL.createObjectURL(blob);
                    link.download = `table${id}.csv`;
                    link.style.display = 'none';

                    // Append the anchor element to the document and click it
                    document.body.appendChild(link);
                    link.click();

                    // Cleanup
                    document.body.removeChild(link);
                } else {
                    alert('Please subscribe our plan to download tables');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });

    }
</script>