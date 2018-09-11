<script type="text/javascript">
$(function(){
    var fillSecondary = function(){
        var selected = $('#primary').val();
        $('#secondary').empty();
        $.getJSON("<?php echo base_url();?>cliente/obras/"+selected,null,function(data){
           data.forEach(function(element,index){
              $('#secondary').append('<option value="'+element[1]+'">'+element[0]+'</option>');            
           });
        });
    }
    $('#primary').change(fillSecondary);
    fillSecondary();
});
$(document).ready(function(){
    $("a").click(function(){
       $('#tabla > tbody:last').append('<tr><td><select name="ensayo[]" class="custom-select"><option selected>Seleccione...</option><option value="1">Cilindro Compresión</option><option value="2">Cilindro Hendimiento</option><option value="3">Cubo Compresión</option><option value="4">Prisma Flexotracción</option></select></td><td><input  autocomplete="off" name="edad[]"      type="number" type="text" class="form-control "></td><td><input  autocomplete="off" name="cantidad[]"  type="number" type="text" class="form-control "></td><td></td></tr>');

});
    });
</script>