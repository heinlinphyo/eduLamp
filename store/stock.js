 $(document).ready(function(){
         var dataTable= $('#st_list').DataTable({
                lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
                dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Stock List',
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Stock List',
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> Csv',
                            title: 'Stock List',
                        },
                        {
                            extend: 'print',
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Stock List</h1></div>',
                              
                        }
                    ],
                "bProcessing": true,
                "serverSide": true,
                "ajax":{
                    url :"store/stock.php",
                    type: "POST",
                    error: function(){
                            $("#st_list_processing").css("display","none");
                        }
                    },

                    "aoColumns": [
                            {data: 'id',className: "text-right","width": "20px" } ,
                            {data: 'new_date'} ,
                            {data: 'item'} ,
                            {data: 'in_quantity'},
                            {data: 'remark'},
                            {data: 'coast'},
                            {data: 'in_user'},
                            {data: 'in_date'},
                            {data: 'out_quantity'},
                            {data: 'refer_to'},
                            {data: 'out_user'},
                            {data: 'out_date'},
                            {data: 'total_quantity'}

                    ],
                    

            "columnDefs": [

                  {
                    className: "input",targets: [13],
                  
                    "render": function (data, type, row, meta) {
                      return '<button type="button" class="btn btn-primary btn-sm in_btn" id=" '+row['id']+' " style="border-radius:2px;box-shawdow:0 0 3px gray;width:60px;"><i class="fa fa-plus-circle"></i> IN </button>';
                    }
                  },
                  {
                    className: "output",targets: [14],
                   
                    "render": function (data, type, row, meta) {
                      return '<button type="button" class="btn btn-warning btn-sm out_btn" id=" '+row['id']+' " style="border-radius:2px;box-shawdow:0 0 3px gray;width:60px;"><i class="fa fa-minus-circle"></i> OUT </button>';
                    }
                  }
                                ],
                
                "order": [[ 1, 'asc' ]],
    

            });
    
                          dataTable.on( 'order.dt search.dt', function () {
            dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


            $(document).on('click', '.in_btn', function(){
                var id = $(this).attr("id");
                $.ajax({
                    url:"store/stock_single.php",
                    method:"POST",
                    data:{id:id},
                    dataType:"json",
                    success:function(data){
                        $('#item').val(data.item);
                        $('#balance').val(data.total_quantity);
                        $('#add_data_Modal2').modal('show');  }
                });
            });


                        $(document).on('click', '.out_btn', function(){
                                        var id = $(this).attr("id");
                                        $.ajax({
                                url:"store/stock_single.php",
                                method:"POST",
                                data:{id:id},
                                dataType:"json",
                                success:function(data){
                                    $('#item_name').val(data.item);
                                    $('#o_balance').val(data.total_quantity);
                                    $('#out_Modal2').modal('show');  }
                                        });
                                    });



        });