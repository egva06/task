<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GD Tree</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/css/jquery.orgchart.min.css'>
    <style>
        #chart-container {
            font-family: Arial;
            height: 100%;
            width: 100%;
            border: 2px dashed #aaa;
            border-radius: 5px;
            overflow: auto;
            text-align: center;
        }
    </style>
</head>
<body translate="no">
<div class="container">
    <div id="chart-container"></div>
</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mockjax/1.6.2/jquery.mockjax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/js/jquery.orgchart.min.js'></script>
<script id="rendered-js">
    (function ($) {

        $(function () {

            $.ajax({
                type: "post",
                url: "http://127.0.0.1:8000/api/v1/getMembersTree",
                dataType: 'json',
                method: 'GET',
                contentType: "application/json; charset=utf-8",
                success: function (result) {
                    if (result[0] != '') {
                        var oc = $('#chart-container').orgchart({
                            'data': {
                                'name': result[0]['name'],
                                'children': result[0]['children']
                            },
                            'pan': true,
                            'verticalLevel': 3,
                            'visibleLevel': 4
                        });
                    }
                }
            });
        });

    })(jQuery);

</script>
</body>
</html>
