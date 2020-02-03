$(function () {
     
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  var table = $('#medicamentos').DataTable({
      
    paging      : true,
    lengthChange: false,
    searching   : false,
    ordering    : false,
    info        : true,
      ajax: "medicamentos",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'codigo', name: 'codigo'},
          {data: 'nombre', name: 'nombre'},
          {data: 'tipomedi', name: 'tipomedi'},
          {data: 'valor', name: 'valor'},
          {data: 'stop', name: 'stop'},
          {data: 'stop_min', name: 'stop_min'},
          {data: 'stop_max', name: 'stop_max'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
  });


  $('body').on('click', '.deleteMedic', function () {
   
      var medicam_id = $(this).data("id");
      confirm("¿Esta segurodo de eliminar el Medicamento?");
    
      $.ajax({
          type: "DELETE",
          url: "medicamentos"+'/'+medicam_id,
          success: function (data) {
            alert(data.success);  
            table.ajax.reload();
          },
          error: function (data) {
              console.log('Error:', data);
          }
      });
  });

  $('body').on('click', '.editMedic', function () {
    var medicam_id = $(this).data('id');
    $.get("medicamentos" +'/' + medicam_id +'/edit', function (data) {
      $("#codigo").val(data.codigo);
      $("#nombre").val(data.nombre);
      $("#descripcion").val(data.descripcion);
      $("#tipo").val(data.tipo_id);
      $("#valor").val(data.valor);
      $("#stop").val(data.stop);
      $("#stop_min").val(data.stop_min);
      $("#stop_max").val(data.stop_max);
      //console.info(data);
      if($(".box-body").css('display') == 'none'){
        $(".cl_colap").click();
      }
      $("#registrar").css('display','none');
      $("#modificar").css('display','');
      $("#modificar").attr('data-id',data.id);
    })
 });
 $("#editMedic").click(function(e){
    $("#registrar").css('display','');
    $("#modificar").css('display','none');
 });

 $("#modificar").css('display','none');


 $('#modificar').click(function (e) {
    e.preventDefault();
      
      $.ajax({
        data: $('#MedicForm').serialize(),
        url: "medicamentos/"+$(this).attr('data-id'),
        type: "PUT",
        dataType: 'json',
        success: function (data) {
            if(data.success != null) {
              alert(data.success);
              $('#MedicForm').trigger("reset");
              table.ajax.reload();
              $(".cl_colap").click();
            }else{
              $(".cl_ajax").css('display','');
              $(".cl_ajax").html('<div class="alert alert-danger cl_ajax">'+
                '<button type="button" class="close" data-dismiss="alert">x</button>'+
                '<div class="cl_ajaxdata">'+
                '</div> </div>');
              $.each(data.error, function( index, value ) {
                $(".cl_ajaxdata").append('<p>'+value+'</p>');
              });
            }
       
        },
        error: function (data) {
            console.log('Error:', data);
            $('#saveBtn').html('Save Changes');
        }
    });
  });

  $(".cl_ajax").css('display','none');

});