<script type="text/javascript">
$(function(){
    var fillSecondary = function(){
        var selected = $('#primary').val();
        $('#secondary').empty();
        $.getJSON("<?php echo base_url();?>calibracion/listar_json/"+selected,null,function(data){
           data.forEach(function(element,index){
              $('#secondary').append('<option value="'+element[1]+'">'+element[0]+'</option>');            
           });
        });
    }
    $('#primary').change(fillSecondary);
    fillSecondary();
});
</script>