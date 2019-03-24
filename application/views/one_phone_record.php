<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="card col-6">
        <div class="card-body">
          <h4 class="card-title">Новый контакт</h4>
          <form class="forms-sample" method="POST">
            <div class="form-group">
              <label for="PhoneNumber">Номер телефона</label>
              <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="Номер телефона" required>
            </div>
            <div class="form-group">
              <label for="AbonentName">Имя абонента</label>
              <input type="text" class="form-control" id="AbonentName" name="AbonentName" placeholder="Имя абонента" required>
            </div>
            <div class="form-group">
              <label for="OtherInformation">Дополнительная информация</label>
              <input type="text" class="form-control" id="OtherInformation" name="OtherInformation" placeholder="Дополнительная информация">
            </div>
            <button type="submit" class="btn btn-success mr-2" name="add_phone">Добавить</button>
            <a href="<?php echo base_url('phonebook'); ?>" class="btn btn-light">Отменить</a>
            </form>
        </div>
      </div>
<script type="text/javascript">
$(document).ready(function(){
    $('#PhoneNumber').blur(function(){
        var val_phone = $('#PhoneNumber').val();
        $.ajax({
          url: "http://alen.pp.ua/phonebook/ajax_search_number_phone",
          type: "POST", data: {phone : val_phone},
          success: function(html){ 
            //console.log(html);
            if(html == 'Yes'){
                alert('Внесенный номер '+ val_phone +' уже есть в справочнике!');
                $('#PhoneNumber').val('');
            }
          }
        })
    });
    $('#AbonentName').blur(function(){
        var val_name = $('#AbonentName').val();
        $.ajax({
          url: "http://alen.pp.ua/phonebook/ajax_search_person",
          type: "POST", data: {person : val_name},
          success: function(html){ 
            if(html == 'Yes'){
                alert('Внесенное имя '+ val_name +' уже есть в справочнике!');
                $('#AbonentName').val('');
            }
          }
        })
    });
    $('#PhoneNumber').mask('+380000000000');
 });
</script>