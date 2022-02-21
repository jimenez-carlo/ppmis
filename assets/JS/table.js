(function ($) {
  'use strict';
  $(function () {
    $('.table-report thead tr')
        .clone(true)
        .addClass('filters')
      .appendTo('.filterdiv');
    
    $('.table').DataTable({
     initComplete: function () {
            var api = this.api();
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                  var title = $(cell).text();
                  var tpe = "text";
                  if (title == 'Actions') {
                    tpe = "hidden";
                  }
                  
                    $(cell).html('<input type="'+tpe+'" placeholder="Filter ' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('keyup change', function (e) {
                            e.stopPropagation();
 
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
 
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        }});

      // Exportable table
      // $('.js-exportable').DataTable({
      //     responsive: true,
      //     dom: '<"html5buttons"B>lTfgtip',
      //     buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
      //     "order": [[ 0, "desc" ]]
      // });
      // var table = $('.table').DataTable(
      //   dom: 'Bfrtip',
      //   dom: '<"top" <"flex m-2"l>Bf>rtip',
      //   buttons: ['copy', 'csv', 'excel', 'pdf']
       
      //   "initComplete": function(settings, json) {
      //     $('.paginate_button').removeClass('page-item')
      //     $('.page-link').addClass('btn btn-sm btn-dark');
      //     $('.btn-secondary').removeClass('btn-secondary');
      //   }
      // );
      var buttons =  new $.fn.dataTable.Buttons($('.table').DataTable(), {buttons: [
        {extend:'excel',exportOptions: { columns: [ 0, 1, 2, 3, 4,5 ] }, text:"<i class='fa fa-file-excel-o'></i> Excel" ,className: "btn-sm btn-outline-dark", init: function(api, node, config) {
          $(node).removeClass('btn-secondary')
       }},
        // {extend:'copy'  ,exportOptions: { columns: [ 0, 1, 2, 3, 4,5 ] }, text:"<i class='fa fa-file'></i> CSV" ,className:   "btn-sm btn-outline-dark", init: function(api, node, config) {
        //   $(node).removeClass('btn-secondary')
        // }
        // },
          {extend:'pdf'  ,exportOptions: { columns: [ 0, 1, 2, 3, 4,5 ] }, text:"<i class='fa fa-file-pdf-o'></i> PDF" ,className:   "btn-sm btn-outline-dark", init: function(api, node, config) {
          $(node).removeClass('btn-secondary')
        }
        },
        
    ] }).container().appendTo($('#buttons'));
    	// 		var table = $('.table').DataTable({
			// 	lengthChange: false,
			// 	buttons: ['copy', 'excel', 'pdf']
			// });

			// table.buttons().container().appendTo($('#buttons'));
  });
}(jQuery))

