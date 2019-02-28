<script type="text/javascript">
$(function(){
    var fillSecondary = function(){
        var selected = $('#primary').val();
        $('#secondary').empty();
        $.getJSON("<?php echo base_url();?>calibracion/listar_json/"+selected,null,function(data){
           data.forEach(function(element,index){
            if( $('#cal_id').val()==element[1]){
              $('#secondary').append('<option selected value="'+element[1]+'">'+element[0]+'</option>');            
            }
            else
             {
              $('#secondary').append('<option value="'+element[1]+'">'+element[0]+'</option>');            
            } 
           });
        });
          $.getJSON("<?php echo base_url();?>calibracion/datos_calibracion_json/"+selected,null,function(data){
          $('#cal_a').val(data[0]);
          $('#cal_b').val(data[1]);
          $('#cal_simbolo_1').val(data[2]);
          $('#cal_simbolo_2').val(data[3]);
          $(document).ready(resistencia3);
        });
          
    }
    $('#primary').change(fillSecondary);
    fillSecondary();
});

$(function(){
    var fillSecondary = function(){
        var selected = $('#secondary').val();
        $.getJSON("<?php echo base_url();?>calibracion/datos_calibracion_json/"+selected,null,function(data){
          $('#cal_a').val(data[0]);
          $('#cal_b').val(data[1]);
          $('#cal_simbolo_1').val(data[2]);
          $('#cal_simbolo_2').val(data[3]);
          $(document).ready(resistencia3);
        });
    }
    $('#secondary').change(fillSecondary);
    fillSecondary();

});

</script>