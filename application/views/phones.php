<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="card">
      <div class="card-body">
        <a href="<?php echo base_url('phonebook/add_new_phone'); ?>"><button type="button" class="btn btn-outline-primary">Добавить</button></a>
        <a href="<?php echo base_url("phonebook/clear_book");?>" class="clear-book"><button type="button" class="btn btn-outline-secondary">Очистить</button></a>
        <form class="form-inline my-2 my-lg-0 float-right" method="get">
          <input class="form-control mr-sm-2" type="search" placeholder="Критерий фильтрации" aria-label="Search" name="search">
          <select class="form-control" name="sRadios" style="height: 34px;margin-right: 5px;">
              <option value="name">Имя</option>
              <option value="phone_number">Номер</option>
          </select>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Дата</th>
                <th>Номер телефона</th>
                <th>Имя абонента</th>
                <th>Дополнительная информация</th>
                <th>Операции</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $html = '';
              foreach ($book_list as $book){
                  $html .= '<tr>
                      <td>'.$book->date_create.'</td>
                      <td>'.$book->phone_number.'</td>
                      <td>'.$book->name.'</td>
                      <td>'.$book->other_information.'</td>
                      <td><a href="'.base_url("phonebook/delete").'?id='.$book->id.'" class="rem-phone-btn" data-book="'.$book->name.'"><i class="fa fa-trash-o"></i></a></td>
                    </tr>';
              }
              echo $html;
              ?>
            </tbody>
          </table>
          <div class="card-footer text-center">
              <div class="btn-group" role="group" aria-label="Basic example">
                  <?php echo $book_menu; ?>
              </div>
          </div>
        </div>
      </div>
    </div>
<script>
    $('.rem-phone-btn').click(function(){
        var record = $(this).attr('data-book');
        var r=confirm("Вы хотите удалить " + record + "?");if(r==false) return false;});
    $('.clear-book').click(function(){
        var r=confirm("Вы хотите удалить все записи из справочника?");if(r==false) return false;});
</script>
       